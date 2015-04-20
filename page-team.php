<?php 

get_header(); 

?>

<div id="content" data-speed="3" >
	<div id="inner-content" class="wrap clearfix">

	
		<div id="main"  role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<section class="twelvecol first clearfix">
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix withicon'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="article-header">
					<h2 class="page-title" itemprop="headline"><?php the_title(); ?></h2>
				</header> <!-- end article header -->

				<section class="entry-content clearfix" itemprop="articleBody">
					<?php the_content(); 


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
						foreach ($categories as $key => $value) {
							echo $value->name;
						}
					}

					?>					
				</section> <!-- end article section -->

			</article> <!-- end article -->
		</section>
	
		<section class="twelvecol first entry-content" >
		
		<?php 

		$args = array(
			'post_parent' => $post->ID,
			'post_type'   => 'page', 
			'posts_per_page' => -1,
			'post_status' => 'published' ); 


		$team_members = get_children( $args );

		if( !empty($team_members) ) {

			foreach ($team_members as $key => $member) {

			// keys need to be reset
			if($key % 3 == 0 ) echo '<div class="row clearfix">';
				
				include('partials/team-member.php');
			
			if(($key % 3 == 2) OR count($team_members)-1 == $key) echo '</div>'; 

			}
		} ?>

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