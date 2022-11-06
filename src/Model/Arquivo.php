<?php
namespace PetShop\Model;

//arquivos
class Arquivo
{
    //Código Arquivo, pk, nn, auto
    protected $idArquivo;

    //Nome do Arquivo, nn
    protected $nome;

    //Tipo do Arquivo, nn
    protected $tipo;

    //Descrição do Arquivo
    protected $descricao;

    //Tabela do Arquivo
    protected $tabela;

    //Código da Tabela do Arquivo
    protected $tabelaId;

    //Data de Criação, nn, auto
    protected $created_at;

    //Data de Alteração, nn, auto
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