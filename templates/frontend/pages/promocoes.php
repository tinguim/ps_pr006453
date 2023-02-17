
<div class="container my-5">
    <div class="row">
        <div class="col-6 mx-auto">
            <h1 class="text-center display-6 pb-2 border-bottom mb-4">Promoções</h1>
            <?=retornaHTMLAlertMensagemSessao()?>
            <?php foreach($promocoes as $p): ?>
            <div class="col-2">
                <img src="<?=$p['imagens'][0]['url']?>" alt="" class="img-fluid">
            </div>
            <div class="col-6">
                <?=$p['titulo']?>
            </div>
            <div class="col-2">
                <input type="text" value="<?=$p['descricao']?>">
            </div>
        </div>
    </div>
</div>