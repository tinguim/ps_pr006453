<div class="container">

    <div class="row w-75 mx-auto">
        <div class="col-12 text-center mt-1 mb-3">
            <h1><?=$categoria['nome']?></h1>
        </div>
        <div class="col-2">
            <img src="<?=$categoria['imagens'][0]['url']?>" class="img-fluid" alt="<?=$categoria['nome']?>">
        </div>
        <div class="col-10">
            <?=$categoria['descricao']?></h1>
        </div>
    </div>

    <hr class="mb-5">

    <div class="row row-cols-5">
        <?php
            foreach($produtos as $p) {
                $primeiraImagem = $p['imagens'][0]['url'] ?? 'https://picsum.photos/300';
                $preco = number_format($p['preco'], 2, ',', '.');
                $nome = strlen($p['nome'])<50 ? $p['nome'] : substr($p['nome'], 0, 50) . '...';
                $link = '/produtos/' . $p['idproduto'];
                echo <<<HTML
                    <div clas="col produto position-relative mb-3">
                        <img src="{$primeiraImagem}" class="img-fluid" alt="{$p['nome']}">
                        <p class="mb-0 mt-2">{$nome}</p>
                        <a class="btn btn-success btn-sm w-100 my-2 stretched-link" href="{$link}">R$ {$preco}</a>
                    </div>
                HTML;
            }
        ?>
    </div>
</div>