$(function() {

    var criterioLogin6 = false;
    var criterioLoginLetras = false;
    var criterioSenha8 = false;
    var criterioSenhaMaiuscula = false;
    var criterioSenhaDigito = false;
    var criterioSenhasIguais = false;

    function atualizarCriterio(idBase, isValido) {
        if (isValido) {
            $("#" + idBase + "Ok").css({display: 'inline'});
            $("#" + idBase + "Nok").css({display: 'none'});
        } else {
            $("#" + idBase + "Ok").css({display: 'none'});
            $("#" + idBase + "Nok").css({display: 'inline'});
        }
    }

    $("#criarConta").click(function() {
        if (criterioLogin6 && criterioLoginLetras && criterioSenha8 && 
            criterioSenhaMaiuscula && criterioSenhaDigito && criterioSenhasIguais) {
            
            var modalSucesso = new bootstrap.Modal(document.getElementById('modalSucesso'));
            modalSucesso.show();
        } else {
            var modalErro = new bootstrap.Modal(document.getElementById('modalErro'));
            modalErro.show();
        }
    });

    $("input").keyup(function() {

        var login = $("#login").val();
        var senha = $("#novaSenha").val();
        var repitaSenha = $("#repitaSenha").val();

        criterioLogin6 = login.length >= 6;
        atualizarCriterio("LoginAoMenos6", criterioLogin6);

        var regexLetras = /^[a-zA-Z]+$/;
        criterioLoginLetras = regexLetras.test(login);
        atualizarCriterio("LoginApenasLetras", criterioLoginLetras);
        
        criterioSenha8 = senha.length >= 8;
        atualizarCriterio("SenhaAoMenos8", criterioSenha8);

        var regexMaiuscula = /[A-Z]/;
        criterioSenhaMaiuscula = regexMaiuscula.test(senha);
        atualizarCriterio("SenhaAoMenosUmaMaiuscula", criterioSenhaMaiuscula);

        var regexDigito = /\d/;
        criterioSenhaDigito = regexDigito.test(senha);
        atualizarCriterio("SenhaAoMenosUmDigito", criterioSenhaDigito);

        criterioSenhasIguais = (senha === repitaSenha) && (senha.length > 0);
        atualizarCriterio("SenhaRepetidaIgual", criterioSenhasIguais);
    });
});