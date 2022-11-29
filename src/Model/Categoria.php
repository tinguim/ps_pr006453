<?php
namespace PetShop\Model;

use PetShop\Core\Attribute\Campo;
use PetShop\Core\Attribute\Entidade;
use PetShop\Core\DAO;
use PetShop\Core\Exception;

#[Entidade(name: 'categorias')]
class Categoria extends DAO
{
    #[Campo(label:'Código da Categoria', nn:true, pk:true, auto:true)]
    protected $idCategoria;

    #[Campo(label:'Nome da Categoria', nn:true, order:true)]
    protected $nome;

    #[Campo(label:'Descrição da Categoria', nn:true, order:true)]
    protected $descricao;

    #[Campo(label:'Data de Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Data de Alteração', nn:true, auto:true)]
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
        $nome = trim($nome);
        if (strlen($nome) < 3) {
            throw new Exception("Nome da Categoria inválida!");
        }
        $this->nome = $nome;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): self
    {
        $descricao = trim($descricao);
        if (strlen($descricao) < 15) {
            throw new Exception("Descrição da categoria inválida!");
        }
        $this->descricao = $descricao;

        return $this;
    }

    public function getCreated_At()
    {
        return $this->created_at;
    }

    public function getUpdated_At()
    {
        return $this->updated_at;
    }
}