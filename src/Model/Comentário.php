<?php
namespace PetShop\Model;

//comentarios
class Comentário 
{
    //Código do Comentário, pk, nn, auto
    protected $idComentario;

    //Código do Produto, nn
    protected $idProduto;

    //Código do Cliente, nn
    protected $idCliente;

    //Tipo do Comentário, nn
    protected $tipo;

    //Descrição do Comentário, nn
    protected $descricao;

    //Data de Criação, nn, auto
    protected $created_at;

    //Data de Alteração, nn, auto
    protected $updated_at;

    public function getIdComentario()
    {
        return $this->idComentario;
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

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente): self
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): self
    {
        $this->descricao = $descricao;

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