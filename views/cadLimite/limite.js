/* global BASE */

$(document).ready(function(){
        
    preencherCombo();
    encontrou = true;
    
    //PESQUISA POR CEP
    $(document).on("blur", "#txtCadCEP", function (){
        var cep = document.getElementById("txtCadCEP").value;  //Salva o valor do campo na variável
        limpaForm();
        $.post(BASE+"cadLimite/loadCEP",{cepLimite: cep}).done(function(retorno){ //envia o cep para o model como parametro
            var txt="";              
            try{
                retorno=JSON.parse(retorno);
                
                if (retorno.length>0){
                    
                    $("#txtIBGE").val(retorno[0].ibge);
                    $("#txtLogradouro").val(retorno[0].logradouro);
                    $("#txtBairro").val(retorno[0].bairro);
                    $("#txtCidade").val(retorno[0].cidade);
                    $("#txtUF").val(retorno[0].uf);

                    for(var i=0;i<retorno.length;i++){   
                        txt+="<tr><td>"+retorno[i].id+"</td>\n\
                                  <td>"+retorno[i].cep+"</td>\n\
                                  <td>"+retorno[i].logradouro+"</td>\n\
                                  <td>"+retorno[i].bairro+"</td>\n\
                                  <td>"+retorno[i].num_inicial+"</td>\n\
                                  <td>"+retorno[i].num_final+"</td>\n\
                                  <td><a href=\"#\" class=\"editar\" valor-id=\""+retorno[i].id+"\"><span class=\"glyphicon glyphicon-edit\"></span></a>\n\
                                      <a href=\"#\" class=\"excluir\" valor-id=\""+retorno[i].id+"\"><span class=\"glyphicon glyphicon-trash\"></span></a>\n\
                             </td></tr>";
                    }                
                    $("#listaLimites").html(txt); //Pega tudo o que foi incluído pelo for na variável txt e joga no body chamado listaU
                    $("#lblStatus").html("Dados da BASE LOCAL");
                } else {
                    limpaForm();
                    pesquisaCep(cep);
                    /*
                    if (encontrou == true){
                        document.getElementById("txtIBGE").disabled = false;
                        document.getElementById("txtLogradouro").disabled = false;
                        document.getElementById("txtBairro").disabled = false;
                        document.getElementById("txtCidade").disabled = false;
                        document.getElementById("txtUF").disabled = false;
                    }else{
                        document.getElementById("txtIBGE").disabled = true;
                        document.getElementById("txtLogradouro").disabled = true;
                        document.getElementById("txtBairro").disabled = true;
                        document.getElementById("txtCidade").disabled = true;
                        document.getElementById("txtUF").disabled = true;
                    }*/
                }
            }
            catch(ee){
                console.log(ee);
            }              
          });
        
    });
    /*
    //PESQUISA POR LOGRADOURO
    $(document).on("blur", "#txtLogradouro", function (){
        var logradouro = document.getElementById("txtLogradouro").value;  //Salva o valor do campo na variável
        //var logradouro = ("'"+logradouro+"'");
        //limpaForm();
        $.post(BASE+"cadLimite/loadLogradouro",{lograLimite: logradouro}).done(function(retorno){ //envia o logradouro para o model como parametro
            var txt=""; 
            try{
                retorno=JSON.parse(retorno);
                if (retorno.length>0){
                    for(var i=0;i<retorno.length;i++){   
                        txt+="<tr><td>"+retorno[i].id+"</td>\n\
                                  <td>"+retorno[i].cep+"</td>\n\
                                  <td>"+retorno[i].logradouro+"</td>\n\
                                  <td>"+retorno[i].bairro+"</td>\n\
                                  <td>"+retorno[i].num_inicial+"</td>\n\
                                  <td>"+retorno[i].num_final+"</td>\n\
                                  <td><a href=\"#\" class=\"editar\" valor-id=\""+retorno[i].id+"\"><span class=\"glyphicon glyphicon-edit\"></span></a>\n\
                                      <a href=\"#\" class=\"excluir\" valor-id=\""+retorno[i].id+"\"><span class=\"glyphicon glyphicon-trash\"></span></a>\n\
                             </td></tr>";
                    }                
                    $("#listaLimites").html(txt); //Pega tudo o que foi incluído pelo for na variável txt e joga no body chamado listaU
                    $("#lblStatus").html("Dados da BASE LOCAL");
                } else {
                    alert('Rua não cadastrada!');
                    setTimeout(function(){$("#txtLogradouro").select()}, 50);
                }
            }
            catch(ee){
                console.log(ee);
            }              
          });
        
    }); */
    
    
    //Click do botão INCLUIR Limite
    $(document).on("click","#btnCadLimiteIncluir", function(){
        var frm = $("#frmCadLimite").serialize();
        
        
            $.post(BASE+"cadLimite/insert",frm).done(function(retorno){
                alert(retorno);
                listaUnidade();
                limpaForm();
            });
    });
    
    
    /*
    function validaForm(){
        
        if(document.frmCadLimite.txtCadCEP.value=="" || document.frmCadUnidade.txtCadUnidCNES.value.length < 7){
            alert( "CNES inválido!!!" );
            document.frmCadUnidade.txtCadUnidCNES.focus();
            return false;
        }
    }*/
    
    function preencherCombo(){
        
        //$.post(BASE+"cadLimite/buscaUnidades", {}).done(function(dados){ //Outra forma
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
        
    //Lista de Limites Cadastrados
    function listaLimites(){
       
        $.post(BASE+"cadLimite/lista",{}).done(function(retorno){
            
            var txt="";
            
            try{
                retorno=JSON.parse(retorno);// JSON.parse converte o retorno do select(lista) em formato JSON
                for(var i=0;i<retorno.length;i++){   
                    txt+="<tr><td>"+retorno[i].id+"</td>\n\
                              <td>"+retorno[i].cep+"</td>\n\
                              <td>"+retorno[i].logradouro+"</td>\n\
                              <td>"+retorno[i].bairro+"</td>\n\
                              <td>"+retorno[i].num_inicial+"</td>\n\
                              <td>"+retorno[i].num_final+"</td>\n\
                              <td><a href=\"#\" class=\"editar\" valor-id=\""+retorno[i].id+"\"><span class=\"glyphicon glyphicon-edit\"></span></a>\n\
                                  <a href=\"#\" class=\"excluir\" valor-id=\""+retorno[i].id+"\"><span class=\"glyphicon glyphicon-trash\"></span></a>\n\
                         </td></tr>";
                }                
                $("#listaLimites").html(txt); //Pega tudo o que foi incluído pelo for na variável txt e joga no body chamado listaU
            }
            catch(ee){
                console.log(ee);
            }
        });
    }
    
    
    
});
    
    function pesquisaCep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep !== "") {

            //Expressão regular para validar o CEP. Metacaracteres
            var validacep1 = /^[0-9]{8}$/;
            
            //Valida o formato do CEP.
            if(validacep1.test(cep)) {
      
                    //Preenche os campos com "..." enquanto consulta webservice.
                    document.getElementById('txtIBGE').value="...";
                    document.getElementById('txtLogradouro').value="...";
                    document.getElementById('txtBairro').value="...";
                    document.getElementById('txtCidade').value="...";
                    document.getElementById('txtUF').value="...";
                    $("#lblStatus").html("Pesquisando...");
          
                    //Cria um elemento javascript.
                    var script = document.createElement('script');

                    //Sincroniza com o callback.
                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                    //Insere script no documento e carrega o conteúdo.
                    document.body.appendChild(script);
                
            } //end if.
            else {
                //cep é inválido.
                alert('Formato de CEP inválido.');
                setTimeout(function(){$("#txtCadCEP").select()}, 50); 
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            alert("Favor, informe um CEP!");
            setTimeout(function(){$("#txtCadCEP").focus()}, 50);
        }
    } 
    
    function limpaForm() {
        $("#lblStatus").html("Origem do Resultado");
        document.getElementById('txtIBGE').value="";
        document.getElementById('txtLogradouro').value="";
        document.getElementById('txtNumIni').value="";
        document.getElementById('txtNumFim').value="";
        document.getElementById('txtBairro').value="";
        document.getElementById('txtCidade').value="";
        document.getElementById('txtUF').value="";
        document.getElementById('txtArea').value=""; 
        document.getElementById('txtMicroArea').value="";
        
        var txt = "";
        
        $("#listaLimites").html(txt);
    }
    
    function limpa_formulario_cep() {
            //Limpa valores do formulário de cep.
            window.location.reload();
    }
    
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('txtIBGE').value=(conteudo.ibge);
            document.getElementById('txtLogradouro').value=(conteudo.logradouro);
            document.getElementById('txtBairro').value=(conteudo.bairro);
            document.getElementById('txtCidade').value=(conteudo.localidade);
            document.getElementById('txtUF').value=(conteudo.uf);
            $("#lblStatus").html("Dados do VIACEP");
        } //end if.
        else {
            //CEP não Encontrado.
            var resposta = confirm("CEP não encontrado!!!\n\nDeseja inserir as informações manualmente?")
            if(resposta){
                setTimeout(function(){$("#txtIBGE").focus()}, 50);
                encontrou = false;
            }else{
                limpaForm();
                setTimeout(function(){$("#txtCadCEP").select()}, 50);
                encontrou = false;
            }
        }
    }
    //MÁSCARA DE CEP
    function mascara(t, mask){
        var i = t.value.length;
        var saida = mask.substring(1,0);
        var texto = mask.substring(i);
        if (texto.substring(0,1) !== saida){
            t.value += texto.substring(0,1);
        }
    }
    //APENAS NÚMEROS NO INPUT
    function tecla(){
        evt = window.event;
        var tecla = evt.keyCode;
        if(!(tecla > 47 && tecla < 58)){ 
            alert('Pressione apenas teclas numéricas!');
            evt.preventDefault();
        }
    }