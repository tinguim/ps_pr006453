<?php
namespace PetShop\Model;

use Exception;
use PetShop\Core\Attribute\Campo;
use PetShop\Core\Attribute\Entidade;
use PetShop\Core\DAO;
use Respect\Validation\Validator as v;

#[Entidade(name: 'usuarios')]
class Usuario extends DAO
{
    #[Campo(label:'Código do Usuário', nn:true, pk:true, auto:true)]
    protected $idUsuario;

    #[Campo(label:'Nome do Usuário', nn:true)]
    protected $nome;

    #[Campo(label:'E-mail do Usuário', nn:true)]
    protected $email;

    #[Campo(label:'Senha do Usuário', nn:true)]
    protected $senha;

    #[Campo(label:'Tipo de Usuário', nn:true)]
    protected $tipo;

    #[Campo(label:'Quantidade de Acessos', nn:true)]
    protected $qtdAcessos;

    #[Campo(label:'Data de Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Data de Alteração', nn:true, auto:true)]
    protected $updated_at;

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $email = strtolower(trim($email));

        $emailValido = v::email()->validate($email);
        if (!$emailValido) {
            throw new Exception('O e-mail informado é inválido!');
        }
        $this->email = $email;

        return $this;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha): self
    {
        if ($this->senha && !$senha) {
            return $this;
        }
        if (strlen($senha)<5) {
            throw new Exception('O tamanho da senha é inválido! Digite ao menos cinco caracteres');
        }
        $hashDaSenha = hash_hmac('md5', $senha, SALT_SENHA);
        $senha = password_hash($hashDaSenha, PASSWORD_DEFAULT);
        $this->senha = $senha;

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo): self
    {
        $tipo = trim($tipo);
        if (!in_array($tipo, ['Gestor', 'Vendedor'])) {
            throw new Exception('O tipo da pessoa não está definido corretamente (Gestor, Vendedor)');
        }
        $this->tipo = $tipo;

        return $this;
    }

    public function getQtdAcessos()
    {
        return $this->qtdAcessos;
    }

    public function setQtdAcessos(int $qtdAcessos): self
    {
        $this->qtdAcessos = $qtdAcessos;

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