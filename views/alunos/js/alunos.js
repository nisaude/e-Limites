var app = angular.module('AlunosApp', []);

app.controller('CadAlunosController', function($scope,$http){

    $scope.cadastrando = true;	
    listaAlunos();
 
    function listaAlunos(){
        $http.post("alunos/lista").success(function(data){
            $scope.resultAlunos= data;
        });
     };
 
    $scope.gravarNovo = function (aluno) {

        var config = {
            params: {
                aluno: aluno
            }
        };

        $http.post("alunos/insert", aluno)
        .success(function (data, status, headers, config) {
            $scope.result = data;
            listaAlunos();
        })
        .error(function (data, status, headers, config) {
            $scope.result = "ERRO";
        });
    };
	
    $scope.editarAluno = function (ra) {

        $scope.editando = true;
        $scope.cadastrando = false;

        var config = {};
        $http.post("alunos/loadData/"+ra)
        .success(function (data, status, headers, config) {

            //mudei aqui - veja a observação abaixo.
            $scope.aluno=data[0];

            /* Ao inves de carregar campo a campo carrega todo o model do scopo
            quando carrego campo a campo utilizando o angular.copy 
            o angular não reconhece a alteração do scope e portanto nao sabe que os dados do 
            form foram alterados.

            var original = data;
            $scope.aluno = angular.copy(original);
            $scope.aluno.Ra=data[0].ra;
            $scope.aluno.Nome=data[0].nome
            $scope.aluno.End=data[0].endereco; */
            $scope.editando = true;
        })
        .error(function (data, status, headers, config) {
            $scope.result = "ERRO";
        });		
    };
			
    $scope.gravarDados = function (dados) {
    /* Nao estava fazendo o Dirty update no Model
    Bug?????
    Tive que improvisar pegando os dados via Javascript

    var dados = {
        "Ra":document.getElementById("txtRa").value,"Nome":document.getElementById("txtNome").value,"End": document.getElementById("txtEnd").value
    }*/
        var config = {};
	$http.post("alunos/save", dados)
        .success(function (data, status, headers, config) {
        $scope.result = data;
            listaAlunos();
            limpaForm();
        })
        .error(function (data, status, headers, config) {
            $scope.result = "ERRO";
        });	
    };
	
    $scope.removerAluno = function (ra) {
		
	if(confirm("Deseja Excluir o Aluno?")){		
            var config = {};
            $http.post("alunos/del/"+ra)
            .success(function (data, status, headers, config) {
		$scope.result = data;
		listaAlunos();			  
            })
            .error(function (data, status, headers, config) {
                $scope.result = "ERRO";
            });
	}
    };
	
    $scope.resetForm = function () {
	limpaForm();
    };
		
    function limpaForm() {
		
        var original = {};
	$scope.aluno = angular.copy(original);	
	$scope.frmCadAlu.$setPristine();
	$scope.editando = false;
	$scope.cadastrando = true;	
    }
});