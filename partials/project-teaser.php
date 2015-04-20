<div class="attachment background-panel <?php if($key % 3 == 0 )echo 'first'?> fourcol ">
	<?php

	echo '<h2>'. get_the_title($project->ID)."</h2>";

		// image
	echo get_the_post_thumbnail($project->ID ); 

		// overlay
	echo get_the_content_by_id( $project->ID ); 

		// who
	echo get_field('project_who',$project->ID);

		// links
	$links = get_field('project_links', $project->ID );						
	if(!empty($links)){

		foreach ($links as $key => $link) { ?>

		<a href="<?php echo  $link['project_links_url']; ?>"><?php echo  $link['project_links_title']; ?></a>

		<?php }
	}

	?>
</div>