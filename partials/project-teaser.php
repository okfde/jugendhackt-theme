<?php 

$badge = $project['project_badge'];
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

<div class="background-panel teaser-item <?php echo $filterClasses; ?> <?php echo $badgeClasses; ?>">

	<div class="teaser-wrap">
		<?php echo $project['project_hackdash_embed']; ?>	
	</div>

	<?php

	$links = $project['project_links'];
	if(!empty($links)){ ?>
		<div class="teaser-meta">
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
		</div>
	<?php } ?>

</div>