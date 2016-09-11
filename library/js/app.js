angular.module('jugendHackt', [])


.directive('jhProjectTeaser',[

	'$http',

	function($http){
		return {
			restrict: 	"AE",
			scope:		true,

			link: function(scope, element, attrs){

				var hd_id_in_embed_snippet  = (attrs.hackDashId	|| '').match(/hackdash\.org\/embed\/projects\/([a-zA-Z0-9]+)[^a-zA-Z0-9]/)
					yt_id_in_embed_snippet  = (attrs.youTubeId 	|| '').match(/youtube\.com\/embed\/([a-zA-Z0-9_\-]+)[^a-zA-Z0-9_\-]/)

				if(hd_id_in_embed_snippet != null){
					scope.hackDashId = hd_id_in_embed_snippet[1]
				} else {
					scope.hashDashId = 	attrs.hackDashId && attrs.hackDashId.match(/^[a-zA-Z0-9_\-]+$/)
										?	attrs.hackDashId
										:	undefined
				}

				if(yt_id_in_embed_snippet != null){
					scope.youTubeId = yt_id_in_embed_snippet[1]
				} else {
					scope.youTubeId = 	attrs.youTubeId && attrs.youTubeId.match(/^[a-zA-Z0-9_\-]+$/)
										?	attrs.youTubeId
										:	undefined
				}
				
				var iframe 	= element.find('iframe'),
					wrapper	= iframe.parent()

				function resizeIframe(){
					if(!iframe[0]) return null
					iframe[0].width 	= wrapper[0].clientWidth
					iframe[0].height 	= wrapper[0].clientHeight
				}


				scope.play = function(){
					console.log('play!', iframe, scope.youTubeId, open)
					if(!iframe[0]) 			return null
					if(!scope.youTubeId) 	return null
					if(scope.open)			return null
					scope.open = true
					resizeIframe()
					iframe[0].src = "https://www.youtube.com/embed/"+scope.youTubeId+"?autoplay=1"
					angular.element(window).on('resize', resizeIframe)
				}

				if(scope.hackDashId){
					$http.get('https://hackdash.org/api/v2/projects/'+scope.hackDashId)
					.then(function(result){
						scope.hackDashData = result.data
						scope.ready = true
					})
				}
			}
		}
	}
])