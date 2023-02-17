<?php
namespace Petshop\Controller;

use PetShop\Core\DB;
use PetShop\Model\Produto;

class AjaxController
{
    /**
     * Função que recebe as ações solicitadas e escolhe o metódo que deve ser executado
     *
     * @return void
     */
    public function loader()
    {
        if (empty($_POST['acao'])) {
            $this->retorno('error', 'Ação não definida, contate o suporte');
        }

        if (!method_exists($this, $_POST['acao'])) {
            $this->retorno('error', 'Ação não implementada, contate o suporte');
        }

        $acao = $_POST['acao'];

        $this->$acao($_POST);
    }

    /**
     * Retorna um objeto JSON para o cliente
     *
     * @param string $status error, info, warning, question
     * @param string $mensagem
     * @param array $dados
     * @return void
     */
    public function retorno(string $status, string $mensagem, array $dados=[])
    {
        $resposta = [
            'status' => $status,
            'mensagem' => $mensagem,
            'dados' => $dados
        ];

        header('Content-type: application/json; chaset=utf-8');
        die(json_encode($resposta));
    }

    #Implementar as funções de retorno de ajax daqui pra baixo

    public function curtir($dados)
    {
        if (empty($_SESSION['cliente'])) {
            $this->retorno('error', 'Você precisa fazer o login antes');
        }

        $produto = new Produto;
        if (empty($dado['idproduto']) || !$produto->loadById($dados['idproduto'])) {
            $this->retorno('error', 'O produto informado não existe');
        }

        $sql = 'SELECT idfavorito, ativo
                FROM favoritos
                WHERE idproduto = ?
                AND idcliente = ?';
        $parametros = [$dados['idproduto'], $_SESSION['cliente']['idcliente']];

        $rows = DB::select($sql, $parametros);

        $curtiu = true;
        if (!$rows) {
            $sql = 'INSERT INTO favoritos (idproduto, idcliente) VALUES (?, ?)';
        } else if ($rows[0]['ativo'] == 'N') {
            $sql = 'UPDATE favoritos SET ativo = "S" WHERE idproduto = ? AND idcliente = ?';
        } else {
            $sql = 'UPDATE favoritos SET ativo = "N" WHERE idproduto = ? AND idcliente = ?';
            $curtiu = false;
        }

        $st = DB::query($sql, $parametros);

        if ($st->rowCount()) {
            $this->retorno('success', 'Ação registrada com sucesso', ['curtiu' => $curtiu]);
        }

        $this->retorno('error', 'Falha ao registrar ação, nenhum registro alterado');
    }

    public function carrinho(array $dados)
    {
        if (empty($_SESSION['cliente'])) {
            $this->retorno('error', 'Você precisa fazer o login antes');
        }

        $produto = new Produto;
        if (empty($dado['idproduto']) || !$produto->loadById($dados['idproduto'])) {
            $this->retorno('error', 'O produto informado não existe');
        }

        //se vier ZERO então removemos o produto do carrinho
        if (!isset($dados['quantidade'])) {
            $this->retorno('error', 'A quantidade precisa ser informada');
        }

        $idcliente = (int) $_SESSION['cliente']['idcliente'];
        $idproduto = (int) $_SESSION['idproduto'];
        $quantidade = (int) $_SESSION['quantidade'];

        if ($produto->getQuantidade() < $quantidade) {
            $this->retorno('info', 'A quantidade é inferior a que temos no estoque');
        }

        $sql = 'SELECT idcarrinho
                FROM carrinhos
                WHERE idcliente = ?
                AND encerrado = "N"';
        $rows = DB::select($sql, [$idcliente]);
        if (empty($rows)) {
            $sql = 'INSERT INTO carrinho (idcliente, valortotal) VALUES (?, 0)';
            $st = DB::query($sql, [$idcliente]);

            if (!$st->rowCount()) {
                $this->retorno('error', 'Falha ao criar seu carrinho de compras, entre em contato com o suporte');
            }

            $idcarrinho = DB::getInstance()->lastInsertId();
        } else {
            $idcarrinho = $rows[0]['idcarrinho'];
        }

        if ($quantidade == 0) {
            $sql = 'DELETE FROM carrinhosprodutos WHERE idcarrinho = ? AND isproduto = ?';
            DB::query($sql, [$idcarrinho, $idproduto]);
        } else {
            $sql = 'SELECT idproduto
                    FROM carrinhosprodutos
                    WHERE idcarrinho = ?
                    AND idproduto = ?';
            $rows = DB::select($sql, [$idcarrinho, $idproduto]);

            //se o produto não existir no carrinho criamos o registro
            if (empty($rows)) {
                $sql = 'INSERT INTO carrinhosprodutos (idproduto, idcarrinho, preco, quantidade) VALUES (?, ?, ?, ?)';
                $parametros = [$idproduto, $idcarrinho, $produto->preco, $quantidade];
            } else {
                $sql = 'UPDATE carrinhosprodutos
                        SET quantidade = ?, preco = ?
                        WHERE idproduto = ?
                        AND idcarrinho = ?';
                $parametros = [$quantidade, $produto->preco, $idcarrinho, $idproduto];  
            }

            DB::query($sql, $parametros);
        }

        $sql = 'UPDATE carrinhos
                SET valortotal = (SELECT SUM(preco * quantidade)
                                    FROM carrinhosprodutos
                                    WHERE idcarrinho = ?)
                WHERE idcarrinho = ?';
        DB::query($sql, [$idcarrinho, $idcarrinho]);

        $this->retorno('success', 'Processo executado com sucesso');
    }
}