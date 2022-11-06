<?php
namespace PetShop\Model;

//categorias
class Categoria 
{
    //Código da Categoria, pk, nn, auto
    protected $idCategoria;

    //Nome da Categoria, nn
    protected $nome;

    //Descrição da Categoria
    protected $descricao;

    //Data de Criação, nn, auto
    protected $created_at;

    //Data de Alteração, nn, auto
    protected $updated_at;

    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): self
    {
        $this->nome = $nome;

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