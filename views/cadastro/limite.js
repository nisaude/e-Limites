//JQuery
$(function(){
    //Chama o formulário
    $('.frmCadLimite').submit(function(){
        $.ajax({
            url: 'envia.php', //Destino dos dados
            type: 'POST', //Tipo
            data: $('.frmCadLimite').serialize(), //data recebe os dados do formulário
            sucess: function( data ) { //Se tiver sucesso
                if ( data = '' ){ //Se tiver dados
                    $('.recebeDados').html( data );
                } else {
                    alert ('Existem campos em branco!');
                }
            }
        });
        return false; //Para não enviar
    )};
)};