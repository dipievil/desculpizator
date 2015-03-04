desculpizatorApp.controller("desculpaController", function ($scope,  $http, acaoRepository, culpadoRepository)
{
	angular.module('desculpizatorApp', ['angular-route']);	

	$scope.onDesculpaFinal = "";
	$scope.pretext = 'Isso é culpa ';
	$scope.endtext = '.';
	$scope.valueAcao = '';
	$scope.valueCulpado = '';
	$scope.valueVitima = '';	

	
	modoRepository.buscarCulpado (function (data){
		$scope.modoModel = data;
	});
	
	culpadoRepository.buscarCulpado (function (data){
		$scope.culpadoModel = data;
	});	
    acaoRepository.buscarAcao (function (data) {
		 $scope.acaoModel = data;
    });
	

	$scope.MontaDesculpa = function () {
		if($scope.valueCulpado.length > 0 && $scope.valueAcao.length > 0 && $scope.valueVitima.length > 0)
			$scope.onDesculpaFinal =  $scope.pretext + ' ' +$scope.valueCulpado + '  que ' + $scope.valueAcao + '  ' + $scope.valueVitima + '  ' + $scope.endtext;
	};
});	



