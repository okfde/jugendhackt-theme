<?php 
/*
Template Name: Page About
*/

get_header(); 

?>

<!--ABC-->

<div id="content" data-speed="3" >
	<div id="inner-content" class="wrap clearfix">

	
		<div id="main"  role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<section class="sixcol first clearfix">
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix withicon background-panel'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="article-header">
					<h2 class="page-title" itemprop="headline"><?php the_title(); ?></h2>
				</header> <!-- end article header -->

				<section class="entry-content clearfix" itemprop="articleBody">
					
					<?php 
						$content = get_the_content_by_id($post->ID);
						$content = get_extended($content);
					?>

					<div class="content-main"><?php echo $content['main'];?></p></div>
					
					<?php if(!empty($content['extended'])) { ?>
						<div class="content-more" id="more-<?php echo $post->ID ; ?>" ><p><?php echo $content['extended']; ?></div>
						<a class="more-toggle" data-toggletarget="more-<?php echo $post->ID ; ?>">Mehr...</a>
					<?php } ?>	

				</section> <!-- end article section -->

			</article> <!-- end article -->
		</section>

		<section class="sixcol last background-panel entry-content clearfix">
			<?php echo get_field('about_video'); ?>
		</section>


		<!-- begin recent posts of some category -->

		<?php 
			$term_id = get_field('recent_posts');
			printf('<!-- '.$term_id.' -->');
			printf('<!-- '.get_field('recent_events').' -->');
			
			if($term_id){

		?>
				<section class="twelvecol first entry-content background-panel" >
		<?php



				$args = array(
					'numberposts' => 3,
					'offset' => 0,
					'category' => $term_id,
					'orderby' => 'post_date',
					'order' => 'DESC',
					'include' => '',
					'exclude' => '',
					'meta_key' => '',
					'meta_value' =>'',
					'post_type' => 'post',
					'post_status' => 'draft, publish, future, pending, private',
					'suppress_filters' => true
				);

				$the_query = new WP_Query( $args );

				while($the_query->have_posts()){ 
					 $the_query -> the_post();
		?>

					<div class="<?php if($the_query->current_post == 0) echo 'first';?> fourcol teaser-item">
						<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<p class="byline vcard">
							<?php
								printf('am <time class="updated" datetime="%1$s" pubdate>%2$s</time> von <span class="author">%3$s</span> <span class="amp">&amp;</span> in %4$s.', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
							?>
						</p>
						<div>
							<?php the_content('mehr...', true); ?>
						</div>
					</div>
					
		<?php 	
				}  
		?>
				</section>
		<?php 
			} 
		?>
	

		<!-- end recent posts of some category -->






		<!-- begin recent events of some category -->

		<?php 
			$term_id = get_field('recent_events');

			printf('<!-- '.$term_id.' -->');
			printf('<!-- '.get_field('recent_posts').' -->');

			if($term_id){

		?>
				<section class="twelvecol first entry-content background-panel" >
		<?php



				$args = array(
					'numberposts' => 3,
					'offset' => 0,
					'category' => $term_id,
					'orderby' => 'post_date',
					'order' => 'DESC',
					'include' => '',
					'exclude' => '',
					'meta_key' => '',
					'meta_value' =>'',
					'post_type' => 'events',
					'post_status' => 'draft, publish, future, pending, private',
					'suppress_filters' => true
				);

				$the_query = new WP_Query( $args );

				while($the_query->have_posts()){ 
					 $the_query -> the_post();
		?>

					<div class="<?php if($the_query->current_post == 0) echo 'first';?> fourcol teaser-item">
						<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
						<p class="byline vcard">
							<?php
								printf('am <time class="updated" datetime="%1$s" pubdate>%2$s</time> von <span class="author">%3$s</span> <span class="amp">&amp;</span> in %4$s.', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
							?>
						</p>
						<div>
							<?php the_content('mehr...', true); ?>
						</div>
					</div>
					
		<?php 	
				}  
		?>
				</section>
		<?php 
			} 
		?>

		<!-- end recent events of some category -->



		<section class="twelvecol first entry-content" >
		<?php
		
		$projects = get_field('about_projects');
		if( !empty($projects) ) {

			foreach ($projects as $key => $project) {

			if($key % 3 == 0 ) echo '<div class="row clearfix">';
			
				include('partials/about-project-teaser.php');
				
			if(($key % 3 == 2) OR (count($projects)-1 == $key)) echo '</div >'; ?>
			<?php }
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