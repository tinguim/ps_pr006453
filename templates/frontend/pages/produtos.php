<?php
    $produto['desconto'] ??= 0.15;
    $produto['precodesconto'] = $produto['preco'] * (1 - $produto['desconto']);
?>

<div>
<i class="bi bi-credit-card"></i>
no cartão em até 8x de R$
<?= number_format($produto['precodesconto']/8, 2, ',', '.')?> <br>
(sem juros)
</div>

<div class="btn-adicionar mt-4 row">
    <div class="col-3 me-auto text-center">
        <a href="#" class="fs-4 text-danger p-2 curtir-produto" data-idproduto="<?=$produto['idproduto']?>" title="Favoritar este produto">
            <i class="bi <?=($produto['ativo'] == "S") ? 'bi-heart-fill' : 'bi-heart' ?>"></i>
        </a>
    </div>
    <div class="col-8">
        <a href="#" class="btn btn-danger w-100 comprar-produto" data-idproduto="<?= $produto['idproduto']?>" data-quantidade="1"> 
            <i class="bi bi-cart-check"></i> Comprar
        </a>
    </div>
</div>


<div class="row mt-5"></div>