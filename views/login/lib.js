$(document).ready(function(){
    $(document).on("click","#btnok",function(){
        var dados = $("#frmlogin").serialize();
        $.post("/app/login/login",dados).done(function(retorno){
            console.log(retorno);
            if(retorno=="1"){ 
                
                window.location='/app/index';
            }else{
                alert("Tente novamente!");
            }
        });
    });
    // Evento onclick para ir para criar login -->
    $(document).on("click","#btncrialog",function(){
        window.location='crialogin.html';
    });
});