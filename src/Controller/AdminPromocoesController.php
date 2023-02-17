<?php
namespace PetShop\Controller;

use PetShop\Core\Exception;
use PetShop\Model\Promocoes;
use PetShop\View\Render;

class AdminPromocoesController
{
    public function listar()
    {
        //Alimentando dados para a tabela de listagem
        $dadosListagem = [];
        $dadosListagem['objeto'] = new Promocoes;
        $dadosListagem['imagens'] = true;
        $dadosListagem['colunas'] = [
            ['campo'=>'idpromocao', 'class'=>'text-center'],
            ['campo'=>'titulo'],
            ['campo'=>'desconto'],
            ['campo'=>'ativo'],
            ['campo'=>'created_at', 'class'=>'text-center'],
        ];
        $htmlTabela = Render::block('tabela-admin', $dadosListagem);

        //Alimentando dados para a página de clientes
        $dados = [];
        $dados['titulo'] = 'Promoções - Listagem';
        $dados['usuario'] = $_SESSION['usuario']; ///////////////
        $dados['tabela'] = $htmlTabela;

        Render::back('promocoes', $dados);
    }

    public function form($valor)
    {
        //verificar se o parâmetro tem um número, se for número, é um ID válido
        if (is_numeric($valor)) {
            $objeto = new Promocoes;
            $resultado = $objeto->find(['idpromocao =' => $valor]);
            if (empty($resultado)) {
                redireciona('/admin/promocoes', 'danger', 'Link inválido, registro não localizado!');
            }
            $_POST = $resultado[0];
        }

        //cria e exibe o formulario
        $dados = [];
        $dados['titulo'] = 'Promoções - Manutenção';
        $dados['usuario'] = $_SESSION['usuario'];
        $dados['formulario'] = $this->renderizaFormulario(empty($_POST));

        Render::back('promocoes', $dados);
    }

    public function postForm($valor)
    {
        $objeto = new Promocoes;

        //se $valor tem um número, carrega os dados do registro informado nele
        if (is_numeric($valor)) {
            if (!$objeto->loadById($valor)) {
                redireciona('/admin/promocoes', 'danger', 'Link inválido, registro não localizado!');
            }
        }

        try {
            $campos = array_change_key_case($objeto->getFields());
            foreach($campos as $campo => $promocoes) {
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

        redireciona('/admin/promocoes', 'success', 'Alterações realizadas com sucesso!');
    }

    public function renderizaFormulario($novo)
    {
        $dados = [
            'btn_class' => 'btn btn-warning px-5 mt-3',
            'btn_label' => ($novo ? 'Adicionar' : 'Atualizar'),
            'fields' => [
                ['type'=>'readonly', 'name'=>'idpromocao', 'class'=>'col-2', 'label'=>'Id. Promoção'],
                ['type'=>'text', 'name'=>'titulo', 'class'=>'col-10', 'label'=>'Título', 'required'=>true],
                ['type'=>'textarea', 'name'=>'descricao', 'class'=>'col-12', 'label'=>'Descrição'],
                ['type'=>'text', 'name'=>'desconto', 'class'=>'col-4', 'label'=>'Desconto'],
                ['type'=>'date', 'name'=>'datainicial', 'class'=>'col-4', 'label'=>'Data Inicial'],
                ['type'=>'date', 'name'=>'datafinal', 'class'=>'col-4', 'label'=>'Data Final'],
                ['type'=>'radio-inline', 'name'=>'ativo', 'class'=>'col-3', 'label'=>'Ativo ...', 'options'=>[
                    ['value'=>'Sim', 'label'=>'Sim'],
                    ['value'=>'Não', 'label'=>'Não'],
                ]],
                ['type'=>'readonly', 'name'=>'created_at', 'class'=>'col-3', 'label'=>'Criado em:'],
                ['type'=>'readonly', 'name'=>'updated_at', 'class'=>'col-3', 'label'=>'Atualizado em:'],
            ]
        ];

        return Render::block('form', $dados);
    }
}