
<div id="main" class="layout-2c" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section class="sixcol first clearfix" >
		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix withicon'); ?> role="article" >

			<header class="article-header">
				<h2 class="page-title" ><?php the_title(); ?></h2>
			</header> <!-- end article header -->

			<section class="entry-content clearfix" >
				<?php the_content(); ?>
			</section> <!-- end article section -->

			<footer class="article-footer">
				<?php the_tags('<span class="tags">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?>
			</footer> <!-- end article footer -->


		</article> <!-- end article -->
	</section>

	<section class="sixcol last clearfix entry-content" >
	<?php 
// Get the Map Embed

		$embed = get_field('embed');
		$embed_title = get_field('embed_title');
		$embed_desc = get_field('embed_description');

		if($embed) { ?>
		<div class="background-yellow attachment">
			<h2><?php echo $embed_title;?></h2>
			<div class="Flexible-container">
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
		<div class="background-yellow attachment">
			<h2><?php echo $video_title;?></h2>
			<div class="Flexible-container">
				<?php echo $video_embed;?>
			</div>
			<p>
				<?php echo $video_desc;?>
			</p>

		</div>
		<?php } ?>


		<?php
		$attachments = new Attachments( 'my_attachments'); /* pass the instance name */ 
		if( $attachments->exist() ) {
			for ( $i = 0 ; $i < $attachments->total() ; $i++)
				{ ?>
			<div class="attachment background-yellow">
				<?php
				echo '<h2>'.$attachments->field( 'title',$i)."</h2>";
				echo $attachments->image( 'large', $i )."<br/ >";
				echo '<p>'.$attachments->field( 'caption',$i)."</p>";
				?>
			</div>
			<?php
		}
	}
	?>
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







  