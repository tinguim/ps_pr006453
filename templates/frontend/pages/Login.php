<div class="container my-5 pg-login">
    
    <div class="row">
        <div class="col-6 mx-auto">
            <?= retornaHTMLAlertMensagemSessao() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-3 ms-auto border-end">
            <h3 class="text-center display-6 pb-2 border-bottom mb-3">Faça seu Logon</h3>
            <?= $formLogin ?>
        </div>
        <div class="col-3 me-auto text-center">
            <h3 class="display-6 pb-2 border-bottom mb-3">Crie sua Conta</h3>
            <a href="/cadastro" class="btn btn-success mt-5 w-75 btn-conta">Criar conta</a>
        </div>
    </div>
</div>