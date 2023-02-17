<?php

namespace PetShop\Controller;

use PetShop\Core\Exception;
use PetShop\Core\FrontController;
use PetShop\Core\SendMail;
use PetShop\View\Render;
use Respect\Validation\Validator as v;

class PromocoesController extends FrontController
{
    public function promocoes()
    {

        $dados = [];
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();
        $dados['formulario'] = $this->formPromocoes();

        Render::front('promocoes', $dados);
    }

    public function postPromocoes()
    {
        try {
            if (empty($_POST['titulo']) || empty($_POST['descricao']) || empty($_POST['mensagem'])) {
                throw new Exception('Todos os campos devem ser preenchidos');
            }
            $titulo = trim($_POST['titulo']);
            $descricao = trim($_POST['descricao']);
            if (strlen($titulo)<6) {
                throw new Exception('O nome precisa ser completo');
            }
            if (strlen($descricao)<6) {
                throw new Exception('Por favor, seja mais descritivo na mensagem');
            }
            $assunto = 'Contato via site - ' . date('d/m/Y H:i:s');
            $mensagemFull = <<<HTML
                Olá, chegou uma nova promoção<br>
                <strong>Título:</strong> {$titulo}<br>
                <strong>Descrição:</strong> <br>{$descricao}<br>
            HTML;

            SendMail::enviar(MAIL_CONTACTNAME, MAIL_CONTACTMAIL, $assunto, $mensagemFull, $titulo);

        } catch(Exception $e) {
            $_SESSION['mensagem'] = [
                'tipo'=>'warning',
                'texto'=>$e->getMessage()
            ];
            $this->promocoes();
            exit;
        }
        redireciona('/promocoes', 'success', 'Mensagem enviada com sucesso');
    }

    private function formPromocoes()
    {
        $dados = [
            'btn_label' => 'Enviar mensagem',
            'btn_class' => 'btn btn-warning w-50',
            'fields' => [
                ['type' => 'text', 'name' => 'titulo', 'label' => 'Título', 'required' => true],
                ['type' => 'textarea', 'name' => 'descricao', 'label' => 'Descrição', 'rows' => 5, 'required' => true],
            ]
        ];

        return Render::block('form', $dados);
    }
}
