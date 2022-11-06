<?php
namespace PetShop\Model;

//enderecos
class Endereço 
{
    //Código do Endereço, pk, nn, auto
    protected $idEndereco;

    //Código do Cliente, nn
    protected $idCliente;

    //CEP do Endereço, nn
    protected $cep;

    //Cidade do Endereço, nn
    protected $cidade;

    //Estado do Endereço, nn
    protected $estado;

    //Rua do endereço
    protected $rua;

    //Bairro do Endereço
    protected $bairro;

    //Número do Endereço
    protected $numero;

    //Data de Criação, nn, auto
    protected $created_at;

    //Data de Alteração, nn, auto
    protected $updated_at;

    public function getIdEndereco()
    {
        return $this->idEndereco;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function setIdCliente($idCliente): self
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep): self
    {
        $this->cep = $cep;

        return $this;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade): self
    {
        $this->cidade = $cidade;

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

    public function getRua()
    {
        return $this->rua;
    }

    public function setRua($rua): self
    {
        $this->rua = $rua;

        return $this;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro): self
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero): self
    {
        $this->numero = $numero;

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