<div class="attachment background-panel <?php if($key % 3 == 0 )echo 'first'?> fourcol ">
	<?php
	echo '<h2>'. get_the_title( $member->ID)."</h2>";
	
	// image
	echo get_the_post_thumbnail( $member->ID ); 
	
	// overlay
	echo get_the_content_by_id( $member->ID ); 

	// badge
	$badge = get_field('team_badges', $member->ID);
	echo $badge[0];

	// categories 
	$categrories = get_the_category($member->ID);
	if(!empty($categrories)) {
		foreach ($categrories as $key => $category) {
			echo $category->name;
		}
	}

	// position
	$positions = get_field('team_positions', $member->ID);
	if(!empty($positions)) {
		foreach ($positions as $key => $position) {
			echo $position;
		}
	}

	// links
	$links = get_field('team_links',  $member->ID );						
	if(!empty($links)){

		foreach ($links as $key => $link) { ?>
		<a href="<?php echo  $link['team_links_url']; ?>"><?php echo  $link['team_links_title']; ?></a>
		
		<?php }
	}

	?>
</div>