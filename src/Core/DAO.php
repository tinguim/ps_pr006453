<?php

namespace PetShop\Core;

use PetShop\Core\Attribute\Campo;
use PetShop\Core\Attribute\Entidade;

abstract class DAO 
{
    /** @var array Informações da tabela/campos carregados */
    private $tableInfo = [];

    public function __construct()
    {
        $this->tableInfo = $this->getTableInfo();
    }

    /**
     * Método GET para acesso direto via nomes de propriedades da classe
     *
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        $metodoProcurado = 'get' . $name;
        if (method_exists($this, $metodoProcurado)) {
            return $this->$metodoProcurado();
        } else {
            throw new exception("O atributo {$name} não tem método 'get'associado");
        }
    }

    /**
     * Método SET para gravação direta via nomes de propriedades da classe
     *
     * @param string $name Nome da propriedade
     * @param mixed $value Valor a ser inserido
     * @return mixed
     */
    public function __set(string $name, $value)
    {
        $metodoProcurado = 'set' . $name;
        if (method_exists($this, $metodoProcurado)) {
            $this->$metodoProcurado($value);
        } else {
            throw new exception("O atributo {$name} não tem método 'set'associado");
        }
    }

    /**
     * Função que objetiva retornar as metainformações da classe, baseando-se nas leituras do atributos
     *
     * @return array Propriedades da Entidade (tabela e campos)
     */
    public function getTableInfo() : array
    {
        //vetor que armazenará as informações da classe referente a tabelas e campos do banco de dados
        $info = [];

        //pegando as metainformações da classe referente ao objeto atual instanciado
        $ref = new \ReflectionClass($this::class);
        foreach($ref->getAttributes(Entidade::class) as $attrTable) {
            $info['tabela'] = $attrTable->getArguments();

            //procurando as metainformações das propriedades da classe
            foreach($ref->getProperties() as $propriedade) {
                //para cada campo/prop localizada, procura seus atributos
                foreach($propriedade->getAttributes(Campo::class) as $attrCampo) {
                    $info['campos'][$propriedade->getName()] = $attrCampo->getArguments();
                }
            }
        }

        if (!isset($info['tabela']) || !isset($info['campos'])) {
            throw new Exception('Os atributos da classe/propriedades não foram preenchidos!');
        }

        return $info;
    }

    /**
     * Retorna o nome da tabela da classe instanciada
     *
     * @return string
     */
    public function getTableName() : string
    {
        return $this->tableInfo['tabela']['name'];
    }

    /**
     * Retorna informações dos campos/prop da classe associada
     *
     * @return array
     */
    public function getFields() : array
    {
        return $this->tableInfo['campos'];
    }

    /**
     * Retorna o nome do campo chave da tabela associada a classe atual
     *
     * @return string
     */
    public function getPkName() : string
    {
        foreach($this->tableInfo['campos'] as $cname => $cprops) {
            if (array_key_exists('pk', $cprops)) {
                return strtolower($cname);
            }
        }
        return '';
    }

    /**
     * Retorna o nome do campo de ordenação padrão
     * 
     * @return string
     */
    public function getOrderByFields() : string
    {
        foreach($this->tableInfo['campos'] as $cname => $cprops) {
            if (array_key_exists('order', $cprops)) {
                return strtolower($cname);
            }
        }
        return '';
    }

    /**
     * Função genérica que busca dados no banco de dados para a entidade relacionada ao objeto instanciado
     *
     * @param array $params Os parâmetros de condição da busca, ex: ['titulo ='=>'Teste']
     * @param array $order Os campos de ordenação, ex: ['titulo desc', 'dtcad']
     * @param string $columns As colunas do SELECT (separadas por virgula)
     * @return array
     */
    public function find(array $params=[], array $order=[], string $columns='*') : array
    {
        $where = '';
        if (count($params)) {
            $where = 'WHERE ' . implode(' ? and', array_keys($params)) . ' ? ';
        }

        $orderBy = '';
        if (count($order)) {
            $orderBy = 'ORDER BY ' . implode(', ', $order);
        } elseif($this->getOrderByFields()) {
            $orderBy = 'ORDER BY ' . $this->getOrderByFields();
        }

        $sql = sprintf(
            'SELECT %s FROM %s %s %s',
            $columns,
            $this->getTableName(),
            $where,
            $orderBy
        );

        return DB::select($sql, $params);
    }

