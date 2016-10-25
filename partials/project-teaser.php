<?php 

// $badge = $project['project_badge'];
// unset($badgeClasses);

// if(!empty($badge)) { 
// 	$badgeClasses = 'badge badge-'.$badge[0];
// }

$categories = $project['project_region'];

$filterClasses = '';
if(!empty($categories)){
	$categories = array_values($categories);

	// build the classes for filtering
	foreach ($categories as $key5 => $category) {
		$filterClasses .= 'filter-me-as-'.$category->slug;
		if( (count($categories) - 1) != $key5) { 
			$filterClasses .= ' '; 
		}
	}
}
?>


<div 
	class 			= "background-panel teaser-item <?php echo $filterClasses; ?>"
	id				= "<?php echo htmlspecialchars($project['id']) ?>"
	jh-project-teaser
	hack-dash-id 	= "<?php echo htmlspecialchars($project['project_hackdash_embed']); ?>"
	you-tube-id  	= "<?php echo htmlspecialchars($project['project_hackdash_embed']); ?>" 
	jh-authors		= "<?php echo htmlspecialchars($project['project_contributors']) ?>"
	jh-links		= "<?php echo htmlspecialchars(json_encode($project['project_links'])) ?>"

>
	<div ng-if = "!ready" class = "loading"> loading ... </div>

	<h2 ng-if = "ready">{{hackDashData.title}}</h2>

	<div 
		class 		= "teaser-wrap" 
		style 		= "{{'background-image:url(https://i.ytimg.com/vi/'+youTubeId+'/hqdefault.jpg)'}}"
		ng-click	= "play()"
	>
		<iframe 
			frameborder	=	"0" 
			height		=	"0"
			width		=	"0"
			allowfullscreen
		></iframe>
	</div>

	<div class = "description">
		{{hackDashData.description}}
	</div>
	<a ng-href ="{{'https://hackdash.org/embed/projects/'+hackDashData._id}}">... mehr auf hackdash</a>



	<div class ="teaser-meta">
	
		<h3 class="project-who">
			Wer: {{jhAuthors}}
		</h3>

		<div class="project-links"> 
			<h3 ng-repeat = " link in jhLinks">
				<a 
					class	= "h3" 
					href	= "{{link.project_links_url}}"
				>
					{{link.project_links_title}}
					{{$last ? '' : ','}}
				</a>
			</h3>
		</div>

	</div>

	<!--
	<div class="teaser-meta">

		<?php

		$links = $project['project_links'];
		$contributors = $project['project_contributors'];

		if(!empty($contributors)){ ?>
			<h3 class="project-who">
				<?php echo 'Wer: ' . $contributors; ?>
			</h3>
		<?php }

		if(!empty($links) || !empty($contributors) ){ ?>
			<div class="project-links"> 
				<h3>
				<?php
					foreach ($links as $key1 => $link) { ?>					
						<a class="h3" href="<?php echo  $link['project_links_url']; ?>">
							<?php echo $link['project_links_title'];?>
						</a>
					<?php if($key1 != (count($links)-1)) { echo ', ';} } ?>
				</h3>
			</div>
		<?php } ?>
	
	</div> -->
</div>