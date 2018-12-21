$(document).ready(function(){
        
    preencherCombo();
    
    function preencherCombo(){
        
        //$.post(BASE+"cadLimite/buscaUnidades", {}).done(function(dados){
        $.post(BASE+"cadLimite/buscaUnidades", {}, function (dados) {
            
            var response = JSON.parse(dados);
            var txt = "";
            
            try{

                $.each(response, function (index, value) { //index para indexar
                    txt+="<option value="+value.cnes+" class=\" \">"+value.descricao+"</option>";
                });
                
                $("#unidades").append(txt); //(#unidades é o id do teu select)
                
            }
            catch(ee){
                console.log(ee);
            }
                        
        },
        );
   
    }
   
   
   
   
});