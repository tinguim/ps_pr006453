<?php
namespace PetShop\Model;

//favoritos
class Favorito 
{
    //Código do Favorito, pk, nn, auto
    protected $idFavorito;

    //Código do Produto, nn
    protected $idProduto;

    //Código do Cliente, nn
    protected $idcliente;

    //Ativo do Favorito, nn
    protected $ativo;

    //Data de Criação, nn, auto
    protected $created_at;

    //Data de Alteração, nn, auto
    protected $updated_at;

    public function getIdFavorito()
    {
        return $this->idFavorito;
    }

    public function getIdProduto()
    {
        return $this->idProduto;
    }

    public function setIdProduto($idProduto): self
    {
        $this->idProduto = $idProduto;

        return $this;
    }

    public function getIdcliente()
    {
        return $this->idcliente;
    }

    public function setIdcliente($idcliente): self
    {
        $this->idcliente = $idcliente;

        return $this;
    }

    public function getAtivo()
    {
        return $this->ativo;
    }

    public function setAtivo($ativo): self
    {
        $this->ativo = $ativo;

        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}