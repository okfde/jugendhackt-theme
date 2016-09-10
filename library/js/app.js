angular.module('jugendHackt', [])


.directive('jhProjectTeaser',[

	'$http',

	function($http){
		return {
			restrict: 	"AE",
			scope:		{
							teaserData : "@",
							hackDashId : "@",
						},

			link: function($scope){

				var id_in_embed_snippet  = $scope.hackDashId.match(/hackdash\.org\/embed\/projects\/(.+)[^a-zA-Z0-9]/)

				if(id_in_embed_snippet != null){
					$scope.hackDashId = id_in_embed_snippet[1]
				}
				
				console.log('$scope.hackDashId', $scope.hackDashId)

				$http.get('https://hackdash.org/api/v2/projects/'+$scope.hackDashId)
				.then(function(result){
					$scope.hackDashData = result.data
					console.log($scope.hackDashData)
					$scope.$digets()
				})

			}
		}
	}
])