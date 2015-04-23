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

			$region_parent_obj = get_term_by('name', 'zielgruppe', 'page_category');
			$region_parent_id = $region_parent_obj->term_id;

			$args = array(
				'child_of'                 => $region_parent_id,
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
			
			if(!empty($categories)) {
				foreach ($categories as $key => $value) { ?>
				
				<div class="<?php if($key % 3 == 0 )echo 'first'?> fourcol background-panel faq-nav clearfix">
					<h2><a href="#<?php echo $value->slug ?>"><?php echo $value->name ?></a></h2>
				</div>
				
				<?php
				}
			}

			?>					

		</div>

		<?php 

		$faqs = get_field('faq');
		if(!empty($faqs)) {
			foreach ($categories as $key => $category) { ?>
				<section id="<?php echo $category->slug; ?>" class="twelvecol background-panel first entry-content" >
				
				<h2><?php echo $category->name; ?></h2>
				
				<div id="accordion-<?php  echo $category->slug; ?>" class="accordion" >
					<?php 
					foreach ($faqs as $key => $faq) {
						foreach ($faq['faq_group'] as $key => $faq_group) {
							if( $faq_group->term_id == $category->term_id ) {
								echo '<h3>'.$faq['faq_question'] . '</h3>';
								echo '<div>'.$faq['faq_answer'].'</div>';
							}
						}
					}
					?>
				</div>
				</section> 
				<?php
			}
		}

		?>
	

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