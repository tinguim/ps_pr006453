<?php
namespace PetShop\Model;


use PetShop\Core\Attribute\Campo;
use PetShop\Core\Attribute\Entidade;
use PetShop\Core\DAO;

#[Entidade(name: 'promocoes')]
class Promocoes extends DAO
{
    #[Campo(label:'Código da Promoção', nn:true, pk:true, auto:true)]
    protected $idPromocao;

    #[Campo(label:'Título da Promoção', nn:true)]
    protected $titulo;

    #[Campo(label:'Descriçao da Promoção', nn:true)]
    protected $descricao;

    #[Campo(label:'Desconto', nn:true)]
    protected $desconto;

    #[Campo(label:'Data Inicial', nn:true)]
    protected $datainicial;

    #[Campo(label:'Data Final', nn:true)]
    protected $datafinal;

    #[Campo(label:'Ativo', nn:true)]
    protected $ativo;

    #[Campo(label:'Data de Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Data de Alteração', nn:true, auto:true)]
    protected $updated_at;

    public function getIdPromocao()
    {
        return $this->idPromocao;
    }

    public function setIdPromocao($idPromocao): self
    {
        $this->idPromocao = $idPromocao;

        return $this;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo): self
    {
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

    public function getDesconto()
    {
        return $this->desconto;
    }

    public function setDesconto($desconto): self
    {
        $this->desconto = $desconto;

        return $this;
    }

    public function getDatainicial()
    {
        return $this->datainicial;
    }

    public function setDatainicial($datainicial): self
    {
        $this->datainicial = $datainicial;

        return $this;
    }

    public function getDatafinal()
    {
        return $this->datafinal;
    }

    public function setDatafinal($datafinal): self
    {
        $this->datafinal = $datafinal;

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