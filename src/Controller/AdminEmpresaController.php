<?php
namespace PetShop\Controller;

use PetShop\Core\Exception;
use PetShop\Model\Empresa;
use PetShop\View\Render;

class AdminEmpresaController
{
    public function listar()
    {
        //Alimentando dados para a tabela de listagem
        $dadosListagem = [];
        $dadosListagem['objeto'] = new Empresa;
        $dadosListagem['imagens'] = true;
        $dadosListagem['colunas'] = [
            ['campo'=>'idempresa', 'class'=>'text-center'],
            ['campo'=>'nomefantasia', 'class'=>'text-center'],
            ['campo'=>'razaosocial'],
            ['campo'=>'created_at', 'class'=>'text-center'],
        ];
        $htmlTabela = Render::block('tabela-admin', $dadosListagem);

        //Alimentando dados para a página de clientes
        $dados = [];
        $dados['titulo'] = 'Empresas - Listagem';
        $dados['usuario'] = $_SESSION['usuario'];
        $dados['tabela'] = $htmlTabela;

        Render::back('empresas', $dados);
    }

    public function form($valor)
    {
        //verificar se o parâmetro tem um número, se for número, é um ID válido
        if (is_numeric($valor)) {
            $objeto = new Empresa;
            $resultado = $objeto->find(['idempresa =' => $valor]);
            if (empty($resultado)) {
                redireciona('/admin/empresas', 'danger', 'Link inválido, registro não localizado!');
            }
            $_POST = $resultado[0];
        }

        //cria e exibe o formulario
        $dados = [];
        $dados['titulo'] = 'Empresas - Manutenção';
        $dados['usuario'] = $_SESSION['usuario'];
        $dados['formulario'] = $this->renderizaFormulario(empty($_POST));

        Render::back('empresas', $dados);
    }

    public function postForm($valor)
    {
        $objeto = new Empresa;

        //se $valor tem um número, carrega os dados do registro informado nele
        if (is_numeric($valor)) {
            if (!$objeto->loadById($valor)) {
                redireciona('/admin/empresas', 'danger', 'Link inválido, registro não localizado!');
            }
        }

        try {
            $campos = array_change_key_case($objeto->getFields());
            foreach($campos as $campo => $propriedades) {
                if (isset($_POST[$campo])) {
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

        redireciona('/admin/empresas', 'success', 'Alterações realizadas com sucesso!');
    }

    public function renderizaFormulario($novo)
    {
        $dados = [
            'btn_class' => 'btn btn-warning px-5 mt-3',
            'btn_label' => ($novo ? 'Adicionar' : 'Atualizar'),
            'fields' => [
                ['type'=>'readonly', 'name'=>'idempresa', 'class'=>'col-2', 'label'=>'Id. Empresa'],
                ['type'=>'select', 'name'=>'tipo', 'class'=>'col-2', 'label'=>'Empresa...', 'options'=>[
                    ['value'=>'Matriz', 'label'=>'Matriz'],
                    ['value'=>'Filial', 'label'=>'Filial'],
                ]],
                ['type'=>'text', 'name'=>'nomefantasia', 'class'=>'col-4', 'label'=>'Nome Fantasia', 'required'=>true],
                ['type'=>'text', 'name'=>'razaosocial', 'class'=>'col-4', 'label'=>'Razão Social'],
                ['type'=>'text', 'name'=>'cep', 'class'=>'col-2', 'label'=>'CEP'],
                ['type'=>'text', 'name'=>'cidade', 'class'=>'col-3', 'label'=>'Cidade'],
                ['type'=>'text', 'name'=>'estado', 'class'=>'col-4', 'label'=>'Estado'],
                ['type'=>'text', 'name'=>'telefone1', 'class'=>'col-3', 'label'=>'Telefone'],
                ['type'=>'email', 'name'=>'email', 'class'=>'col-4', 'label'=>'E-mail'],
                ['type'=>'text', 'name'=>'cnpj', 'class'=>'col-2', 'label'=>'CNPJ'],
                ['type'=>'readonly', 'name'=>'created_at', 'class'=>'col-3', 'label'=>'Criado em:'],
                ['type'=>'readonly', 'name'=>'updated_at', 'class'=>'col-3', 'label'=>'Atualizado em:'],
            ]
        ];

        return Render::block('form', $dados);
    }
}