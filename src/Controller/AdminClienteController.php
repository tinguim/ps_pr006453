<?php
namespace PetShop\Controller;

use PetShop\Core\FrontController;
use PetShop\View\Render;

class AdminClienteController extends FrontController
{
    public function listar()
    {
        $dados = [];
        $dados['titulo'] = 'Clientes';

        Render::back('clientes', $dados);
    }
}