<?php
namespace PetShop\Model;

use Exception;
use PetShop\Core\Attribute\Campo;
use PetShop\Core\Attribute\Entidade;
use PetShop\Core\DAO;

#[Entidade(name: 'cidades')]
class Cidade extends DAO
{
    #[Campo(label:'Código da Cidade', nn:true, pk:true, auto:true)]
    protected $idCidade;

    #[Campo(label:'UF da Cidade', nn:true)]
    protected $uf;

    #[Campo(label:'IBGE da Cidade', nn:true)]
    protected $ibge;

    #[Campo(label:'IBGE7 da Cidade', nn:true)]
    protected $ibge7;

    #[Campo(label:'Município da Cidade', nn:true, order:true)]
    protected $municipio;

    #[Campo(label:'Região da Cidade', nn:true)]
    protected $regiao;

    #[Campo(label:'População da Cidade', nn:true)]
    protected $populacao;

    #[Campo(label:'Porte da Cidade', nn:true)]
    protected $porte;

    #[Campo(label:'Capital da Cidade', nn:true)]
    protected $capital;

    public function getIdCidade()
    {
        return $this->idCidade;
    }

    public function getUf()
    {
        return $this->uf;
    }

    public function setUf($uf): self
    {
        $this->uf = $uf;

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

    public function getIbge7()
    {
        return $this->ibge7;
    }

    public function setIbge7($ibge7): self
    {
        $this->ibge7 = $ibge7;

        return $this;
    }

    public function getMunicipio()
    {
        return $this->municipio;
    }

    public function setMunicipio($municipio): self
    {
        $this->municipio = $municipio;

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

    public function getPopulacao()
    {
        return $this->populacao;
    }

    public function setPopulacao($populacao): self
    {
        $this->populacao = $populacao;

        return $this;
    }

    public function getPorte()
    {
        return $this->porte;
    }

    public function setPorte($porte): self
    {
        $this->porte = $porte;

        return $this;
    }

    public function getCapital()
    {
        return $this->capital;
    }

    public function setCapital($capital): self
    {
        $this->capital = $capital;

        return $this;
    }
}