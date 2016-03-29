var gigsaladDemoAppCtrls = angular.module('GigSaladDemoAppCtrls', []);

gigsaladDemoAppCtrls.controller('PerformerListCtrl', ['$scope', '$cookies', 'Performer', 'spinnerService', function($scope, $cookies, Performer, spinnerService) {

	$scope.init = function() {
		$scope.length = 4;
		$scope.start = 0;
	}
	
	$scope.refreshPerformers = function(start, length) {
		
		var params = {};
		
		if(start >= 0) {
			params.start = start;
		} 
	
		if(length >= 0) {
			params.length = length;
		}
		
		setTimeout(function() {
			$scope.performers = Performer.get(params, function() {
				spinnerService.hideAll();
				if((start > 0) && ($scope.performers.length <= 0)) {
					$scope.start = $scope.start - $scope.length;
					$scope.refreshPerformers($scope.start, $scope.length);
				}
			});	
		}, 500);
		
	}
	
	$scope.next = function() {
		$scope.start = $scope.start + $scope.length;
		
		spinnerService.show('nextSpinner');
		
		$scope.refreshPerformers($scope.start, $scope.length);
	}
	
	$scope.prev = function() {
		$scope.start = $scope.start - $scope.length;
		
		if($scope.start < 0) {
			$scope.start = 0;
		}
		
		spinnerService.show('prevSpinner');
		
		$scope.refreshPerformers($scope.start, $scope.length);	
	}

}]);