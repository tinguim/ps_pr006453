<?php
namespace PetShop\Model;

//marcas
class Marca 
{
    //Código da Marca, pk, nn, auto
    protected $idMarca;

    //Marca, nn
    protected $marca;

    //Fabricante da Marca
    protected $fabricante;

    //Data de Criação, nn, auto
    protected $created_at;

    //Data de Alteração, nn, auto
    protected $updated_at;

    public function getIdMarca()
    {
        return $this->idMarca;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca): self
    {
        $this->marca = $marca;

        return $this;
    }

    public function getFabricante()
    {
        return $this->fabricante;
    }

    public function setFabricante($fabricante): self
    {
        $this->fabricante = $fabricante;

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