<?php 

$badge = $project['project_badge'];
unset($badgeClasses);

if(!empty($badge)) { 
	$badgeClasses = 'badge badge-'.$badge[0];
}

$categories = $project['project_region'];

$filterClasses = '';
if(!empty($categories)){
	$categories = array_values($categories);

	// build the classes for filtering
	foreach ($categories as $key5 => $category) {
		$filterClasses .= 'term-'.$category->term_id;
		if( (count($categories) - 1) != $key5) { 
			$filterClasses .= ' '; 
		}
	}
}

?>

<div 
	class = "background-panel teaser-item <?php echo $filterClasses; ?> <?php echo $badgeClasses; ?>"
	jh-project-teaser
	hack-dash-id 	= "<?php echo htmlspecialchars($project['project_hackdash_embed']); ?>"
	you-tube-id  	= "<?php echo htmlspecialchars($project['project_hackdash_embed']); ?>" 
	jh-authors		= "<?php echo htmlspecialchars($contributors) ?>"
>
	<div ng-if = "!ready" class = "loading"> loading ... </div>

	<h4 ng-if = "ready">{{hackDashData.title}}</h4>

	<div 
		class 		= "teaser-wrap" 
		style 		= "background-image:url(https://i.ytimg.com/vi/{{youTubeId}}/hqdefault.jpg); cursor:pointer"
		ng-click	= "play()"
	>
		<iframe 
			frameborder	=	"0" 
			allowfullscreen
		></iframe>
	</div>
			
	<div ng-if = "ready">
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