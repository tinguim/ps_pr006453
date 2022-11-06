<?php
namespace PetShop\Model;

//vendas
class Venda 
{
    //Código da Venda, pk, nn, auto
    protected $idVenda;

    //Código do Carrinho, pk, nn
    protected $idCarrinho;

    //Formagpto  da Venda, nn
    protected $formagpto;

    //Status da Venda, nn
    protected $status;

    //Data de Criação, nn, auto
    protected $created_at;

    //Data de Alteração, nn, auto
    protected $updated_at;

    public function getIdVenda()
    {
        return $this->idVenda;
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

    public function getFormagpto()
    {
        return $this->formagpto;
    }

    public function setFormagpto($formagpto): self
    {
        $this->formagpto = $formagpto;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status): self
    {
        $this->status = $status;

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