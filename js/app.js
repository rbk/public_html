function projects( $scope, $http ){

	$http.get('projects.json').success(function(data){

		$scope.projects = data;


	});


	$scope.addOne = function( index ) {
		$scope.projects[index].importance += 10

	}
	$scope.toggleEditMode = function() {

		if( $scope.mode == true ){
			
			$scope.mode = false;
			$scope.modeText = "Enable Edit Mode"
			
		} else {
			
			$scope.mode = true;
			$scope.modeText = "Disable Editing";
			angular.forEach( $scope.projects, function( data ){
				data.url = '';
			},'')

		}
	}



	$scope.mode = false;
	$scope.modeText = 'Enable Edit Mode';
	$scope.orderProp = 'importance';

}