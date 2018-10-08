$(document).ready(function(){
    
   $(document).on("click","#btnUsuarioSalvar",function(){
       
     var frm=$("#frmCadUsuario").serialize();
     
     //controller CadUsuario
     //metodo insert
     $.post(BASE+"CadUsuario/insert",frm).done(function(retorno){
         
         alert(retorno);
         
     });
       
       
   });
   
   
   function listaUsuario(){
       
       
        $.post(BASE+"CadUsuario/lista",{}).done(function(retorno){
         var txt="";
            try{
                
                retorno=JSON.parse(retorno);
                for(var i=0;i<retorno.length;i++){
                    
                   txt+="<tr><td>"+retorno[i].id+"</td>\n\
                         <td>"+retorno[i].nome+"</td>\n\
                         <td><a href=\"#\" class=\"editar\" valor-id=\""+retorno[i].id+"\"><span class=\"glyphicon glyphicon-edit\"></span></a>\n\
                             <a href=\"#\"><span class=\"glyphicon glyphicon-trash\"></span></a>\n\
                         </td></tr>";
                    
                }
                
                $("#listaU").html(txt);
            }
            catch(ee){
                console.log(ee);
            }
         
     });
       
   }
    
    
    $(document).on("click",".editar",function(){
        
         var id=$(this).attr("valor-id");
          $.post(BASE+"CadUsuario/loadData",{idusuario: id}).done(function(retorno){
              
                try{
                
                        retorno=JSON.parse(retorno);
                       $("#txtCadUsuarioId").attr('readonly',true);
                       $("#btnUsuarioGravar").removeClass("hidden");
                        $("#btnUsuarioSalvar").addClass("hidden");
                       $("#txtCadUsuarioId").val(retorno[0].id);
                       $("#txtCadUsuarioNome").val(retorno[0].nome);
              }
              catch(ee){
                  
                  
              }
              
          });
        
    })
    
    
    listaUsuario();
    
});