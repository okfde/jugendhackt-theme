<?php get_header(); ?>

			<div id="content" data-speed="3" >
				<div id="inner-content" class="wrap clearfix">
					<?php 
					$layout = get_field('layout');
					get_template_part( 'partials/layout', $layout );
					?>
				</div> <!-- end #inner-content -->
			</div> <!-- end #content -->

<?php get_footer(); ?>
