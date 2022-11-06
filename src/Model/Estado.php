<?php
namespace PetShop\Model;

//estados
class Estado 
{
    //Código do Estado, pk, nn
    protected $idEstado;

    //IBGE do Estado, nn
    protected $ibge;

    //Estado, nn
    protected $estado;

    //Região do Estado, nn
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