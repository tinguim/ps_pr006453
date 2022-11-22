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
       
    }
}