<?php
namespace PetShop\Model;

use Exception;
use PetShop\Core\Attribute\Campo;
use PetShop\Core\Attribute\Entidade;
use PetShop\Core\DAO;
use Respect\Validation\Validator as v;

#[Entidade(name: 'clientes')]
class Cliente extends DAO
{
    #[Campo(label:'Código do Cliente', nn:true, pk:true, auto:true)]
    protected $idCliente;

    #[Campo(label:'Tipo de Cliente', nn:true)]
    protected $tipo;

    #[Campo(label:'CPF/CNPJ do Cliente', nn:true)]
    protected $cpfCnpj;

    #[Campo(label:'Nome do Cliente', nn:true)]
    protected $nome;

    #[Campo(label:'E-mail do Cliente', nn:true)]
    protected $email;

    #[Campo(label:'Senha do Cliente', nn:true)]
    protected $senha;

    #[Campo(label:'Data de Criação', nn:true, auto:true)]
    protected $created_at;

    #[Campo(label:'Data de Alteração', nn:true, auto:true)]
    protected $updated_at;

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $tipo = strtoupper(trim($tipo));
        if (!in_array($tipo, ['F', 'J'])) {
            throw new Exception('O tipo da pessoa não está definido corretamente (F, J)');
        }
        $this->tipo = $tipo;

        return $this;
    }

    public function getCpfCnpj()
    {
        return $this->cpfCnpj;
    }

    public function setCpfCnpj(string $cpfCnpj): self
    {
        if (!in_array($this->tipo, ['F', 'J'])) {
            throw new Exception('O tipo da pessoa precisa ser definido antes do documento!');
        }

        if ($this->tipo == 'F') {
            $docValido = v::cpf()->validate($cpfCnpj);
        } else {
            $docValido = v::cnpj()->validate($cpfCnpj);
        }

        if (!$docValido) {
            throw new Exception('O documento informado é inválido!');
        }
        $this->cpfCnpj = $cpfCnpj;

        return $this;
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

    public function setSenha(string $senha): self
    {
        $hashDaSenha = hash_hmac('md5', $senha, SALT_SENHA);
        $senha = password_hash($hashDaSenha, PASSWORD_DEFAULT);
        $this->senha = $senha;

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