<?php
namespace PetShop\Controller;

use PetShop\Core\FrontController;
use PetShop\View\Render;

class AdminDashboardController extends FrontController
{
    public function index()
    {
        $dados = [];
        $dados['titulo'] = 'Início';

        Render::back('dashboard', $dados);
    }
}