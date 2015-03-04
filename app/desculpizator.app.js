angular.module ('desculpizatorApp.Controllers', []);
angular.module ('desculpizatorApp.Repositories', []);

var desculpizatorApp = angular.module('desculpizatorApp', ['ngRoute', 
														   'desculpizatorApp.Controllers',
														   'desculpizatorApp.Repositories']);

desculpizatorApp.config( function ($routeProvider) {
	$routeProvider.
	when('/home', {
		title: 'home',
		templateUrl: '../html/home.html',
		controller: 'desculpaController'
	})		
	.otherwise({
		redirectTo: '/home'
	})
});

	





  



