





































<div>
<i class="bi bi-credit-card"></i>
no cartão em até 8x de R$
<?= number_format($produto['precodesconto']/8, 2, ',', '.')?> <br>
(sem juros)
</div>
<?php
    endif;
?>
<div class="btn-adicionar mt-4 row">
    <div class="col-3 me-auto text-center">
        <a href="#" class="fs-4 text-danger p-2 curtir-produto" data-idproduto="<?=$produto['idproduto']?>" title="Favoritar este produto">
            <i class="bi <?=($produto['ativo'] == "S") ? 'bi-heart-fill' : 'bi-heart' ?>"></i>
        </a>
    </div>
    <div class="col-8">
        <a href="/carrinho/<?=$produto['idproduto']?>/add" class="btn btn-danger w-100">
            <i class="bi bi-cart-check"></i> Comprar
        </a>
    </div>
</div>

<!--  FIM DO BLOCO DA DIREITA -->
</div>

<!-- FIM DA LINHA DO TOPO DO PRODUTO