<?php
namespace PetShop\Model;

//produtos
class Produto 
{
    //Código do Produto, pk, nn, auto
    protected $idProduto;

    //Código do Cliente, nn
    protected $idcliente;

    //Nome do Produto, nn
    protected $nome;

    //Tipo do Produto, nn
    protected $tipo;

    //Preço do Produto, nn
    protected $preco;

    //Quantidade do Produto, nn
    protected $quantidade;

    //Largura do Produto
    protected $largura;

    //Altura do Produto
    protected $altura;

    //Profundidade do Produto
    protected $profundidade;

    //Peso do Produto
    protected $peso;

    //Descrição do Produto
    protected $descricao;

    //Especificações do Produto
    protected $especificoes;

    //Data de Criação, nn, auto
    protected $created_at;

    //Data de Alteração, nn, auto
    protected $updated_at;

    public function getIdProduto()
    {
        return $this->idProduto;
    }

    public function getIdcliente()
    {
        return $this->idcliente;
    }

    public function setIdcliente($idcliente): self
    {
        $this->idcliente = $idcliente;

        return $this;
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

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco): self
    {
        $this->preco = $preco;

        return $this;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade): self
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    public function getLargura()
    {
        return $this->largura;
    }

 
    public function setLargura($largura): self
    {
        $this->largura = $largura;

        return $this;
    }

    public function getAltura()
    {
        return $this->altura;
    }

    public function setAltura($altura): self
    {
        $this->altura = $altura;

        return $this;
    }

    public function getProfundidade()
    {
        return $this->profundidade;
    }

    public function setProfundidade($profundidade): self
    {
        $this->profundidade = $profundidade;

        return $this;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function setPeso($peso): self
    {
        $this->peso = $peso;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getEspecificoes()
    {
        return $this->especificoes;
    }

    public function setEspecificoes($especificoes): self
    {
        $this->especificoes = $especificoes;

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