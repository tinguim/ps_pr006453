<?php
namespace PetShop\Controller;

use PetShop\Core\FrontController;
use PetShop\View\Render;

class MeusDadosController extends FrontController
{
    public function meusDados()
    {
        acessoRestrito();
        
        $dados = [];
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();
        $dados['cliente'] = $_SESSION['cliente'];
        
        Render::front('meus-dados', $dados);
    }
}