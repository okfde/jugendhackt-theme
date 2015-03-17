<?php 
get_header(); 
$event_fields = get_event_fields($post->id);
?>

<div id="content" data-speed="3" >
	<div id="inner-content" class="wrap clearfix">
		<div id="main" class="clearfix" role="main">			
			<?php 
			while (have_posts()) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" class="clearfix">
			
				<div class="row">
					<section class="event-section-topic entry-content background-panel first sixcol">
						<h2>Thema</h2>
						<?php the_content() ?>
					</section>
					
					<section class="event-section-topic entry-content background-panel last sixcol">
						<h2>Facts</h2>
						<?php if($event_fields['event_facts']) { ?>
						<?php echo $event_fields['event_facts'];?>
						<?php } ?>
					</section>
				</div>
					
				<?php if($event_fields['event_program']) { ?>
				<section class="event-section-topic entry-content background-panel first twelvecol">
					<h2>Programm</h2>
					<?php	echo $event_fields['event_program'];?>
				</section>
				<?php } ?>

				<?php if($event_fields['event_sponsors']) { ?>
				<section class="event-section-topic entry-content background-panel first twelvecol">
					<h2>Regionale Sponsoren</h2>
					<?php 
						foreach ( $event_fields['event_sponsors'] as $key => $sponsor ) { ?>
							<a href="<?php echo $sponsor['event_sponsor_link']; ?>" >
								<?php
									echo wp_get_attachment_image( $sponsor['event_sponsor_logo']['id'],'large',false) . '<br>'; 
									print_r($sponsor['event_sponsor_name']);
								?>
							</a>
					<?php }	?>
				</section>
				<?php } ?>


			</div>

			<?php endwhile; ?>
		
	</div> <!-- end #main -->
</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>