<?php
namespace PetShop\Core;

use PetShop\Model\Empresa;
use PetShop\View\Render;

abstract class FrontController
{
    /**
     * Alimenta com dados e renderiza o Topo do site para o cliente (front-end)
     *
     * @return void
     */
    public function carregaHTMLTopo() 
    {
        $empresa = new Empresa;
        $dados = $empresa->find(['tipo ='=>'Matriz']);
        return Render::block('topo', $dados[0]);
    }

    /**
     * Alimenta com dados e renderiza o Rodapé do site para o cliente (front-end)
     *
     * @return void
     */
    public function carregaHTMLRodape() 
    {
        $empresa = new Empresa;
        $dados = $empresa->find(['tipo ='=>'Matriz']);
        return Render::block('rodape', $dados[0]);
    }
}