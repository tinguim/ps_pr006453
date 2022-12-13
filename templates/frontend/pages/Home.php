<div class="container pt-3">

    <?= retornaHTMLAlertMensagemSessao() ?>

    <div class="row mb-5 mt-2">

        <div class="col-8">
            <div id="carouselTopoHome" class="carousel-slide" data-bs-ride="carousel">
                <div class="carousel-inner ratio ratio-21x9">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/assets/img/figura-1.jpg" class="d-block w-100" alt="FIGURA DO BANNER">
                                <div class="carousel-caption d-none d-md-block text-light">
                                    <h5>Bivo - Animais</h5>
                                    <p><i>para melhor atender nossos melhores amigos</i></p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/figura-2.jpg" class="d-block w-100" alt="FIGURA DO BANNER">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Sua melhor companhia</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="/assets/img/figura-3.jpg" class="d-block w-100" alt="FIGURA DO BANNER">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Os mais fofos</h5>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselTopoHome" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselTopoHome" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Próximo</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-4 d-flex flex-column justify-content-between">
            <div class="pb-3 rounded-2 display-6 text-center w-100">
                Vantagens exclusivas
            </div>
            <div class="item-vantagens d-flex p-3 rounded-2 w-40 mx-auto bg-light">
                <div class="icone me-2"><i class="bi bi-stopwatch"></i></div>
                <div class="texto">Receba em Horas</div>
            </div>
            <div class="item-vantagens d-flex p-3 rounded-2 w-40 mx-auto bg-light">
                <div class="icone me-2"><i class="bi bi-truck"></i></div>
                <div class="texto">Frete Grátis - RS</div>
            </div>
            <div class="item-vantagens d-flex p-3 rounded-2 w-40 mx-auto bg-light">
                <div class="icone me-2"><i class="bi bi-cash-stack"></i></div>
                <div class="texto">Parcele em até 12x</div>
            </div>
            <div class="item-vantagens d-flex p-3 rounded-2 w-40 mx-auto bg-light">
                <div class="icone me-2"><i class="bi bi-shop"></i></div>
                <div class="texto">Retire na Loja</div>
            </div>
        </div>
    </div>

    <div class="row my-5">

        <div id="carouselCategorias" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $ativo = 'active';
                $itensPorPagina = 5;
                $qtdItensCarousel = ceil(count($categorias) / $itensPorPagina);
                $categoriaAtual = 0;
                for ($i = 1; $i <= $qtdItensCarousel; $i++) {
                    echo "<div class='carousel-item {$ativo}'>";
                    echo "<div class='row row-cols-5' style='padding:0 10em'>";
                    for ($j = 0; $j < $itensPorPagina; $j++) {
                        $dadosCategoriaAtual = $categorias[$categoriaAtual];
                        echo <<<HTML
                            <div class="col">
                                <div class="d-flex flex-column h-100 justify-content-between">
                                    <img src="{$dadosCategoriaAtual['imagens'][0]['url']}" class="img-fluid">
                                    <a class="text-center btn btn-primary mt-3" href="/categorias/{$dadosCategoriaAtual['idcategoria']}">
                                        {$dadosCategoriaAtual['nome']}
                                    </a>
                                </div>
                            </div>
                        HTML;
                        $categoriaAtual++;
                        if (empty($categorias[$categoriaAtual])) {
                            break;
                        }
                    }
                    echo "</div>";
                    echo "</div>";
                    $ativo = '';
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselCategorias" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselCategorias" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
    </div>
</div>