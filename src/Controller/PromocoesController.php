<?php

namespace PetShop\Controller;

use PetShop\Core\FrontController;
use PetShop\Model\Promocoes;
use PetShop\View\Render;

class PromocoesController extends FrontController
{
    public function listarPromocoes($idPromocao)
    {

        $dados = [];
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();

        $promocoes = new Promocoes;
        if (!$promocoes->loadById($idPromocao)) {
            redireciona('/', 'warning', 'Promoção não localizada');
        }
        
        $promocoesLocalizadas = $promocoes->find(['idpromocao='=>$idPromocao]);
        $dados['promocoes'] = $promocoesLocalizadas[0];
        $dados['promocoes']['imagens'] = $promocoes->getFiles();

        Render::front('promocoes', $dados);
    }
}