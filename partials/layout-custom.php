
<div id="main" class="layout-custom" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix withicon'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<header class="article-header">
				<h2 class="page-title" itemprop="headline"><?php the_title(); ?></h2>
			</header> <!-- end article header -->

			<section class="entry-content clearfix" itemprop="articleBody">
				<?php the_content(); ?>						
			</section> <!-- end article section -->



	</article> <!-- end article -->


	<?php 
		$custom_layout_content = get_field('custom_layout_content');
		if($custom_layout_content) { ?>
		<div class="custom-layout-wrapper entry-content clearfix">
			<?php echo $custom_layout_content;?>
		</div>
	<?php } ?>


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







  