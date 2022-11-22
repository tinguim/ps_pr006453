<?php

/**
 * Função que retorna um ALERT da mensagem presa na sessao e elimina seu conteúdo
 *
 * @return void
 */
function retornaHTMLAlertMensagemSessao()
{
    if (!isset($_SESSION['mensagem']) || !is_array($_SESSION['mensagem'])) {
        return '';
    }

    $tipo = $_SESSION['mensagem']['tipo'];
    $texto = $_SESSION['mensagem']['texto'];

    $bootstrapAlert = <<<HTML
        <div class="alert alert-primary" role="alert">
                {$texto}
        </div>
    HTML;

    unset($_SESSION['mensagem']);

    return $bootstrapAlert;
} 