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
				console.log('TeaserData:', $scope.teaserData)
				console.log('hackDashId:', $scope.hackDashId)

				var id_in_embed_snippet  = $scope.hackDashId.match(/hackdash\.org\/embed\/projects\/(.+)\?/)

				if(id_in_embed_snippet != null){
					console.log(id_in_embed_snippet[1])
					$scope.hackDashId = id_in_embed_snippet[1]
				}

				$http.get('https://hackdash.org/api/v2/projects/'+$scope.hackDashId)
				.then(function(result){
					$scope.hackDashData = result.data
				})

			}
		}
	}
])