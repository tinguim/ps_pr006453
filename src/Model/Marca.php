<?php
namespace PetShop\Model;

use PetShop\Core\Attribute\Campo;
use PetShop\Core\Attribute\Entidade;
use PetShop\Core\DAO;
use PetShop\Core\Exception;

#[Entidade(name: 'marcas')]
class Marca extends DAO
{
    #[Campo(label:'Código da Marca', nn:true, pk:true, auto:true)]
    protected $idMarca;

    #[Campo(label:'Marca', nn:true, order:true)]
    protected $marca;

    #[Campo(label:'Fabricante')]
    protected $fabricante;

    #[Campo(label:'Data de Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Data de Alteração', nn:true, auto:true)]
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
        $marca = trim($marca);
        if (strlen($marca) < 3) {
            throw new Exception("Marca inválida!");
        }
        $this->marca = $marca;

        return $this;
    }

    public function getFabricante()
    {
        return $this->fabricante;
    }

    public function setFabricante($fabricante): self
    {
        $fabricante = trim($fabricante);
        if (strlen($fabricante) < 3) {
            throw new Exception("Nome do fabricante é inválido!");
        }
        $this->fabricante = $fabricante;

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