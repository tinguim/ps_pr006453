<?php
namespace PetShop\Controller;

use PetShop\Core\FrontController;
use PetShop\Model\Categoria;
use PetShop\View\Render;

class HomeController extends FrontController
{
    public function index()
    {
        $dados = [];
        $dados['titulo'] = 'Página Inicial';
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();

        $categorias = (new Categoria)->find();
        foreach ($categorias as &$c) {
            $categoriaAtual = new Categoria;
            $categoriaAtual->loadById($c['idcategoria']);
            $c['imagens'] = $categoriaAtual->getFiles();
        }
        $dados['categorias'] = $categorias;

        Render::front('home', $dados);
    }
}