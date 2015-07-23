<?php 
get_header(); 

$event_fields = get_event_fields($post->id);

// If the event-facts field is empty span the content over 2 cols
if($event_fields['event_facts']) {
	$contentColClass = 'sixcol';
} else {
	$contentColClass = 'twelvecol';
}

?>

<div id="content" data-speed="3" >
	<div id="inner-content" class="wrap clearfix">
		<div id="main" class="clearfix" role="main">			
			<?php 
			while (have_posts()) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" class="clearfix">
			
				<div class="row">
					<section class="event-section-topic entry-content background-panel first <?php echo $contentColClass; ?>">
						<h2>Herausforderung</h2>
						<?php the_content() ?>
					</section>

				<?php if($event_fields['event_facts']) { ?>
					<section class="event-section-topic entry-content background-panel last sixcol">
						<h2>Facts</h2>
						<?php echo $event_fields['event_facts'];?>
					</section>
				<?php } ?>

				</div>
					
				<?php if($event_fields['event_program']) { ?>
				<section class="event-section-topic entry-content background-panel first twelvecol">
					<h2>Programm</h2>
					<?php	echo $event_fields['event_program'];?>
				</section>
				<?php } ?>

				<?php if($event_fields['event_sponsors']) { ?>
				<section class="event-section-sponsors entry-content background-panel first twelvecol">
					<h2>Regionale Partner</h2>
					<?php 
						foreach ( $event_fields['event_sponsors'] as $key => $sponsor ) { ?>
							<a href="<?php echo $sponsor['event_sponsor_link']; ?>" >
								<?php
									echo wp_get_attachment_image( $sponsor['event_sponsor_logo']['id'],'medium',false); 
								?>
							</a>
					<?php }	?>
				</section>
				<?php } ?>

				<?php 

				$partner_groups = get_field('partner_groups');
				
				if(!empty($partner_groups)) {
					foreach ($partner_groups as $key => $partner_group) { ?>
						
						<section class="twelvecol background-panel first entry-content partner-group" >
						<h2><?php echo $partner_group['partner_group_title']; ?></h2> 

						<?php 					

							foreach ($partner_group['partners'] as $partner) { ?>
								<a href=" <?php echo $partner['partner_link']; ?> ">
									<img src="<?php echo $partner['partner_image']['sizes']['partner-logo']; ?> " alt=""> 
								</a>

							<?php
							 }
						?>
						</section> 

						<?php
					}
				}

				?>


			</div>

			<?php endwhile; ?>
		
	</div> <!-- end #main -->
</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>