angular.module('jugendHackt', [])


.directive('jhProjectTeaser',[

	'$http',

	function($http){
		return {
			restrict: 	"AE",
			scope:		true,

			link: function(scope, element, attrs){

				var id_in_embed_snippet  = attrs.hackDashId.match(/hackdash\.org\/embed\/projects\/([a-zA-Z0-9]+)[^a-zA-Z0-9]/)

				if(id_in_embed_snippet != null){
					scope.hackDashId = id_in_embed_snippet[1]
				} else {
					scope.hashDashId = attrs.hackDashId
				}
				
				console.log('$scope.hackDashId', scope.hackDashId)

				scope.test = 'test'

				$http.get('https://hackdash.org/api/v2/projects/'+scope.hackDashId)
				.then(function(result){
					scope.hackDashData = result.data
					console.log(scope.hackDashData)
				})

			}
		}
	}
])