<?php
namespace PetShop\Model;

//carrinhos
class Carrinho
{
    //Código do Carrinho, pk, nn, auto
    protected $idCarrinho;

    //Código do Cliente, nn
    protected $idCliente;

    //Valor Total do Carrinho, nn
    protected $valorTotal;

    //Encerrado do Carrinho, nn
    protected $encerrado;

    //Data de Criação, nn, auto
    protected $created_at;

    //Data de Alteração, nn, auto
    protected $updated_at;

    public function getIdCarrinho()
    {
        return $this->idCarrinho;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente): self
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function setValorTotal($valorTotal): self
    {
        $this->valorTotal = $valorTotal;

        return $this;
    }

    public function getEncerrado()
    {
        return $this->encerrado;
    }

    public function setEncerrado($encerrado): self
    {
        $this->encerrado = $encerrado;

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