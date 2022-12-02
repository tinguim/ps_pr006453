<?php
namespace PetShop\Controller;

use PetShop\Core\Exception;
use PetShop\Model\Marca;
use PetShop\Model\Produto;
use PetShop\View\Render;

class AdminProdutoController
{
    public function listar()
    {
        //Alimentando dados para a tabela de listagem
        $dadosListagem = [];
        $dadosListagem['objeto'] = new Produto;
        $dadosListagem['colunas'] = [
            ['campo'=>'idproduto', 'class'=>'text-center'],
            ['campo'=>'idmarca', 'class'=>'text-center'],
            ['campo'=>'nome'],
            ['campo'=>'tipo', 'class'=>'text-center'],
            ['campo'=>'preco','class'=>'text-center'],
            ['campo'=>'created_at', 'class'=>'text-center'],
        ];
        $htmlTabela = Render::block('tabela-admin', $dadosListagem);

        //Alimentando dados para a página de clientes
        $dados = [];
        $dados['titulo'] = 'Produtos - Listagem';
        $dados['usuario'] = $_SESSION['usuario'];
        $dados['tabela'] = $htmlTabela;

        Render::back('produtos', $dados);
    }

    public function form($valor)
    {
        //verificar se o parâmetro tem um número, se for número, é um ID válido
        if (is_numeric($valor)) {
            $objeto = new Produto;
            $resultado = $objeto->find(['idproduto =' => $valor]);
            if (empty($resultado)) {
                redireciona('/admin/produtos', 'danger', 'Link inválido, registro não localizado!');
            }
            $_POST = $resultado[0];
            $_POST['preco'] = number_format($_POST['preco'], 2, ',', '');
            $_POST['largura'] = number_format($_POST['largura'], 2, ',', '');
            $_POST['altura'] = number_format($_POST['altura'], 2, ',', '');
            $_POST['profundidade'] = number_format($_POST['profundidade'], 2, ',', '');
            $_POST['peso'] = number_format($_POST['peso'], 2, ',', '');
        }

        //cria e exibe o formulario
        $dados = [];
        $dados['titulo'] = 'Produtos - Manutenção';
        $dados['usuario'] = $_SESSION['usuario'];
        $dados['formulario'] = $this->renderizaFormulario(empty($_POST));

        Render::back('produtos', $dados);
    }

    public function postForm($valor)
    {
        $objeto = new Produto;

        //se $valor tem um número, carrega os dados do registro informado nele
        if (is_numeric($valor)) {
            if (!$objeto->loadById($valor)) {
                redireciona('/admin/produtos', 'danger', 'Link inválido, registro não localizado!');
            }
        }

        try {
            //definindo os campos que tem valor decimal e estão vindo com virgula no lugar do ponto
            $camposDecimal = ['preco', 'largura', 'altura', 'profundidade', 'peso'];

            $campos = array_change_key_case($objeto->getFields());
            foreach($campos as $campo => $propriedades) {
                if (isset($_POST[$campo])) {
                    //se o campo é do tipo DECIMAL, trocamos por ponto
                    if (in_array($campo, $camposDecimal)) {
                        $_POST[$campo] = str_replace(',', '.', $_POST[$campo]);
                    }
                    $objeto->$campo = $_POST[$campo];
                }
            }
            $objeto->save();

        } catch(Exception $e) {
            $_SESSION['mensagem'] = [
                'tipo' => 'warning',
                'texto' => $e->getMessage()
            ];
            $this->form($valor);
            exit;
        }

        redireciona('/admin/produtos', 'success', 'Alterações realizadas com sucesso!');
    }

    public function renderizaFormulario($novo)
    {
        $marcaOptions = [];
        $dadosMarcas = (new Marca)->find();
        foreach($dadosMarcas as $m) {
            $marcaOptions[] = ['value'=>$m['idmarca'], 'label'=>$m['marca']];
        }


        $dados = [
            'btn_class' => 'btn btn-warning px-5 my-5',
            'btn_label' => ($novo ? 'Adicionar' : 'Atualizar'),
            'fields' => [
                ['type'=>'readonly', 'name'=>'idproduto', 'class'=>'col-2', 'label'=>'Id. Produto'],
                ['type'=>'text', 'name'=>'nome', 'class'=>'col-6', 'label'=>'Nome do Produto', 'required'=>true],
                ['type'=>'select', 'name'=>'idmarca', 'class'=>'col-2', 'label'=>'Marca', 'required'=>true, 'options'=>$marcaOptions],
                ['type'=>'select', 'name'=>'tipo', 'class'=>'col-2', 'label'=>'Tipo', 'required'=>true, 'options'=>[
                    ['value'=>'Ração', 'label'=>'Ração'],
                    ['value'=>'Brinquedo', 'label'=>'Brinquedo'],
                    ['value'=>'Medicamento', 'label'=>'Medicamento'],
                    ['value'=>'Higiene & Beleza', 'label'=>'Higiene & Beleza'],
                ]],
                ['type'=>'text', 'name'=>'preco', 'class'=>'col-2', 'label'=>'Preço', 'required'=>true],
                ['type'=>'text', 'name'=>'quantidade', 'class'=>'col-2', 'label'=>'Quantidade', 'required'=>true],
                ['type'=>'text', 'name'=>'largura', 'class'=>'col-2'],
                ['type'=>'text', 'name'=>'altura', 'class'=>'col-2'],
                ['type'=>'text', 'name'=>'profundidade', 'class'=>'col-2'],
                ['type'=>'text', 'name'=>'peso', 'class'=>'col-2'],

                ['type'=>'textarea', 'name'=>'descricao', 'class'=>'col-12', 'label'=>'Descrição', 'rows'=>5],
                ['type'=>'textarea', 'name'=>'especificacoes', 'class'=>'col-12', 'label'=>'Especificações', 'rows'=>5],
                ['type'=>'readonly', 'name'=>'created_at', 'class'=>'col-3', 'label'=>'Criado em:'],
                ['type'=>'readonly', 'name'=>'updated_at', 'class'=>'col-3', 'label'=>'Atualizado em:'],
            ]
        ];

        return Render::block('form', $dados);
    }
}