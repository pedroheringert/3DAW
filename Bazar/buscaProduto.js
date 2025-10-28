$(function() {
    $("#buscar").click(function() {

        var codigo = $("#codigo").val();

        $.ajax({
            type: "GET",
            url: "/bazar/buscaProduto.php",
            data: { codigo },
            success: (result,status) => {
                console.log(result);
                console.log(status);
                $("#descricao").val( result.descricao);
                $("#preco").val( new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(
                    result.preco
                  ));
            },
            error: (xhr,status,error) => {
                console.warn(xhr);
                console.warn(status);
                console.warn(error);
                const modal = new bootstrap.Modal('#modal', {});
                if(xhr.status === 404) {
                    $("#mensagemModal").html("Produto não existe");
                } else {
                    $("#mensagemModal").html("Erro ao consultar produto!");
                };
                modal.show();                 
            }
        });
    });

    $("#codigo").change(function() {
        $("#descricao").val("");
        $("#preco").val("");
    });
});