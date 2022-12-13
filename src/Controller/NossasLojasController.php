<?php
namespace PetShop\Controller;

use PetShop\Core\FrontController;
use PetShop\Model\Empresa;
use PetShop\View\Render;


class NossasLojasController extends FrontController
{
    public function nossasLojas()
    {

        $dados = [];
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();
        //$dados['empresa'] = $_SESSION['empresa'];

        $empresas = (new Empresa)->find();
        foreach ($empresas as &$e) {
            $empresaAtual = new Empresa;
            $empresaAtual->loadById($e['idempresa']);
            $e['imagens'] = $empresaAtual->getFiles();
        }
        $dados['empresa'] = $empresas;

        Render::front('nossas-lojas', $dados);
    }
}
