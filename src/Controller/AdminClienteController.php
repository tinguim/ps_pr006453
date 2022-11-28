<?php
namespace PetShop\Controller;

use PetShop\Model\Cliente;
use PetShop\View\Render;

class AdminClienteController
{
    public function listar()
    {
        //Alimentando dados para a tabela de listagem
        $dadosListagem = [];
        $dadosListagem['objeto'] = new Cliente;
        $dadosListagem['colunas'] = [
            ['campo'=>'idcliente', 'class'=>'text-center'],
            ['campo'=>'tipo', 'class'=>'text-center'],
            ['campo'=>'nome'],
            ['campo'=>'email'],
            ['campo'=>'created_at', 'class'=>'text-center'],
        ];
        $htmlTabela = Render::block('tabela-admin', $dadosListagem);

        //Alimentando dados para a página de clientes
        $dados = [];
        $dados['titulo'] = 'Clientes';
        $dados['tabela'] = $htmlTabela;

        Render::back('clientes', $dados);
    }
}