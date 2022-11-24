<?php
    $cliente = $_SESSION['cliente'];
    $cliente['prinome'] = substr($cliente['nome'], 0, strpos($cliente['nome'], ' '));
?>
<div class="container my-5">
    <div class="row">
        <div class="col-3 text-center bg-secondary text-light py-2 rounded-2">
            <div>Bem vindo(a): <strong><?=$cliente['prinome']?></strong></div>
            <div style="font-size: .8em">(<?=$cliente['email']?>)</div>
            <div class="mt-5">
                <a href="/logout" class="badge text-bg-danger text-decoration-none">Sair</a>
            </div>
        </div>
        <div class="col-9 ps-5">
            -meus pedidos<br>
            -meus endereços<br>
            -meus favoritos<br>
        </div>
    </div>
</div>