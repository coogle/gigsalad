var gigsaladServices = angular.module('GigSaladServices', ['ngResource']);

gigsaladServices.factory('Performer', ['$resource', 
    function($resource) {
		return $resource('/index.php/performers?start=:start&length=:length', {}, {
			query : { 
				'method' : 'GET',
				'isArray' : true
			},
			get : {
				'isArray' : true
			}
		});
}]);