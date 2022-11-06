<?php
namespace PetShop\Model;

//cidades
class Cidade 
{
    //Código da Cidade, pk, nn, auto
    protected $idCidade;

    //UF da Cidade, nn
    protected $uf;

    //IBGE da Cidade, nn
    protected $ibge;

    //IBGE7 da Cidade, nn
    protected $ibge7;

    //Município da Cidade, nn
    protected $municipio;

    //Região da Cidade, nn
    protected $regiao;

    //População da Cidade, nn
    protected $populacao;

    //Porte da Cidade, nn
    protected $porte;

    //Capital da Cidade, nn
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