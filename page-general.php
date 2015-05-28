<?php 
/*
Template Name: Page General (Rückblick)
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

		<?php 
			$leftcol = get_field('gp_leftcol');
			if(!empty($leftcol)) { ?>

			<section class="sixcol first background-panel entry-content clearfix">
					<?php 

					$content = get_extended($leftcol); ?>
					<div class="content-main"><?php echo $content['main'];?></p></div>
					
					<?php if(!empty($content['extended'])) { ?>
						<div class="content-more" id="more-<?php echo $post->ID ; ?>-leftcol" ><p><?php echo $content['extended']; ?></div>
						<a class="more-toggle" data-toggletarget="more-<?php echo $post->ID ; ?>-leftcol">Mehr...</a>
					<?php } ?>
			</section>

			<section class="sixcol last background-panel entry-content clearfix">
				<?php 

				$rightcol = get_field('gp_rightcol');
				$content = get_extended($rightcol); ?>
				<div class="content-main"><?php echo $content['main'];?></p></div>
				
				<?php if(!empty($content['extended'])) { ?>
					<div class="content-more" id="more-<?php echo $post->ID ; ?>-rightcol" ><p><?php echo $content['extended']; ?></div>
					<a class="more-toggle" data-toggletarget="more-<?php echo $post->ID ; ?>-rightcol">Mehr...</a>
				<?php } ?>

			</section>
		<?php } ?>

		<?php 
			$rows = get_field('gp_rows');
			if(!empty($rows)) { 

					foreach ($rows as $key => $row) { ?>
						<section class="twelvecol first background-panel entry-content" >						
						<?php $rowcontent = $row['gp_rows_row']; 

						$content = get_extended($rowcontent); ?>
						<div class="content-main"><?php echo $content['main'];?></p></div>
						
						<?php if(!empty($content['extended'])) { ?>
							<div class="content-more" id="more-<?php echo $post->ID ; ?>-row-<?php echo $key; ?>" ><p><?php echo $content['extended']; ?></div>
							<a class="more-toggle" data-toggletarget="more-<?php echo $post->ID ; ?>-row-<?php echo $key; ?>">Mehr...</a>
						<?php } ?>

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