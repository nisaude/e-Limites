var app = angular.module('LimitesApp', []);

app.controller('CadLimitesController', function($scope,$http){

    $scope.cadastrando = true;	
    //listaLimites();
    
    function listaLimites(){
        $http.post("limites/lista").success(function(data){
            $scope.resultLimites= data;
        });
     };

    $scope.gravarNovo = function (limite) {

        var config = {
            params: {
                limite: limite
            }
        };

        $http.post("limites/insert", limite)
        .success(function (data, status, headers, config) {
            $scope.result = data;
            listaLimites();
        })
        .error(function (data, status, headers, config) {
            $scope.result = "ERRO";
        });
    };

    $scope.editarLimite = function (ra) {

        $scope.editando = true;
        $scope.cadastrando = false;

        var config = {};
        $http.post("limites/loadData/"+ra)
        .success(function (data, status, headers, config) {

            //mudei aqui - veja a observação abaixo.
            $scope.limite=data[0];

            //Ao inves de carregar campo a campo carrega todo o model do scopo
            //quando carrego campo a campo utilizando o angular.copy 
            //o angular não reconhece a alteração do scope e portanto nao sabe que os dados do 
            //form foram alterados.

            //var original = data;
            //$scope.aluno = angular.copy(original);
            //$scope.aluno.Ra=data[0].ra;
            //$scope.aluno.Nome=data[0].nome
            //$scope.aluno.End=data[0].endereco;
            $scope.editando = true;
        }).error(function (data, status, headers, config) { 
            $scope.result = "ERRO";
        });		
    };  

    $scope.gravarDados = function (dados) {
    //Nao estava fazendo o Dirty update no Model
    //Bug?????
    //Tive que improvisar pegando os dados via Javascript

    //var dados = {
    //    "Ra":document.getElementById("txtRa").value,"Nome":document.getElementById("txtNome").value,"End": document.getElementById("txtEnd").value
    //}
        var config = {};
	$http.post("limites/salvar", dados)
        .success(function (data, status, headers, config) {
        
        $scope.result = data;
            //listaLimites();
            //limpaForm();
        })
        .error(function (data, status, headers, config) {
            $scope.result = "ERRO";
        });	
    };

    $scope.removerAluno = function (ra) {
		
	if(confirm("Deseja Excluir o Limite?")){		
            var config = {};
            $http.post("limites/del/"+ra)
            .success(function (data, status, headers, config) {
		$scope.result = data;
		listaLimites();			  
            })
            .error(function (data, status, headers, config) {
                $scope.result = "ERRO";
            });
	}
    };

    $scope.resetForm = function () {
	//alert("Entramos no JS!");
        limpaForm();
    };
		
    function limpaForm() {
		
        var original = {};
	$scope.limite = angular.copy(original);	
	$scope.frmCadAlu.$setPristine();
	$scope.editando = false;
	$scope.cadastrando = true;	
    }    

    

    function mascara(t, mask){
        var i = t.value.length;
        var saida = mask.substring(1,0);
        var texto = mask.substring(i);
        if (texto.substring(0,1) !== saida){
            t.value += texto.substring(0,1);
        }
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
                //limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            //limpa_formulário_cep();
            alert("Favor, informe um CEP!");
        }
    };

});



/*
//JQuery
$(function(){
    //Chama o formulário
    $('.frmCadLimite').submit(function(){
        $.ajax({
            url: 'envia.php', //Destino dos dados
            type: 'POST', //Tipo
            data: $('.frmCadLimite').serialize(), //data recebe os dados do formulário
            sucess: function( data ) { //Se tiver sucesso
                if ( data = '' ){ //Se tiver dados
                    $('.recebeDados').html( data );
                } else {
                    alert ('Existem campos em branco!');
                }
            }
        });
        return false; //Para não enviar
    )};
)};
*/