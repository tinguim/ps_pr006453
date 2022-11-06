<?php
namespace PetShop\Model;

//carrinhosprodutos
class CarrinhoProduto 
{
    //Código do Produto, pk, nn
    protected $idProduto;

    //Código do Carrinho, pk, nn
    protected $idCarrinho;

    //Preço do Carrinho, nn
    protected $preco;

    //Quantidade do Carrinho, nn
    protected $quantidade;

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

    public function getIdCarrinho()
    {
        return $this->idCarrinho;
    }

    public function setIdCarrinho($idCarrinho): self
    {
        $this->idCarrinho = $idCarrinho;

        return $this;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco): self
    {
        $this->preco = $preco;

        return $this;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade): self
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }
}