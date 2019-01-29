$(document).ready(function(){
    
    listaUsuario();
    
    //Click do botão Incluir usuário
    $(document).on("click","#btnUsuarioSalvar",function(){
       
        var frm=$("#frmCadUsuario").serialize(); //Varre o formulário
        
        if(validaForm() == true){
        //controller CadUsuario
        //metodo insert        
        $.post(BASE+"cadUsuario/insert",frm).done(function(retorno){
         
            alert(retorno);
            listaUsuario();//Atualiza a lista dos usuários cadastrados
            limpaForm();
        });
        
        
        }
        
    });
    
    //Click no botão cancelar do usuário
    $(document).on("click","#btnUsuarioCancelar",function(){ //Neste caso vai ponto antes do editar por ser o nome da class e não do id que recebe o # antes
            
        inserindo();
        limpaForm();
    });
   
   
    //Click no botão Salvar Alteração (UPDATE) do usuário
    $(document).on("click","#btnUsuarioEditar",function(){ //Neste caso vai ponto antes do editar por ser o nome da class e não do id que recebe o # antes
        
        var frm = $("#frmCadUsuario").serialize(); //Varre o formulário
        
        $.post(BASE+"cadUsuario/edit",frm).done(function(retorno){
         
            alert(retorno);
            listaUsuario();
            limpaForm();
            inserindo();
        });
        
    });
    
   
    //Click no botão editar do usuário
    $(document).on("click",".editar",function(){ //Neste caso vai ponto antes do editar por ser o nome da class e não do id que recebe o # antes
        
        limpaForm();
        
        var id = $(this).attr("valor-id"); //Salva o valor do atributo valor-id na variável id
        $.post(BASE+"cadUsuario/loadData",{idusuario: id}).done(function(retorno){ //envia o idusuario para o model como parametro
              
            try{
                retorno=JSON.parse(retorno);
                $("#txtCadUsuarioId").val(retorno[0].id);
                $("#txtCadUsuarioNome").val(retorno[0].nome);
                editando();
            }
            catch(ee){
                console.log(ee);
            }              
          });
    });
    
    
    //Click no botão excluir do usuário
    $(document).on("click",".excluir",function(){ //Neste caso vai ponto antes do editar por ser o nome da class e não do id que recebe o # antes
            
        var id = $(this).attr("valor-id"); //Salva o valor do atributo valor-id na variável id
        try{
            if (window.confirm("Confirma a exclusão do usuário de Matrícula nº "+id+" ?")){

                $.post(BASE+"cadUsuario/del",{idusuario: id}).done(function(retorno){ //envia o idusuario para o model como parametro

                    alert(retorno);
                    window.location.reload();
                });
            }

            listaUsuario();
            limpaForm();
        }
        catch(ee){
            console.log(ee);
        }  
    });
   
   
   
  
    //Lista de Usuários
    function listaUsuario(){
       
        $.post(BASE+"cadUsuario/lista",{}).done(function(retorno){
            
            var txt="";
            
            try{
                
                retorno=JSON.parse(retorno);// JSON.parse converte o retorno do select(lista) em formato JSON
                for(var i=0;i<retorno.length;i++){
                    
                    txt+="<tr><td>"+retorno[i].id+"</td>\n\
                              <td>"+retorno[i].nome+"</td>\n\
                              <td><a href=\"#\" class=\"editar\" valor-id=\""+retorno[i].id+"\"><span class=\"glyphicon glyphicon-edit\"></span></a>\n\
                                  <a href=\"#\" class=\"excluir\" valor-id=\""+retorno[i].id+"\"><span class=\"glyphicon glyphicon-trash\"></span></a>\n\
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
        document.getElementById('txtCadUsuarioId').value="";
        document.getElementById('txtCadUsuarioNome').value="";
        document.getElementById('txtCadUsuarioSenha').value="";
        document.getElementById('txtCadUsuarioConfSenha').value="";
    }
    
    function editando(){
        $("#txtCadUsuarioId").attr('readonly',true); //Campo ID não alterável
        $("#btnUsuarioEditar").removeClass("hidden"); //Retira a class hidden do botão para se tornar visível
        $("#btnUsuarioCancelar").removeClass("hidden"); //Retira a class hidden do botão para se tornar visível
        $("#btnUsuarioSalvar").addClass("hidden"); // Torna oculto o borão Incluir
    }
    
    function inserindo() {
        $("#txtCadUsuarioId").attr('readonly',false);
        $("#btnUsuarioEditar").addClass("hidden"); //Torna botão oculto
        $("#btnUsuarioCancelar").addClass("hidden"); //Torna botão oculto
        $("#btnUsuarioSalvar").removeClass("hidden"); //Torna botão Visível
    }
      
    function validaForm(){
  
        if(document.frmCadUsuario.txtCadUsuarioId.value=="" || document.frmCadUsuario.txtCadUsuarioId.value.length < 5){
            alert( "Matrícula inválida (Mínimo 5 Caractéres)" );
            document.frmCadUsuario.txtCadUsuarioId.focus();
            return false;
        }
        //document.frmCadUsuario.txtCadUsuarioNome.value.indexOf('@')==-1       SE NÃO POSSUI @ É INCORRETO
        if( document.frmCadUsuario.txtCadUsuarioNome.value==""){
            alert( "Preencha campo Nome corretamente!" );
            document.frmCadUsuario.txtCadUsuarioNome.focus();
            return false;
        }

        if (document.frmCadUsuario.txtCadUsuarioSenha.value=="") {
            alert( "Preencha o campo Senha!" );
            document.frmCadUsuario.txtCadUsuarioSenha.focus();
            return false;
        }

        if (document.frmCadUsuario.txtCadUsuarioConfSenha.value != document.frmCadUsuario.txtCadUsuarioSenha.value) {
            alert( "As senhas são divergentes!" );
            document.frmCadUsuario.txtCadUsuarioSenha.focus();
            return false;
        }
        return true;
    }
    
    function somenteNumeros(e) {
        var charCode = e.charCode ? e.charCode : e.keyCode;
        // charCode 8 = backspace   
        // charCode 9 = tab
        if (charCode != 8 && charCode != 9) {
            // charCode 48 equivale a 0   
            // charCode 57 equivale a 9
            if (charCode < 48 || charCode > 57) {
                return false;
            }
        }
    }    
    
});