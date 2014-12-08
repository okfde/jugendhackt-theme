
<div id="main" class="layout-custom" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<section>
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
	$custom_layout_content = get_field('custom_layout_content');
	if($custom_layout_content) { ?>
	<section class="custom-layout-wrapper entry-content clearfix">
		<?php echo $custom_layout_content;?>
	</section>
	<?php } ?>

	<section class="entry-content">
		<?php 
		// Get the Map Embed

		$embed = get_field('embed');
		$embed_title = get_field('embed_title');
		$embed_desc = get_field('embed_description');

		if($embed) { ?>
		<div class="background-panel attachment">
			<h2><?php echo $embed_title;?></h2>
			<div class="">
				<?php echo $embed;?>
			</div>
			<p>
				<?php echo $embed_desc;?>
			</p>
		</div>
		<?php } ?>


		<?php 
		// Get the Map Embed

		$video_embed = get_field('video_embedcode');
		$video_title = get_field('video_title');
		$video_desc = get_field('video_description');

		if($video_embed) { ?>
		<div class="background-panel attachment">
			<h2><?php echo $video_title;?></h2>
			<?php echo $video_embed;?>
			<p>
				<?php echo $video_desc;?>
			</p>
		</div>
		<?php } ?>

	</section>

	<section class="attachment background-panel">
		<?php
		$attachments = new Attachments( 'my_attachments'); /* pass the instance name */ 
		if( $attachments->exist() ) { ?>
		<div class="slick">
			<?php
			for ( $i = 0 ; $i < $attachments->total() ; $i++) { ?>
			<div class="">
				<?php
				echo $attachments->image( 'large', $i );
				$caption = $attachments->field('caption',$i);
				if(!empty($caption)){
					echo '<p>'.$caption."</p>";
				}?>
			</div>
			<?php }
			?>
		</div>
		<?php } ?>

		<script>
			$(document).ready(function(){
				$('.slick').slick({
					adaptiveHeight: true
				});
			});
		</script>
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







  