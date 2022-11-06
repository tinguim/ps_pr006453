<?php
namespace PetShop\Model;

//produtos_categorias
class ProdutoCategoria 
{
    //Código do Produto, pk, nn
    protected $idProduto;

    //Código da Categoria, pk, nn
    protected $idCategoria;

    //Data de Criação, nn, auto
    protected $created_at;

    public function getIdProduto()
    {
        return $this->idProduto;
    }

    public function setIdProduto($idProduto): self
    {
        $this->idProduto = $idProduto;

        return $this;
    }

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function setIdCategoria($idCategoria): self
    {
        $this->idCategoria = $idCategoria;

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }
}