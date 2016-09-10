angular.module('jugendHackt', [])


.directive('jhProjectTeaser',[

	function(){
		return {
			restrict: 	"AE",
			scope:		{
							teaserData : "@",
							hackDashId : "@",
						},

			link: function($scope){
				console.log('TeaserData:', $scope.teaserData)
				console.log('hackDashId:', $scope.hackDashId)

				var id_in_embed_snippet  = $scope.hackDashId.match(/hackdash.org\/embed\/projects\/(.*)\?/g)

				if(id_in_embed_snippet != null){
					console.dir(id_in_embed_snippet)
				}
			}
		}
	}
])