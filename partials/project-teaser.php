<div class="attachment background-panel <?php if($key % 3 == 0 )echo 'first'?> fourcol teaser-item">

	<h2><?php echo get_the_title($project->ID) ?></h2>
	
	<div class="teaser-wrap">
		<div class="teaser-image">
			<a href="<?php the_permalink();?>">
				<?php 
					$attachment_id = get_post_thumbnail_id($project->ID);
					echo wp_get_attachment_image( $attachment_id,'square-600',false); 
				?>
			</a>
		</div>

		<div class="teaser-body">
			<?php  echo get_the_content_by_id( $project->ID ); ?>
		</div>
	</div>

	<h3 class="project-who">
		<?php echo 'Wer: '.get_field('project_who',$project->ID); ?>
	</h3>

	<?php
	$links = get_field('project_links', $project->ID );						
	if(!empty($links)){ ?>
		<div class="project-links"> <h3>Wo: 
			<?php
			foreach ($links as $key1 => $link) { ?>
				
					<a class="h3" href="<?php echo  $link['project_links_url']; ?>">
						<?php echo  $link['project_links_title'];
						 ?>
					</a>
			<?php 
				if($key1 != (count($links)-1)) { echo ', ';} 
			} 
			?>

			</h3>
		</div>
	<?php } ?>

</div>