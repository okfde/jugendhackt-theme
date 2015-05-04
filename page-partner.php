<?php 
/*
Template Name: Page Partner
*/
get_header(); 

?>

<div id="content" data-speed="3" >
	<div id="inner-content" class="wrap clearfix">

	
		<div id="main"  role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<section class="twelvecol first clearfix">
			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix withicon background-panel'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="article-header">
					<h2 class="page-title page-title__main" itemprop="headline"><?php the_title(); ?></h2>
				</header> <!-- end article header -->

				<section class="entry-content__main clearfix" itemprop="articleBody">
					<?php the_content(); ?>
				</section> <!-- end article section -->

			</article> <!-- end article -->
		</section>

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