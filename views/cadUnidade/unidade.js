$(document).ready(function(){
    
    listaUnidade();
    
    //Click do botão Incluir Unidade
    $(document).on("click","#btnUnidadeIncluir", function(){
       
        var frm = $("#frmCadUnidade").serialize();
        
        if(validaForm() == true){
            $.post(BASE+"cadUnidadeNovo/insert",frm).done(function(retorno){

                alert(retorno);
                listaUnidade();
                limpaForm();
            }); 
        }
    });
    
    //Click no botão Cancelar da Unidade    // btnUnidadeCancelar
    $(document).on("click","#btnUnidadeCancelar",function (){
        
        inserindo();
        limpaForm();
    });
    
    //Click no botão editar da unidade
    $(document).on("click",".editar",function(){ //Neste caso vai ponto antes do editar por ser o nome da class e não do id que recebe o # antes
        
        limpaForm();
        
        var cnes = $(this).attr("valor-id"); //Salva o valor do atributo valor-id na variável id
        
        $.post(BASE+"cadUnidadeNovo/loadData",{cnesunidade: cnes}).done(function(retorno){ //envia o cnes da unidade para o model como parametro
              
            try{
                retorno=JSON.parse(retorno);
                $("#txtCadUnidCNES").val(retorno[0].cnes);
                $("#txtCadUnidDesc").val(retorno[0].descricao);
                $("#txtCadUnidCEP").val(retorno[0].cep);
                $("#txtCadUnidEnd").val(retorno[0].endereco);
                $("#txtCadUnidBairro").val(retorno[0].bairro);
                $("#txtCadUnidCidade").val(retorno[0].cidade);
                
                editando();      
            }
            catch(ee){
                console.log(ee);
            }              
          });
    });
    
    //Click no botão excluir do unidade
    $(document).on("click",".excluir",function(){ 
            
        var cnes = $(this).attr("valor-id"); //Salva o valor do atributo valor-id na variável id
        try{
            if (window.confirm("Confirma a exclusão da unidade CNES "+cnes+" ?")){

                $.post(BASE+"cadUnidadeNovo/del",{cnesunidade: cnes}).done(function(retorno){ //envia o idusuario para o model como parametro

                    alert(retorno);
                    window.location.reload();
                });
            }

            listaUnidade();
            limpaForm();
        }
        catch(ee){
            console.log(ee);
        }  
    });    
    
    
    //Lista de Unidades
    function listaUnidade(){
       
        $.post(BASE+"cadUnidadeNovo/lista",{}).done(function(retorno){
            
            var txt="";
            
            try{
                
                retorno=JSON.parse(retorno);// JSON.parse converte o retorno do select(lista) em formato JSON
                for(var i=0;i<retorno.length;i++){
                    
                    txt+="<tr><td>"+retorno[i].cnes+"</td>\n\
                              <td>"+retorno[i].descricao+"</td>\n\
                              <td><a href=\"#\" class=\"editar\" valor-id=\""+retorno[i].cnes+"\"><span class=\"glyphicon glyphicon-edit\"></span></a>\n\
                                  <a href=\"#\" class=\"excluir\" valor-id=\""+retorno[i].cnes+"\"><span class=\"glyphicon glyphicon-trash\"></span></a>\n\
                         </td></tr>";
                }
                
                $("#listaU").html(txt); //Pega tudo o que foi incluído pelo for na variável txt e joga no body chamado listaU
                
            }
            catch(ee){
                console.log(ee);
            }
        });
    }
    
    
    function limpaForm() {
        document.getElementById('txtCadUnidCNES').value="";
        document.getElementById('txtCadUnidDesc').value="";
        document.getElementById('txtCadUnidCEP').value="";
        document.getElementById('txtCadUnidEnd').value="";
        document.getElementById('txtCadUnidBairro').value="";
        document.getElementById('txtCadUnidCidade').value="";
    }
    
    function editando(){
        $("#txtCadUnidCNES").attr('readonly',true); //Campo ID não alterável
        $("#btnUnidadeAlterar").removeClass("hidden"); //Retira a class hidden do botão para se tornar visível
        $("#btnUnidadeCancelar").removeClass("hidden"); //Retira a class hidden do botão para se tornar visível
        $("#btnUnidadeIncluir").addClass("hidden"); // Torna oculto o borão Incluir
    }
    
    function inserindo() {
        $("#txtCadUnidCNES").attr('readonly',false);
        $("#btnUnidadeAlterar").addClass("hidden"); //Torna botão oculto
        $("#btnUnidadeCancelar").addClass("hidden"); //Torna botão oculto
        $("#btnUnidadeIncluir").removeClass("hidden"); //Torna botão Visível
    }
    
    function validaForm(){
  
        if(document.frmCadUnidade.txtCadUnidCNES.value=="" || document.frmCadUnidade.txtCadUnidCNES.value.length < 7){
            alert( "CNES inválido!!!" );
            document.frmCadUnidade.txtCadUnidCNES.focus();
            return false;
        }
        //document.frmCadUsuario.txtCadUsuarioNome.value.indexOf('@')==-1       SE NÃO POSSUI @ É INCORRETO
        if( document.frmCadUnidade.txtCadUnidDesc.value==""){
            alert( "O Campo descrição é obrigatório!" );
            document.frmCadUnidade.txtCadUnidDesc.focus();
            return false;
        }

        return true;
    }    
    
    
    
});

