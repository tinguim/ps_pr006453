<?php
namespace PetShop\Model;

//descontos
class Desconto 
{
    //Código do Desconto, pk, nn, auto
    protected $idDesconto;

    //Código do Desconto
    protected $codigo;

    //Data do Ínicio
    protected $dataIni;

    //Data do fim
    protected $dataFim;

    //Percentual do Desconto
    protected $percentual;

    //Data de Criação, nn, auto
    protected $created_at;

    //Data de Alteração, nn, auto
    protected $updated_at;

    public function getIdDesconto()
    {
        return $this->idDesconto;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getDataIni()
    {
        return $this->dataIni;
    }

    public function setDataIni($dataIni): self
    {
        $this->dataIni = $dataIni;

        return $this;
    }

    public function getDataFim()
    {
        return $this->dataFim;
    }

    public function setDataFim($dataFim): self
    {
        $this->dataFim = $dataFim;

        return $this;
    }

    public function getPercentual()
    {
        return $this->percentual;
    }

    public function setPercentual($percentual): self
    {
        $this->percentual = $percentual;

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