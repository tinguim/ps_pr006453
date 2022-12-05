<?php
namespace PetShop\Controller;

use Gumlet\ImageResize;
use Petshop\Core\Exception;
use PetShop\Model\Arquivo;
use PetShop\View\Render;

class AdminImagemController
{
    public function listar($model, $idmodel)
    {
        $modelPath = "Petshop\\Model\\{$model}";
        if (!class_exists($modelPath)) {
            redireciona('/admin/dashboard', 'danger', 'Página não localizada, Classe de dados não definido');
        }

        $objetoComFiguras = new $modelPath;
        $objetoComFiguras->loadById($idmodel);

        //Alimentando dados para a tabela de listagem
        $dadosListagem = [];
        $dadosListagem['objeto'] = new Arquivo;
        $dadosListagem['rows'] = $objetoComFiguras->getFiles();
        $dadosListagem['remover'] = true;
        $dadosListagem['colunas'] = [
            ['campo'=>'idarquivo', 'class'=>'text-center'],
            ['campo'=>'tipo', 'class'=>'text-center'],
            ['campo'=>'nome'],
            ['campo'=>'tabela', 'class'=>'text-center'],
            ['campo'=>'tabelaid', 'class'=>'text-center'],
            ['campo'=>'created_at', 'class'=>'text-center'],
        ];
        $htmlTabela = Render::block('tabela-admin', $dadosListagem);

        //Alimentando dados para a página de clientes
        $dados = [];
        $dados['titulo'] = 'Imagens - Listagem';
        $campoOrdenacao = $objetoComFiguras->getOrderByFields();
        $dados['registroAlvo'] = $model . ': <u class="mb-2 d-inline-block">' . $objetoComFiguras->$campoOrdenacao . '</u>';
        $dados['usuario'] = $_SESSION['usuario'];
        $dados['tabela'] = $htmlTabela;

        Render::back('imagens', $dados);
    }

    public function form($model, $idmodel, $valor)
    {
        $modelPath = "Petshop\\Model\\{$model}";
        if (!class_exists($modelPath)) {
            redireciona('/admin/dashboard', 'danger', 'Página não localizada, Classe de dados não definido');
        }

        $objetoComFiguras = new $modelPath;
        $objetoComFiguras->loadById($idmodel);

        //verificar se o parâmetro tem um número, se for número, é um ID válido
        if (is_numeric($valor)) {
            $objeto = new Arquivo;
            $resultado = $objeto->find(['idarquivo =' => $valor]);
            if (empty($resultado)) {
                redireciona("/admin/imagens/{$model}/{$idmodel}", 'danger', 'Link inválido, registro não localizado!');
            }
            $_POST = $resultado[0];
        }

        //cria e exibe o formulario
        $dados = [];
        $dados['titulo'] = 'Imagens - Manutenção';
        $campoOrdenacao = $objetoComFiguras->getOrderByFields();
        $dados['registroAlvo'] = $model . ': <u>' . $objetoComFiguras->$campoOrdenacao . '</u>';
        $dados['usuario'] = $_SESSION['usuario'];
        $dados['formulario'] = $this->renderizaFormulario(empty($_POST));

        Render::back('imagens', $dados);
    }

    public function postForm($model, $idmodel, $valor)
    {
        $objeto = new Arquivo;

        //se $valor tem um número, carrega os dados do registro informado nele
        if (is_numeric($valor)) {
            if (!$objeto->loadById($valor)) {
                redireciona("/admin/imagens/{$model}/{$idmodel}", 'danger', 'Link inválido, registro não localizado!');
            }
        }

        try {
            if (!empty($_FILES['arquivo']['name'])) {
                $_POST['nome'] = $_FILES['arquivo']['name'];
                $_POST['tipo'] = 'Imagem';
            }

            $modelPath = "Petshop\\Model\\{$model}";
            if (!class_exists($modelPath)) {
                redireciona('/admin/dashboard', 'danger', 'Página não localizada, Classe de dados não definido');
            }
    
            //pega as informações do objeto dono do arquivo, como nome da tabela, nome do campo chave e o valor
            $objetoComFiguras = new $modelPath;
            $objetoComFiguras->loadById($idmodel);
            $tabela = $objetoComFiguras->getTableName();
            $tabelaChave = $objetoComFiguras->getPkName();
            $_POST['tabela'] = "{$tabela}.{$tabelaChave}";
            $_POST['tabelaid'] = $idmodel;

            $campos = array_change_key_case($objeto->getFields());
            foreach($campos as $campo => $propriedades) {
                if (isset($_POST[$campo])) {
                    $objeto->$campo = $_POST[$campo];
                }
            }
            $objeto->save();

            //se foi enviado arquivo novo, enviar para a pasta uploads com o id do arquivo com o seu nome
            if (!empty($_FILES['arquivo']['name'])) {
                $nomeChave = $objeto->getPkName();
                $valorChave = $objeto->$nomeChave;
                $nomeArquivo = $valorChave . '.' . pathinfo($objeto->nome, PATHINFO_EXTENSION);
                $pathArquivo = PATH_PROJETO . 'public/assets/img/uploads/' . $nomeArquivo;

                if (!move_uploaded_file($_FILES['arquivo']['tmp_name'], $pathArquivo)) {
                    throw new Exception('Falha ao mover arquivo, verifique permissões!');
                }

                rename($pathArquivo, $pathArquivo . '_original');
                $image = new ImageResize($pathArquivo . '_original');
                $image->crop(700, 700);
                $image->save($pathArquivo);
                unlink($pathArquivo . '_original');
            }

        } catch(Exception $e) {
            $_SESSION['mensagem'] = [
                'tipo' => 'warning',
                'texto' => $e->getMessage()
            ];
            $this->form($model, $idmodel, $valor);
            exit;
        }

        redireciona("/admin/imagens/{$model}/{$idmodel}", 'success', 'Alterações realizadas com sucesso!');
    }

    public function renderizaFormulario($novo)
    {
        $dados = [
            'btn_class' => 'btn btn-warning px-5 my-5',
            'btn_label' => ($novo ? 'Adicionar' : 'Atualizar'),
            'enctype' => 'multipart/form-data',
            'fields' => [
                ['type'=>'readonly', 'name'=>'idarquivo', 'class'=>'col-2', 'label'=>'Id. Arquivo'],
                ['type'=>'readonly', 'name'=>'nome', 'class'=>'col-4', 'label'=>'Nome do arquivo (automático)'],
                ['type'=>'file', 'name'=>'arquivo', 'class'=>'col-4', 'label'=>'Arquivo (escolha...)', 'accept'=>'image/*'],
                ['type'=>'readonly', 'name'=>'tipo', 'class'=>'col-2'],
                ['type'=>'textarea', 'name'=>'descricao', 'class'=>'col-12', 'label'=>'Descrição', 'rows'=>'5'],
                ['type'=>'readonly', 'name'=>'created_at', 'class'=>'col-3', 'label'=>'Criado em:'],
                ['type'=>'readonly', 'name'=>'updated_at', 'class'=>'col-3', 'label'=>'Atualizado em:'],
            ]
        ];

        return Render::block('form', $dados);
    }
}