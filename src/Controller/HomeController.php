<?php
namespace PetShop\Controller;

use PetShop\Core\FrontController;
use PetShop\Model\Estado;
use PetShop\View\Render;

class HomeController extends FrontController
{
    public function index()
    {
        $estados = ( new Estado() )->find();

        $dados = [];
        $dados['titulo'] = 'Lista de Estados';
        $dados['estados'] = $estados;
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();

        Render::front('home', $dados);
    }
}