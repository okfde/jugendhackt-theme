<?php 

get_header(); 
  // Set the loop: only get the ones that have show on homepage set
$args = array( 	'post_type' => array('events'), 
	'orderby' => 'meta_value_num',
	'meta_key'  => 'event_date',
	'order' => 'ASC',
	'nopaging' => true
);
$wp_query = new WP_Query( $args );

?>

<div id="content" data-speed="3" >
	<div id="inner-content" class="wrap clearfix">
		<div id="main" class="clearfix" role="main">			
			<?php 
			
			$i = 0;

			while (have_posts()) : the_post(); ?>
		
				<?php 

				$event_fields = get_event_fields($post->id);

				// Is it odd or even
				if($i%2 == 0) { $odd = true; } 
				else { $odd = false; };

				if($odd) { 
					$colClasses = "first sixcol";
					// open row
					echo "<div class='row clearfix'>";
				} 
				else { 
					$colClasses = "last sixcol"; 
				}

				if($odd && ( count($wp_query->posts)-1 == $i  ) ) {
					// $colClasses = "last twelvecol"; 
					// $innerColClasses = array( 'first sixcol','last sixcol' );
					$colClasses = "first sixcol oddendcol";
				}

				?>

				<div id="post-<?php the_ID(); ?>" class="clearfix <?php echo $colClasses; ?> background-panel teaser-item teaser-item-events">
				
					<div class="entry-content">
						
						<div class="teaser-image <?php echo $innerColClasses[0]; ?>">
							<a href="<?php the_permalink();?>">
								<?php 
									$attachment_id = get_post_thumbnail_id($post->ID);
									echo wp_get_attachment_image( $attachment_id,'event-teaser',false); 
								?>
							</a>
						</div>

						<div class="teaser-body clearfix <?php echo $innerColClasses[1]; ?>">
							<div class="teaser-body-left">
								<?php if(isset($event_fields['event_date'])) { ?>
									<h2><?php echo $event_fields['event_date'] ?></h2>
								<?php } ?>

								<?php if(isset($event_fields['event_city'])) { ?>
									<h2><?php echo $event_fields['event_city'] ?></h2>
								<?php } ?>
							</div>

							<div class="teaser-body-right">
								<?php if(isset($event_fields['event_registerpage_id'])) { ?>
									<a class="button button-primary" href="<?php echo post_permalink( $event_fields['event_registerpage_id'] ); ?>">Anmelden</a>
								<?php } ?>
								
								<a class="button button-secondary" href="<?php the_permalink();?>">Mehr Info</a>
							</div>
						</div>
					</div>

				</div>
				

				<?php 
				// close row
				if(!$odd) { echo "</div>"; } 
				$i++;
				?>


			<?php endwhile; ?>
		
	</div> <!-- end #main -->
</div> <!-- end #inner-content -->

</div> <!-- end #content -->
<?php get_footer(); ?>
