<?php
namespace PetShop\Controller;

use PetShop\View\Render;

class AdminDashboardController
{
    public function index()
    {
        $dados = [];
        $dados['titulo'] = 'Dashboard';

        Render::back('dashboard', $dados);
    }
}