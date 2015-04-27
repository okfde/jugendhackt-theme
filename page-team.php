<?php 
/*
Template Name: Page Team
*/
get_header(); 

?>

<div id="content" data-speed="3" >
	<div id="inner-content" class="wrap clearfix">

	
		<div id="main"  role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<section class="twelvecol background-panel background-panel__slim first clearfix">

				<div class="entry-content clearfix" itemprop="articleBody">
					
					<span class="h2 filter" data-filter="all" >Alle </span>

					<?php

					$region_parent_obj = get_term_by('name', 'region', 'page_category');
					$region_parent_id = $region_parent_obj->term_id;

					$args = array(
						'child_of'                 => $region_parent_id,
						'orderby'                  => 'name',
						'order'                    => 'ASC',
						'hide_empty'               => 1,
						'hierarchical'             => 1,
						'taxonomy'                 => 'page_category',
					); 

					$categories = get_categories( $args );
					
					if(!empty($categories)) {
						foreach ($categories as $key => $value) { ?>
							
							<span class="h2 filter" data-filter=".<?php echo $value->slug; ?>" > <?php echo $value->name;  ?> </span>

						<? 	
						}
					}

					?>					
				</div> <!-- end article section -->

		</section>
	
		<section class="twelvecol first entry-content team-items" >
		
		<?php 

		$args = array(
			'post_parent' => $post->ID,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'post_type'   => 'page', 
			'posts_per_page' => -1,
			'post_status' => 'published' ); 

		$team_members = get_children( $args );
		$team_members = array_values($team_members);
		
		if( !empty($team_members) ) {

			foreach ($team_members as $key => $member) {
				include('partials/team-member.php');
			}
		} ?>

		<div class="gap"></gap>

	</section>



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