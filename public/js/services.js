var gigsaladServices = angular.module('GigSaladServices', ['ngResource']);

gigsaladServices.factory('Performer', ['$resource', 
    function($resource) {
		return $resource('/index.php/performers?start=:start&length=:length', {}, {
			get : {
				'isArray' : true
			}
		});
}]);