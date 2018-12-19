$(document).ready(function(){
        
    preencherCombo();
    
    function preencherCombo(){
        
        $.post(BASE+"cadLimite/buscaUnidades", {}).done(function(dados){
        
        
        //$.post(BASE+"cadLimite/buscaUnidades", {}, function (dados) {
            
            var result = JSON.stringify(dados);
            var response = JSON.parse(result);
            
            alert(response);
            /*
            var table = "";
            $.each(response.unidade, function (index, value) {
                table += '<option value="'+value.cnes+'" class="text-uppercase">' + value.descricao + '</option>';
            });
            
            $("#unidades").append(table); //(#unidades é o id do teu select)
            */
        },
        );
   
    }
   
});