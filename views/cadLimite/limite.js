$(document).ready(function(){
    
    
    $(document).on('blur','#txtCEP',function(){
        
        var cep=$("#txtCEP").val();
        if(cep.length>7){
            
            
            $.post(BASE+"CadLimite/lista",{c: cep}).done(function(retorno){
               try{ 
                    retorno=JSON.parse(retorno);
                    if(retorno.length>0){
                        //achou no bd local
                        
                    }
                    else{
                        
                        //viacep
                    }
                   }
            catch(ee){
                
                
            }
            });
            
            
        }
        
        
    });
    
    
    
});