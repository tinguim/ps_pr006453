<?php
namespace Petshop\Controller;

use PetShop\Core\DB;
use PetShop\Core\FrontController;
use PetShop\Model\Produto;
use PetShop\View\Render;

class CarrinhoController extends FrontController
{
    public function listar($idCategoria)
    {
        $dados = [];
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();

        $idcliente = $_SESSION['cliente']['idcliente'] ?? 0;

        $sql = 'SELECT p.idproduto, p.nome, p.preco, cp.quantidade
                FROM carrinhos c
                INNER JOIN carrinhosprodutos cp ON cp.idcarrinho = c.idcarrinho
                INNER JOIN produtos p ON p.idproduto = cp.idproduto
                WHERE c.idcliente = ?
                ORDER BY cp.created_at DESC';
        $produtos = DB::select($sql, [$idcliente]);

        $objProduto = new Produto;
        foreach($produtos as &$p) {
            $objProduto->loadById($p['idproduto']);
            $p['imagens'] = $objProduto->getFiles();
        }

        $dados['produtos'] = $produtos;

        Render::front('categorias', $dados);
    }
}