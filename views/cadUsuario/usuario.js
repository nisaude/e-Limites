var app = angular.module('LimitesApp', []);

app.controller('CadUsuarioController', function($scope,$http){
    
    //listaUsuarios();
    $scope.cadastrando = true;
    
    $scope.frmInclusao = {
                            "id": "",
                            "nome": "",
                            "senha": ""
			 };
    
       
    //Vetor vazio
    $scope.listaUsuarios = [];
	
    //Objeto de Usuario1
    $scope.usuario1 = { "id": "170017",
            	       "nome": "Diego",
		       "senha": "123"
                     };
    //Objeto de Usuario2
    $scope.usuario2 = { "id": "171717",
            	       "nome": "Diego Fassion",
		       "senha": "123"
                     };
    //push - Pega o item que você indica e insere no final do vetor
    $scope.listaUsuarios.push($scope.usuario1); 
    $scope.listaUsuarios.push($scope.usuario2); 
    
    $scope.incluirPessoa = function(){
        //Vetor para incluir uma nova pessoa
        
        $scope.listaUsuarios.push({ //Dessa forma o Angular captura o conteúdo do html através do ng-model
				id: $scope.frmInclusao.Id, 
				nome: $scope.frmInclusao.Nome, 
				senha: $scope.frmInclusao.Senha 
    			    });
	//Limpar Campos
	$scope.frmInclusao = {
				"id": "",
				"nome": "",
				"senha": ""
			     };
    }
    
    $scope.excluirUsuario = function(sId){

	var listaUsuariosNova = $scope.listaUsuarios.filter( //filter recebe verdadeiro ou falso
                                function(pessoa){ //pessoa é o item do array
                                    pessoa.id != sId
                                    return pessoa.id != sId; //Retorna true ou false
				});

        $scope.listaUsuarios = listaUsuariosNova;
    }
    
    
    
    
    
    
    
    function listaUsuarios(){
        $http.post("usuarios/lista").success(function(data){
            $scope.resultUsuarios = data;
	});
    };
    
    $scope.editarAluno = function (id){
		
	$scope.editando = true;
	$scope.cadastrando = false;
		
        var config = {};
	$http.post("usuarios/loadData/"+id)
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
            $scope.aluno.End=data[0].endereco;
	*/
            $scope.editando = true;
	
        })
        .error(function (data, status, headers, config) {
            $scope.result = "ERRO";
        });
    };
    
    
    
    
    
    
    
    
});