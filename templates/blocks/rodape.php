<div class="rodape-site py-4 mt-3">
    <div class="container">
        <div class="pgto-social text-center row">
            <div class="col-auto me-auto">
                <strong><i class="fa-regular fa-credit-card"></i> Aceitamos</strong>
                <div class="mt-2 pt-2 border-top border-dark">
                    <i class="fa-brands fs-3 pe-2 fa-cc-visa"></i>
                    <i class="fa-brands fs-3 pe-2 fa-cc-mastercard"></i>
                    <i class="fa-brands fs-3 pe-2 fa-cc-apple-pay"></i>
                    <i class="fa-brands fs-3 pe-2 fa-cc-amex"></i>
                    <i class="fa-brands fs-3 pe-2 fa-pix"></i>
                </div>
            </div>
            <div class="col-auto">
                <strong><i class="fa-solid fa-circle-nodes"></i> Siga nossas redes</strong>
                <div class="mt-2 pt-2 border-top border-dark">
                    <a href="#"><i class="fa-brands fs-3 pe-2 fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fs-3 pe-2 fa-twitter"></i></a>
                    <a href="#"><i class="fa-brands fs-3 pe-2 fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fs-3 pe-2 fa-tiktok"></i></a>
                    <a href="#"><i class="fa-brands fs-3 pe-2 fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="info-matriz row mt-5 text-center">
            <div>Preços o condições exclusivos para o <?= $site??''?> (exceto alimentos e bebidas), podendo sofrer alterações sem prévia notificação.</div>
            <div>
                <?= $nomefantasia??''?> | <?= $site??''?> | <?= $rua??''?>, <?= $bairro??''?>, N°: <?= $numero??''?> |
                <?= $cidade??''?>, <?= $estado??''?> CEP: <?= $cep??''?> | CNPJ: <?= $cnpj??''?> |
                Telefones: <?= $telefone1??''?> - <?= $telefone2??''?>
            </div>
            <div>Observação: Ao utilizar um cupom de desconto, certifique-se de que o mesmo esteja no período de validade.</div>
        </div>
    </div>
</div>