$(document).ready(function(){
    
    $(document).on("click","#btnok",function(){
        var dados = $("#frmlogin").serialize();
        $.post("/app/login/login",dados).done(function(retorno){
            console.log(retorno);
            if(retorno=="1"){  
                alert("Seja bem-vindo!");
                window.location='/app/index';
            }else{
                alert("Login ou senha inválidos");
            }
        });
    });
    
    
    document.addEventListener('keydown', function (event) {
       
        if (event.keyCode !== 13) return;
        var dados = $("#frmlogin").serialize();
        $.post("/app/login/login",dados).done(function(retorno){
            console.log(retorno);
            if(retorno=="1"){  
                alert("Seja bem-vindo!");
                window.location='/app/index';
            }else{
                alert("Login ou senha inválidos");
            }
        });
        
    });
    
    
    
});