<?php

namespace PetShop\Controller;

use PetShop\Core\FrontController;
use PetShop\Model\Promocoes;
use PetShop\View\Render;

class PromocoesController extends FrontController
{
    public function listarPromocoes()
    {

        $dados = [];
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();

        $promocoes = new Promocoes;

        $promocoesLocalizadas = $promocoes->find();
        $dados['promocoes'] = $promocoesLocalizadas;

        Render::front('promocoes', $dados);
    }
}