<?php
namespace PetShop\Model;

//avaliacoes
class Avaliação
{
    //Código da Avaliação, pk, nn, auto
    protected $idAvaliacao;

    //Código do Produto, nn
    protected $idProduto;

    //Código do Cliente, nn
    protected $idCliente;

    //Nota da Avaliação, nn
    protected $nota;

    //Comentário da Avaliação
    protected $comentario;

    //Data de Criação, nn, auto
    protected $created_at;

    //Data de Alteração, nn, auto
    protected $updated_at;

    public function getIdAvaliacao()
    {
        return $this->idAvaliacao;
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

    public function getNota()
    {
        return $this->nota;
    }

    public function setNota($nota): self
    {
        $this->nota = $nota;

        return $this;
    }

    public function getComentario()
    {
        return $this->comentario;
    }

    public function setComentario($comentario): self
    {
        $this->comentario = $comentario;

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