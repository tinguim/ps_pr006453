<?php
namespace Petshop\Controller;

use PetShop\Core\FrontController;
use PetShop\Model\Categoria;
use PetShop\Model\Produto;
use PetShop\View\Render;

class CategoriaController extends FrontController
{
    public function listarProdutos($idCategoria)
    {
        $dados = [];
        $dados['topo'] = $this->carregaHTMLTopo();
        $dados['rodape'] = $this->carregaHTMLRodape();

        $categoria = new Categoria;
        if (!$categoria->loadById($idCategoria)) {
            redireciona('/', 'warning', 'Categoria não localizada!');
        }

        //carregando as informações da categoria chamada
        $dados['categoria'] = [];
        $dados['categoria']['idcategoria'] = $categoria->getIdCategoria();
        $dados['categoria']['nome'] = $categoria->getNome();
        $dados['categoria']['descricao'] = $categoria->getDescricao();

        //carregando todas imagens da categoria 
        $dados['categoria']['imagens'] = $categoria->getFiles();

        //carregando os produtos relacionados desta categoria
        $produtos = (new Produto)->find(['idacategoria='=>$categoria->getIdCategoria()]);

        //para cada produto, procuro as imagens relacionadas e crio uma coluna files com isso
        foreach($produtos as &$p) {
            //não é muito performatico fazer isso, mas neste moneto é o mais rápido
            $produtoAtual = new Produto;
            $produtoAtual->loadById($p['idproduto']);
            $p['iamgens'] = $produtoAtual->getFiles();
        }

        $dados['produtos'] = $produtos;

        Render::front('categorias', $dados);
    }
}