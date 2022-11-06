<?php
namespace PetShop\Model;

//fornecedores
class Fornecedor 
{
    //Código do fornecedor, pk, nn, auto
    protected $idFornecedor;

    //Razão Social do Fornecedor, nn
    protected $razaoSocial;

    //Nome Fantasia do Fornecedor, nn
    protected $nomeFantasia;

    //Telefone1 do Fornecedor, nn
    protected $telefone1;

    //Telefone2 do Fornecedor
    protected $telefone2;

    //E-mail do Fornecedor, nn
    protected $email;

    //Contato do Fornecedor
    protected $contato;

    //Data de Criação, nn, auto
    protected $created_at;

    //Data de Alteração, nn, auto
    protected $updated_at;

    public function getIdFornecedor()
    {
        return $this->idFornecedor;
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

    public function getNomeFantasia()
    {
        return $this->nomeFantasia;
    }

    public function setNomeFantasia($nomeFantasia): self
    {
        $this->nomeFantasia = $nomeFantasia;

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

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getContato()
    {
        return $this->contato;
    }

    public function setContato($contato): self
    {
        $this->contato = $contato;

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