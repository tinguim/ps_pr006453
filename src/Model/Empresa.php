<?php
namespace PetShop\Model;

//empresas
class Empresa 
{
    //Código da empresa, pk, nn, auto
    protected $idEmpresa;

    //Nome Fantasia, nn
    protected $nomeFantasia;

    //Razão Social, nn
    protected $razaoSocial;

    //Tipo da Empresa, nn
    protected $tipo;

    //CEP da Empresa, nn
    protected $cep;

    //Cidade da Empresa, nn
    protected $cidade;

    //Estado da Empresa, nn
    protected $estado;

    //Rua da Empresa
    protected $rua;

    //Bairro da Empresa
    protected $bairro;

    //Número da Empresa
    protected $numero;

    //Telefone1 da Empresa, nn
    protected $telefone1;

    //Telefone2 da Empresa
    protected $telefone2;

    //Site da Empresa
    protected $site;

    //E-mail da Empresa, nn
    protected $email;

    //CNPJ da Empresa, nn
    protected $cnpj;

    //Data de Criação, nn, auto
    protected $created_at;

    //Data de Alteração, nn, auto
    protected $updated_at;

    public function getIdEmpresa()
    {
        return $this->idEmpresa;
    }

    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

    public function setNomeFantasia($nomeFantasia): self
    {
        $this->nomeFantasia = $nomeFantasia;

        return $this;
    }

    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    public function setRazaoSocial($razaoSocial): self
    {
        $this->razaoSocial = $razaoSocial;

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo): self
    {
        $this->tipo = $tipo;

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

    public function getTelefone1()
    {
        return $this->telefone1;
    }

    public function setTelefone1($telefone1): self
    {
        $this->telefone1 = $telefone1;

        return $this;
    }

    public function getTelefone2()
    {
        return $this->telefone2;
    }

    public function setTelefone2($telefone2): self
    {
        $this->telefone2 = $telefone2;

        return $this;
    }

    public function getSite()
    {
        return $this->site;
    }

    public function setSite($site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function setCnpj($cnpj): self
    {
        $this->cnpj = $cnpj;

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