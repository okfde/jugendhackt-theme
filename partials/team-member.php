<?php 

$badge = get_field('team_badges', $member->ID);
if(!empty($badge)) { 
	$badgeClasses = 'badge ' . $badge;
}

$categories = get_the_terms( $member->ID,'page_category' );
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

<div class="mix <?php echo $filterClasses; ?> background-panel teaser-item team-member">
	
	<h2 class="<?php echo $badgeClasses; ?>"><?php echo get_the_title($member->ID) ?></h2>

	<div class="teaser-wrap">
		<div class="teaser-image">
			<a href="<?php the_permalink();?>">
				<?php
					$attachment_id = get_post_thumbnail_id($member->ID);
					echo "<div class = \"image\" style = \"background-image:url('$attachment')\"></div>
					echo wp_get_attachment_image( $attachment_id,'square-600',false); 
				?>
			</a>
		</div>

		<div class="teaser-body">
			<?php  echo get_the_content_by_id( $member->ID ); ?>
		</div>
	</div>

	<div class="teaser-meta">
		<?php
			$positions = get_field('team_positions', $member->ID);
			if(!empty($positions)) { ?>
				<div class="member-position">
					<h3> Was: 
					<?php
						foreach ($positions as $key1 => $position) {
							echo $position; 
							if($key1 != count($positions)-1) { echo ', ';}
						} ?>
					</h3>
				</div>
			<?php
			}
		 ?>

		<?php

		// categories 

		if(!empty($categories)) { 

			$categories = array_values($categories);

			?>

			<div class="member-region">
				<h3> Wo: 
					<?php
					foreach ($categories as $key2 => $category) {
						echo $category->name;
						if($key2 != count($categories)-1) { echo ', ';}
					} ?>
				</h3>
			</div>
			<?php
			}
		 ?>

		<?php
		$links = get_field('team_links',  $member->ID );	
		if(!empty($links)){ ?>
			<div class="member-links">
				<h3> Kontakt: 
				<?php
				foreach ($links as $key3 => $link) { ?>
					<a class="h3" href="<?php echo  $link['team_links_url']; ?>">
						<?php echo  $link['team_links_title']; ?>
					</a>
				<?php 
				if($key3 != count($links)-1) { echo ', ';}
				} ?>
				</h3>
			</div>
		<?php } ?>
	</div>
</div>