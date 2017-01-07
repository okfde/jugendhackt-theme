<?php 
/*
Template Name: Page Faq
*/
get_header(); 

?>

<div id="content" data-speed="3" >
	<div id="inner-content" class="wrap clearfix">

	
		<div id="main"  role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<?php 

			$filter_cat_id = get_field('faq_filter_cat');

			$args = array(
				'child_of'                 => $filter_cat_id,
				'orderby'                  => 'name',
				'order'                    => 'ASC',
				'hide_empty'               => 0,
				'hierarchical'             => 1,
				'taxonomy'                 => 'page_category',
			); 

			$categories = get_categories( $args );

			function sort_category_slug  ($a, $b) {
				return strcmp($a->slug,$b->slug);
			}

			usort($categories,'sort_category_slug');
			if(!empty($categories)) { ?>
			
			<div id = "faq-filters" class="fourcol first">

			<?php
				foreach ($categories as $key => $value) { 
			?>
					<div class="faq-nav background-panel background-panel__slim">
						<h2 
							class		= "filter" 
							data-filter	= ".cat-<?php echo $value->term_id; ?>" 
						>
							<?php echo $value->name ?>
						</h2>
					</div>
				<?php
				}
			} ?>	

			</div>

			<div class="faq-groups mixitup-container eightcol last">

		<?php 

		$faqs = get_field('faq');
		if(!empty($faqs)) {
			foreach ($categories as $key => $category) { ?>
				<div class="background-panel mix cat-<?php  echo $category->term_id; ?> entry-content" >
					
					<h2><?php echo $category->name; ?></h2>
					
					<div id="accordion-<?php  echo $category->term_id; ?>" class="faq-accordion" >
						<?php 
						foreach ($faqs as $key => $faq) {
							foreach ($faq['faq_group'] as $key => $faq_group) {
								var_dump($faq);
								if( $faq_group->term_id == $category->term_id ) {
									$string = strtolower($string);
								    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
								    $string = preg_replace("/[\s-]+/", " ", $string);
								    $string = preg_replace("/[\s_]/", "-", $string);
						?>
									<h3 
										class ="qes-<?php echo $string;?>"
									>	
										<?php echo $faq['faq_question']; ?> 
									</h3>

									<div>
										<?php echo $faq['faq_answer']; ?>	
									</div>
						<?php
								}
							}
						}
						?>
					</div>
				</div> 
				<?php
			}
		}

		?>
		</div>
	</div>


	<?php endwhile; else : ?>

		<article id="post-not-found" class="hentry clearfix">
			<header class="article-header">
				<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
			</header>
			<section class="entry-content">
				<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
			</section>
			<footer class="article-footer">
				<p><?php _e("This is the error message in the page.php template.", "bonestheme"); ?></p>
			</footer>
		</article>

	<?php endif; ?>

	</div> <!-- end #main -->

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>