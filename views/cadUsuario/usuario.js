var app = angular.module('LimitesApp', []);

app.controller('CadUsuarioController', function($scope,$http){
    
    //$scope.cadastrandoUsuario = true;
    listaUsuarios();
    
    function listaUsuarios(){
        $http.post("limites/lista").success(function(data){
            $scope.resultUsuarios = data;
        });
    };
    /*
    $scope.gravarDados = funcion (dados) {
        
        var dados = {
        "Nome":document.getElementById("txtCadUsuarioNome").value,
        "Senha":document.getElementById("txtCadUsuarioSenha").value;
        
        var config = {};
        
        $http.post("usuarios/salvar", dados)
        .sucess(function (data, status, headers, config) {
            $scope.result = data;
                listaUsuarios();
                //limpaForm();
        })
        .error(function (data, status, headers, config) {
            $scope.result = "ERRO";
        });
    };*/
});
