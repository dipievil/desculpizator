angular.module ('desculpizatorApp.Repositories')
	.factory ('modoRepository', ['$http', function ($http) { 
		return { 
			buscarCulpado: function (callback) { 
				$http.get ('../model/modo.json').success (function (data) { 
				callback (data); 
			}); 
		} 
	}; 
}]);

angular.module ('desculpizatorApp.Repositories')
	.factory ('culpadoRepository', ['$http', function ($http) { 
		return { 
			buscarCulpado: function (callback) { 
				$http.get ('../model/culpado.json').success (function (data) { 
				callback (data); 
			}); 
		} 
	}; 
}]);

angular.module ('desculpizatorApp.Repositories')
	.factory ('acaoRepository', ['$http', function ($http) { 
		return { 
			buscarAcao: function (callback) { 
				$http.get ('../model/acao.json').success (function (data) { 
				callback (data); 
			}); 
		} 
	};
}]);
