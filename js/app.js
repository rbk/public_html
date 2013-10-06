function projects( $scope, $http ){

	$http.get('projects.json').success(function(data){

		$scope.projects = data;

	});

}