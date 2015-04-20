<?php 
/*
Template Name: GP Multi-field
*/

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
					<?php the_content(); ?>						
				</section> <!-- end article section -->

			</article> <!-- end article -->
		</section>

		<?php 
			$leftcol = get_field('gp_leftcol');
			if(!empty($leftcol)) { ?>

			<section class="sixcol first background-panel entry-content clearfix">
				<?php echo $leftcol; ?>
			</section>

			<section class="sixcol last background-panel entry-content clearfix">
				<?php echo get_field('gp_rightcol'); ?>
			</section>
		<?php } ?>

		<?php 
			$rows = get_field('gp_rows');
			if(!empty($rows)) { 

					foreach ($rows as $key => $row) { ?>
						<section class="twelvecol first background-panel entry-content" >
						<?php echo $row['gp_rows_row']; ?>
						</section>

					<?php } 
			 }	?>

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