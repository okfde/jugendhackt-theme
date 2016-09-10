angular.module('jugendHackt', [])



.directive('jhProjectTeaser',[

	function(){
		return {
			restrict: 	"AE",
			scope:		{
							teaserData : "<"
						},

			link: function($scope){
				console.dir($scope.teasetData)
			}
		}
	}
])