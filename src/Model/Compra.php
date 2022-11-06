<?php
namespace PetShop\Model;

//compras
class Compra 
{
    //Código da Compra, pk, nn, auto
    protected $idCompra;

    //Código do Fornecedor, pk, nn
    protected $idFornecedor;

    //Frete da Compra, nn
    protected $frete;

    //Total da Compra, nn
    protected $total;

    //Data de Criação, nn, auto
    protected $created_at;

    //Data de Alteração, nn, auto
    protected $updated_at;

    public function getIdCompra()
    {
        return $this->idCompra;
    }

    public function getIdFornecedor()
    {
        return $this->idFornecedor;
    }

    public function setIdFornecedor($idFornecedor): self
    {
        $this->idFornecedor = $idFornecedor;

        return $this;
    }

    public function getFrete()
    {
        return $this->frete;
    }

    public function setFrete($frete): self
    {
        $this->frete = $frete;

        return $this;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total): self
    {
        $this->total = $total;

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