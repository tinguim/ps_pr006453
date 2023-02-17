<?php

namespace PetShop\Controller;

use PetShop\Core\FrontController;
use PetShop\Model\Promocoes;
use PetShop\View\Render;

class PromocoesController extends FrontController
{
    public function promocoes()
    {

        $dados = [];
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();
        //$dados['empresa'] = $_SESSION['empresa'];

        $promocoes = (new Promocoes)->find();
        foreach ($promocoes as &$e) {
            $promoAtual = new Promocoes;
            $promoAtual->loadById($e['idpromocao']);
            //$e['imagens'] = $promoAtual->getFiles();
        }
        $dados['promocoes'] = $promocoes;

        Render::front('promocoes', $dados);
    }
}
