<?php
namespace PetShop\Model;

use Exception;
use PetShop\Core\Attribute\Campo;
use PetShop\Core\Attribute\Entidade;
use PetShop\Core\DAO;

#[Entidade(name: 'arquivos')]
class Arquivo extends DAO
{
    #[Campo(label:'Código do Arquivo', nn:true, pk:true, auto:true)]
    protected $idArquivo;

    #[Campo(label:'Nome da Arquivo', nn:true, order:true)]
    protected $nome;

    #[Campo(label:'Tipo do Arquivo', nn:true)]
    protected $tipo;

    #[Campo(label:'Descrição do Arquivo', nn:true)]
    protected $descricao;

    #[Campo(label:'Tabela do Arquivo')]
    protected $tabela;

    #[Campo(label:'Código da Tabela do Arquivo')]
    protected $tabelaId;

    #[Campo(label:'Data de Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Data de Alteração', nn:true, auto:true)]
    protected $updated_at;

    public function getIdArquivo()
    {
        return $this->idArquivo;
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

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getTabela()
    {
        return $this->tabela;
    }

    public function setTabela($tabela): self
    {
        $this->tabela = $tabela;

        return $this;
    }

    public function getTabelaId()
    {
        return $this->tabelaId;
    }

    public function setTabelaId($tabelaId): self
    {
        $this->tabelaId = $tabelaId;

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