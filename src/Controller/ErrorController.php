<?php
namespace PetShop\Controller;

use PetShop\Core\FrontController;
use PetShop\View\Render;

class ErrorController extends FrontController
{
    public function erro404()
    {
        $dados = [];
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();

        Render::front('404', $dados);
    }
}