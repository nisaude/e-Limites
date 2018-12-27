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
   
   
   
    function pesquisaCep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep !== "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('ibge').value="...";
                document.getElementById('logradouro').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                //window.location.reload();
                alert('Formato de CEP inválido.');
                $().focus();
                //document.getElementById("txtCEP").focus();
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            //window.location.reload();
            alert("Favor, informe um CEP!");
            //$("#txtCadCEP").focus();
            
            $("#txtLogradouro").focus();
        }
    };
    /*
    function limpa_formulario_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }
    */
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
    
    
    
    function mascara(t, mask){
        var i = t.value.length;
        var saida = mask.substring(1,0);
        var texto = mask.substring(i);
        if (texto.substring(0,1) !== saida){
            t.value += texto.substring(0,1);
        }
    }
   
   
   
});