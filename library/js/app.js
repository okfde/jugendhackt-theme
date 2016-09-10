angular.module('jugendHackt', [])



.directive('jhProjectTeaser',[

	function(){
		return {
			restrict: 	"AE",
			scope:		{
							teaserData : "<",
							hackDashId : "<",
						},

			link: function($scope){
				console.log('TeaserData:', $scope.teaserData)
				console.log('hackDashId:', $scope.hackDashId)
			}
		}
	}
])