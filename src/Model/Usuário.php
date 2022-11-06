<?php
namespace PetShop\Model;

//usuarios
class Usuario 
{
    //Código do Usuário, pk, nn, auto
    protected $idUsuario;

    //Nome do Usuário, nn
    protected $nome;

    //E-mail do usuário, nn
    protected $email;

    //Senha do Usuário, nn
    protected $senha;

    //Tipo do Usuário, nn
    protected $tipo;

    //Quantidade de Acessos do Usuário, nn
    protected $qtdAcessos;

    //Data de Criação, nn, auto
    protected $created_at;

    //Data de Alteração, nn, auto
    protected $updated_at;

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): self
    {
        $this->nome = $nome;

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

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha): self
    {
        $this->senha = $senha;

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

    public function getQtdAcessos()
    {
        return $this->qtdAcessos;
    }

    public function setQtdAcessos($qtdAcessos): self
    {
        $this->qtdAcessos = $qtdAcessos;

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