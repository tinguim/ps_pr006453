<?php
namespace PetShop\Controller;

use Exception;
use PetShop\Model\Categoria;
use PetShop\View\Render;

class AdminCategoriaController
{
    public function listar()
    {
        //Alimentando dados para a tabela de listagem
        $dadosListagem = [];
        $dadosListagem['objeto'] = new Categoria;
        $dadosListagem['imagens'] = true;
        $dadosListagem['colunas'] = [
            ['campo'=>'idcategoria', 'class'=>'text-center'],
            ['campo'=>'nome'],
            ['campo'=>'created_at', 'class'=>'text-center'],
        ];
        $htmlTabela = Render::block('tabela-admin', $dadosListagem);

        //Alimentando dados para a página de clientes
        $dados = [];
        $dados['titulo'] = 'Categorias - Listagem';
        $dados['usuario'] = $_SESSION['usuario'];
        $dados['tabela'] = $htmlTabela;

        Render::back('clientes', $dados);
    }

    public function form($valor)
    {
        //verificar se o parâmetro tem um número, se for número, é um ID válido
        if (is_numeric($valor)) {
            $objeto = new Categoria;
            $resultado = $objeto->find(['idcategoria =' => $valor]);
            if (empty($resultado)) {
                redireciona('/admin/categorias', 'danger', 'Link inválido, registro não localizado!');
            }
            $_POST = $resultado[0];
        }

        //cria e exibe o formulario
        $dados = [];
        $dados['titulo'] = 'Categorias - Manutenção';
        $dados['usuario'] = $_SESSION['usuario'];
        $dados['formulario'] = $this->renderizaFormulario(empty($_POST));

        Render::back('categorias', $dados);
    }

    public function postForm($valor)
    {
        $objeto = new Categoria;

        //se $valor tem um número, carrega os dados do registro informado nele
        if (is_numeric($valor)) {
            if (!$objeto->loadById($valor)) {
                redireciona('/admin/categorias', 'danger', 'Link inválido, registro não localizado!');
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

        redireciona('/admin/categorias', 'success', 'Alterações realizadas com sucesso!');
    }

    public function renderizaFormulario($novo)
    {
        $dados = [
            'btn_class' => 'btn btn-warning px-5 mt-3',
            'btn_label' => ($novo ? 'Adicionar' : 'Atualizar'),
            'fields' => [
                ['type'=>'readonly', 'name'=>'idcategoria', 'class'=>'col-2', 'label'=>'Id. Categoria'],
                ['type'=>'text', 'name'=>'nome', 'class'=>'col-10', 'label'=>'Categoria', 'required'=>true],
                ['type'=>'textarea', 'name'=>'descricao', 'class'=>'col-12', 'label'=>'Descrição'],
                ['type'=>'readonly', 'name'=>'created_at', 'class'=>'col-3', 'label'=>'Criado em:'],
                ['type'=>'readonly', 'name'=>'updated_at', 'class'=>'col-3', 'label'=>'Atualizado em:'],
            ]
        ];

        return Render::block('form', $dados);
    }
}