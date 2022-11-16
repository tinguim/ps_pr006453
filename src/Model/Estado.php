<?php
namespace PetShop\Model;

use Exception;
use PetShop\Core\Attribute\Campo;
use PetShop\Core\Attribute\Entidade;
use PetShop\Core\DAO;

#[Entidade(name: 'estados')]
class Estado extends DAO
{
    #[Campo(label:'Código do Estado', nn:true, pk:true)]
    protected $idEstado;

    #[Campo(label:'IBGE do Estado', nn:true)]
    protected $ibge;

    #[Campo(label:'Estado', nn:true, order:true)]
    protected $estado;

    #[Campo(label:'Região do Estado', nn:true)]
    protected $regiao;

    public function getIdEstado()
    {
        return $this->idEstado;
    }

    public function setIdEstado($idEstado): self
    {
        $this->idEstado = $idEstado;

        return $this;
    }

    public function getIbge()
    {
        return $this->ibge;
    }

    public function setIbge($ibge): self
    {
        $this->ibge = $ibge;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getRegiao()
    {
        return $this->regiao;
    }

    public function setRegiao($regiao): self
    {
        $this->regiao = $regiao;

        return $this;
    }
}