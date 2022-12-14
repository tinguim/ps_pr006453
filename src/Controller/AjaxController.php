<?php
namespace Petshop\Controller;

use PetShop\Core\DB;

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
}