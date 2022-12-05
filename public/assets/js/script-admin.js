document.querySelectorAll('.table .link-excluir'). forEach(link=>{
    //para cada link com a classe .link-excluir, adiciona-se confirmação
    link.addEventListener('click', e=>{
        //impedir que href do link seja adicionado
        e.preventDefault;

        Swal.fire({
            title: 'ATENÇÃO! Cuidado...',
            html: "Tem certeza que deseja remover este registro?<br><br>Você <b>NÃO</b> poderá rever está decisão!",
            icon: 'warning', //danger = error
            showCancelButtom: true,
            confirmButtomColor: '#3085d6',
            cancelButtomColor: '#d33',
            confirmButtomText: 'Sim, remova!',
            cancelButtomText: 'Cancelar',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link.href;
            }
        });
    });
});