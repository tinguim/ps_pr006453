<?php

use PetShop\Model\Promocoes;
?>
<div class="container my-5">
    <div class="row">
        <div class="col-6 mx-auto">
            <h1 class="text-center display-6 pb-2 border-bottom mb-4">Promoções</h1>
            <?=retornaHTMLAlertMensagemSessao()?>
            <?=$dados['promocoes'][0]?>
        </div>
    </div>
</div>