<?php
namespace PetShop\Model;

use PetShop\Core\Attribute\Campo;
use PetShop\Core\Attribute\Entidade;
use PetShop\Core\DAO;
use PetShop\Core\Exception;

#[Entidade(name: 'produtos')]
class Produto extends DAO
{
    #[Campo(label:'Código do Produto', nn:true, pk:true, auto:true)]
    protected $idProduto;

    #[Campo(label:'Código do Cliente', nn:true, fk:true)]
    protected $idMarca;

    #[Campo(label:'Nome do Produto', nn:true, order:true)]
    protected $nome;

    #[Campo(label:'Tipo do Produto', nn:true)]
    protected $tipo;

    #[Campo(label:'Preço do Produto', nn:true)]
    protected $preco;

    #[Campo(label:'Quantidade do Produto', nn:true)]
    protected $quantidade;

    #[Campo(label:'Largura do Produto')]
    protected $largura;

    #[Campo(label:'Altura do Produto')]
    protected $altura;

    #[Campo(label:'Profundidade do Produto')]
    protected $profundidade;

    #[Campo(label:'Peso do Produto')]
    protected $peso;

    #[Campo(label:'Descrição do Produto')]
    protected $descricao;

    #[Campo(label:'Especificações do Produto')]
    protected $especificoes;

    #[Campo(label:'Data de Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Data de Alteração', nn:true, auto:true)]
    protected $updated_at;

    public function getIdProduto()
    {
        return $this->idProduto;
    }

    public function getIdMarca()
    {
        return $this->idmarca;
    }

    public function setIdMarca($idMarca): self
    {
        $objMarca = new Marca;
        if (!$objMarca->loadById($idMarca)) {
            throw new Exception('A marca informada é inválida!');
        }

        $this->idMarca = $idMarca;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): self
    {
        $nome = trim($nome);
        if (strlen($nome) < 3) {
            throw new Exception("Nome do Produto inválida!");
        }
        $this->nome = $nome;

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo): self
    {
        $tiposPermitidos = ['Ração', 'Brinquedo', 'Medicamento', 'Higiene & Beleza'];
        if (!in_array($tipo, $tiposPermitidos)) {
            throw new Exception('Tipo inválido para o produto!');
        }
        $this->tipo = $tipo;

        return $this;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco): self
    {
        if (!is_numeric($preco) || $preco<0) {
            throw new Exception('Valor inválido para o produto!');
        }
        $this->preco = $preco;

        return $this;
    }

    public function getQuantidade()
    {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade): self
    {
        if (!is_numeric($quantidade) || $quantidade<0) {
            throw new Exception('Quantidade inválido para o produto!');
        }
        $this->quantidade = $quantidade;

        return $this;
    }

    public function getLargura()
    {
        return $this->largura;
    }

 
    public function setLargura($largura): self
    {
        if (!is_numeric($largura) || $largura<0) {
            throw new Exception('Largura inválida para o produto!');
        }
        $this->largura = $largura;

        return $this;
    }

    public function getAltura()
    {
        return $this->altura;
    }

    public function setAltura($altura): self
    {
        if (!is_numeric($altura) || $altura<0) {
            throw new Exception('Altura inválida para o produto!');
        }
        $this->altura = $altura;

        return $this;
    }

    public function getProfundidade()
    {
        return $this->profundidade;
    }

    public function setProfundidade($profundidade): self
    {
        if (!is_numeric($profundidade) || $profundidade<0) {
            throw new Exception('Profundidade inválida para o produto!');
        }
        $this->profundidade = $profundidade;

        return $this;
    }

    public function getPeso()
    {
        return $this->peso;
    }

    public function setPeso($peso): self
    {
        if (!is_numeric($peso) || $peso<0) {
            throw new Exception('Peso inválido para o produto!');
        }
        $this->peso = $peso;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): self
    {
        $descricao = trim($descricao);
        if (!$descricao) {
            return $this;
        }
        if (strlen($descricao) < 15) {
            throw new Exception("Descrição do Produto inválida!");
        }
        $this->descricao = $descricao;

        return $this;
    }

    public function getEspecificoes()
    {
        return $this->especificoes;
    }

    public function setEspecificoes($especificoes): self
    {
        $especificoes = trim($especificoes);
        if (!$especificoes) {
            return $this;
        }
        if (strlen($especificoes) < 15) {
            throw new Exception("Especificação do Produto inválida!");
        }
        $this->especificoes = $especificoes;

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