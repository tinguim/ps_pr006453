<?php
namespace PetShop\Controller;

use Exception;
use PetShop\Model\Usuario;
use PetShop\View\Render;

class AdminUsuarioController
{
    public function listar()
    {
        //Alimentando dados para a tabela de listagem
        $dadosListagem = [];
        $dadosListagem['objeto'] = new Usuario;
        $dadosListagem['colunas'] = [
            ['campo'=>'idusuario', 'class'=>'text-center'],
            ['campo'=>'tipo', 'class'=>'text-center'],
            ['campo'=>'nome'],
            ['campo'=>'email'],
            ['campo'=>'qtdacessos', 'class'=>'text-center'],
            ['campo'=>'created_at', 'class'=>'text-center'],
        ];
        $htmlTabela = Render::block('tabela-admin', $dadosListagem);

        //Alimentando dados para a página de usuarios
        $dados = [];
        $dados['titulo'] = 'Usuários';
        $dados['tabela'] = $htmlTabela;

        Render::back('usuarios', $dados);
    }

    public function form($valor)
    {
        //verificar se o parâmetro tem um número, se for número, é um ID válido
        if (is_numeric($valor)) {
            $objeto = new Usuario;
            $resultado = $objeto->find(['idusuario =' => $valor]);
            if (empty($resultado)) {
                redireciona('/admin/usuarios', 'danger', 'Link inválido, registro não localizado!');
            }
            $_POST = $resultado[0];
            $_POST['senha'] = '';
        }

        //cria e exibe o formulario
        $dados = [];
        $dados['titulo'] = 'Usuários - Manutenção';
        $dados['usuario'] = $_SESSION['usuario'];
        $dados['formulario'] = $this->renderizaFormulario(empty($_POST));

        Render::back('usuarios', $dados);
    }

    public function postForm($valor)
    {
        $objeto = new Usuario;

        //se $valor tem um número, carrega os dados do registro informado nele
        if (is_numeric($valor)) {
            if (!$objeto->loadById($valor)) {
                redireciona('/admin/usuarios', 'danger', 'Link inválido, registro não localizado!');
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

        redireciona('/admin/usuarios', 'success', 'Alterações realizadas com sucesso!');
    }

    public function renderizaFormulario($novo)
    {
        $dados = [
            'btn_class' => 'btn btn-warning px-5 mt-3',
            'btn_label' => ($novo ? 'Adicionar' : 'Atualizar'),
            'fields' => [
                ['type'=>'readonly', 'name'=>'idusuario', 'class'=>'col-2', 'label'=>'Id. Usuário'],
                ['type'=>'radio-inline', 'name'=>'tipo', 'class'=>'col-3', 'label'=>'Tipo', 'required'=>true, 'options'=>[
                    ['value'=>'Gestor', 'label'=>'Gestor'],
                    ['value'=>'Vendedor', 'label'=>'Vendedor'],
                ]],
                ['type'=>'text', 'name'=>'qtdacessos', 'class'=>'col-3', 'label'=>'Qtd. Acessos', 'required'=>true],
                ['type'=>'text', 'name'=>'nome', 'class'=>'col-4', 'label'=>'Nome Completo', 'required'=>true],
                ['type'=>'email', 'name'=>'email', 'class'=>'col-3', 'label'=>'E-mail', 'required'=>true],
                ['type'=>'password', 'name'=>'senha', 'class'=>'col-3', 'label'=>'Senha',],
                ['type'=>'readonly', 'name'=>'created_at', 'class'=>'col-3', 'label'=>'Criado em:'],
                ['type'=>'readonly', 'name'=>'updated_at', 'class'=>'col-3', 'label'=>'Atualizado em:'],
            ]
        ];

        return Render::block('form', $dados);
    }
}