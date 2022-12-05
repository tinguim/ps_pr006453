<?php
namespace Petshop\Controller;

use PetShop\Core\DB;
use PetShop\Core\Exception;

class AdminRemoveController
{
    public function acao($model, $idmodel)
    {
            $urlOrigemClick = $_SERVER['HTTP_REFERER'];

        $modelPath = "Petshop\\Model\\{$model}";
        if (!class_exists($modelPath)) {
            redireciona($urlOrigemClick, 'danger', 'Página não localizada, Classe de dados não definida');
        }

        $objeto = new $modelPath;

        if (!$objeto->loadById($idmodel)) {
            redireciona($urlOrigemClick, 'danger', 'O registro informado não foi localizado em: ' . $model);
        }

        try {
            $tabelaAlvo = $objeto->getTableName();
            $campoChave = $objeto->getPkName();

            if ($tabelaAlvo == 'arquivos') {
                $nomeArquivo = $objeto->idarquivo . '.' . pathinfo($objeto->nome, PATHINFO_EXTENSION);
                $nomeArquivo = PATH_PROJETO . 'public/assets/img/uploads/' . $nomeArquivo;
            }
           

            $sql = "DELETE FROM {$tabelaAlvo} WHERE {$campoChave} = ?";
            $st = DB::query($sql, [$idmodel]);

            if ($st->rowCount()) {
                if (!empty($nomeArquivo)) {
                    unlink($nomeArquivo);
                }
                redireciona($urlOrigemClick, 'success', 'Registro removido com sucesso!');
            }
                redireciona($urlOrigemClick, 'warning', 'Registro não pode ser removido');

        } catch(Exception $e) {
            redireciona($urlOrigemClick, 'danger', $e->getMessage());
        }
    }
}