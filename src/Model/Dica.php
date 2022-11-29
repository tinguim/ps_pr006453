<?php
namespace PetShop\Model;


use PetShop\Core\Attribute\Campo;
use PetShop\Core\Attribute\Entidade;
use PetShop\Core\DAO;
use PetShop\Core\Exception;

#[Entidade(name: 'dicas')]
class Dica extends DAO
{
    #[Campo(label:'Código da Dica', nn:true, pk:true, auto:true)]
    protected $idDica;

    #[Campo(label:'Título', nn:true, order:true)]
    protected $titulo;

    #[Campo(label:'Descrição da Dica', nn:true)]
    protected $descricao;

    #[Campo(label:'Data de Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Data de Alteração', nn:true, auto:true)]
    protected $updated_at;

    public function getIdDica()
    {
        return $this->idDica;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo): self
    {
        $titulo = trim($titulo);
        if (!$titulo) {
            throw new Exception("Título Inválido!");
        }
        $this->titulo = $titulo;

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

    public function getCreated_At()
    {
        return $this->created_at;
    }

    public function getUpdated_At()
    {
        return $this->updated_at;
    }
}