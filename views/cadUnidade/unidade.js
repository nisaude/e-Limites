$(document).ready(function(){
    
    
    
    //Click do botão Incluir Unidade
    $(document).on("click","#btnUnidadeIncluir", function(){
       
        var frm = $("#frmCadUnidade").serialize();
        
        $.post(BASE+"CadUnidade/insert",frm).done(function(retorno){
            
            alert(retorno);
            //listaUsuario();//Atualiza a lista dos usuários cadastrados
            //limpaForm();
        });
        
    });
    
    
});

