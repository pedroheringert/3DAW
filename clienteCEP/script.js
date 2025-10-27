$(function() {
    
    
    $('#btnInformar').on('click', function() {
        
      
        var cep = $('#CEP').val();

        $.ajax({
            
            url: `https://viacep.com.br/ws/${cep}/json/`,
            method: 'GET',
            dataType: 'json', 

            success: function(data) {
                if (data.erro) {
                    
                    $('#Resultado').html('<p class="error">CEP não encontrado.</p>');
                } else {
                    var resultado = `
                        <p><strong>CEP:</strong> ${data.cep}</p>
                        <p><strong>Logradouro:</strong> ${data.logradouro}</p>
                        <p><strong>Bairro:</strong> ${data.bairro}</p>
                        <p><strong>Cidade:</strong> ${data.localidade}</p>
                        <p><strong>Estado:</strong> ${data.uf}</p>
                    `;
                    
                    $('#Resultado').html(resultado);
                }
            },

            error: function(xhr, status, error) {
                console.error("Erro na requisição:", status, error);
                
                $('#Resultado').html('<p class="error">Ocorreu um erro ao buscar o CEP. Tente novamente.</p>');
            }
        });
    });
});