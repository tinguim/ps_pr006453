<div class="container">
    <div class="row w-75 mx-auto mt-3">
        <?=retornaHTMLAlertMensagemSessao()?>

        <h1 class="h3 text-center">Carrinho de Compras</h1>

        <hr class="my-3">

        <?php foreach($produtos as $produto): ?>
            <div class="col-2">
                <img src="<?=$produto['imagens'][0]['url']?>" alt="" class="img-fluid">
            </div>
            <div class="col-6">
                <?=$produto['nome']?>
            </div>
            <div class="col-2">
                <input type="text" value="<?=$produt['quantidade']?>">
            </div>
    </div>
</div>