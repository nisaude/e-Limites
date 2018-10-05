var app = angular.module('LimitesApp', []);

app.controller('ConsLimitesController', function($scope,$http){
    
    $scope.frmConsLimites = {
                              "cep": "",
                              "logradouro": "",
                              "numIni": "",
                              "numFim": "",
                              "unidade": ""
			    };
       
    //Vetor vazio
    $scope.listaLimites = [];
	
    //Objeto de Limite1
    $scope.limite1 = {
                       "cep": "17.511-726",
                       "logradouro": "Rua dos Testes",
                       "numIni": "0",
                       "numFim": "199",
                       "unidade": "USF Parque das Nações"
                     };
    //Objeto de Limite2
    $scope.limite2 = {
                       "cep": "17.512-380",
                       "logradouro": "Rua App Limites",
                       "numIni": "201",
                       "numFim": "1499",
                       "unidade": "UBS Alto Cafezal"
                     };
    //push - Pega o item que você indica e insere no final do vetor
    $scope.listaLimites.push($scope.limite1); 
    $scope.listaLimites.push($scope.limite2); 
    
    /*
    $scope.listaLimites.push({
        cep: $scope.frmConsLimites.cep,
        logradouro: $scope.frmConsLimites.logradouro,
        numIni: $scope.frmConsLimites.numIni,
        numFim: $scope.frmConsLimites.numFim,
        unidade: $scope.frmConsLimites.unidade
    })*/
    
    $scope.consultarLimites = function(sId){
        
        var listaLimitesNova = $scope.listaUsuarios.filter(
                                function(limite){
                                    limite.id == sId
                                    return limite.id == sId;
                                })
                                
        $scope.listaLimites = listaLimitesNova;
    }
});