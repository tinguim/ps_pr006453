<?php

namespace PetShop\Controller;

use PetShop\Core\FrontController;
use PetShop\View\Render;

class CadastroController extends FrontController
{
    public function cadastro()
    {
        $dados = [];
        $dados['titulo'] = 'Faça seu cadastro';
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();
        $dados['formCadastro'] = $this->formCadastro();

        Render::front('cadastro', $dados);
    }

    private function formCadastro()
    {
        $dados = [
            'btn_label' => 'Criar minha conta',
            'btn_class' => 'btn btn-success mt-5',
            'fields' => [
                [
                    'type' => 'radio-inline', 'class' => 'col-6', 'label' => 'Você é pessoa...', 'name' => 'tipo', 'options' => [
                        ['label' => 'Física', 'value' => 'F'],
                        ['label' => 'Jurídica', 'value' => 'J']
                    ],
                    'required' => true,
                ],
                ['type' => 'text', 'class' => 'col-6', 'label' => 'Documento', 'name' => 'cpfcnpj', 'required' => true],
                ['type' => 'text', 'name' => 'nome', 'label' => 'Seu nome completo', 'required' => true],
                ['type' => 'email', 'name' => 'email', 'label' => 'Seu melhor e-mail', 'required' => true],
                ['type' => 'password', 'class' => 'col-6', 'name' => 'senha', 'label' => 'Crie uma senha', 'required' => true],
                ['type' => 'password', 'class' => 'col-6', 'name' => 'senha2', 'label' => 'Confirme a senha', 'required' => true],
            ]
        ];
        
        return Render::block('form', $dados);
    }
}
