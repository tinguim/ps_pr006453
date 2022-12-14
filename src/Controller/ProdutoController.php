<?php
namespace Petshop\Controller;

use PetShop\Core\DB;
use PetShop\Core\FrontController;
use PetShop\Model\Produto;
use PetShop\View\Render;

class ProdutoController extends FrontController
{
    public function mostrarProduto($idProduto) 
    {
        $dados = [];
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();

        $produto = new Produto;
        if (!$produto->loadById($idProduto)) {
            redireciona('/', 'warning', 'Produto não localizado');
        }

        $sql = 'SELECT p.*, f.ativo
                FROM produtos p
                LEFT JOIN favoritos f on f.idproduto = p.idproduto
                and f.idcliente = ?
                WHERE p.idproduto = ?';

        $parametros = [$_SESSION['cliente']['idcliente']??0, $idProduto];

        $produtoBuscado = DB::select($sql, $parametros)[0];

        $dados['produto'] = $produtoBuscado;
        $dados['imagens'] = $produto->getFiles();

        Render::front('produtos', $dados);
    }
}