    /**
     * Carrega as informações da tabela para o objeto instanciado
     *
     * @param integer|string $id Chave primária procurada
     * @return boolean
     */
    public function loadById(int|string $id) : bool
    {
        if (!$this->getPkName()) {
            return false;
        }

        $registro = $this->find([
            $this->getPkName() . '=' => $id
        ]);

        if (!isset($registro[0])) {
            return false;
        }

        

        //THIS->FIND RETORNA UMA COLEÇÃO (VETOR), TEMOS QUE, PORTANTO ALIMENTAR O OBJETO
        //PROPRIEDADE POR PRIORIDADE A PARTIR DESTE VETOR RETORNADO

        $atributos = array_keys($this->getFields());
        foreach($atributos as $atributo) {
            $this->$atributo = $registro[0][strtolower($atributo)];
        }

        return true;
    }
     
    /**
     * Método que, com todos atributos obrigatórios alimentados salva os dados no banco de dados,
     * se houver ID informado, então atualiza um registro, senão, cria
     *
     * @return void
     */
    public function save() : bool
    {
        $nomeDaTabela = $this->getTableName();
        $nomeCampoChave = $this->getPkName();
        $valorCampoChave = $this->$nomeCampoChave;

        $campos = [];
        foreach($this->getFields() as $atributo => $parametros) {
            if (array_key_exists('auto', $parametros)) {
                continue;
            }

            //verificar se o campo atual está nulo e é um not null (NN)
            if (is_null($this->$atributo) && array_key_exists('nn', $parametros)) {
                $label = $parametros['label'];
                throw new Exception("O campo {$label} deve ser preenchido!");
            }

            $campos[strtolower($atributo)] = $this->$atributo;
        }

        //Se não tiver valor no atributo do campo chave, será feito um insert, pois não é conhecido
        if (empty($valorCampoChave)) {
            $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)',
            $nomeDaTabela,
            implode(', ', array_keys($campos)),
            trim(str_repeat('?, ', count($campos)), ', ')
        );

        DB::query($sql, $campos);

        $this->loadById(DB::getInstance()->lastInsertId());

        return true;
        }

        $sql = sprintf(
            'UPDATE %s SET %s WHERE %s = %s',
            $nomeDaTabela,
            implode('=?, ', array_keys($campos)) . '=?',
            $nomeCampoChave,
            $valorCampoChave
        );
        
        DB::query($sql, $campos);

        $this->loadById($valorCampoChave);

        return true;
    }

    /**
     * Retorna uma lista de todos os arquivos cadastrados para o registro corrente
     *
     * @return array
     */
    public function getFiles() : array
    {
        $nomeDaTabela = $this->getTableName();
        $nomeCampoChave = $this->getPkName();
        $valorCampoChave = $this->$nomeCampoChave;

        $sql = 'SELECT *
                FROM arquivos
                WHERE tabela = ?
                AND tabelaid = ?
                ORDER BY created_at DESC';

        $parametros = ["{$nomeDaTabela}.{$nomeCampoChave}", $valorCampoChave];

        $files = DB::select($sql, $parametros);

        foreach($files as &$file) {
            $nomeArquivo = $file['idarquivo'] . '.' . pathinfo($file['nome'], PATHINFO_EXTENSION);
            $file['path'] = PATH_PROJETO . 'public/assets/img/uploads/' . $nomeArquivo;
            $file['url'] = URL . '/assets/img/uploads/' . $nomeArquivo;
        }

        return $files;
    }
}