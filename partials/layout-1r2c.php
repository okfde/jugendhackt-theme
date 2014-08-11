
<div id="main" class="layout-1r2c" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<section class="first clearfix" >
		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" >

			<header class="article-header">
				<h1 class="page-title" ><?php the_title(); ?></h1>
			</header> <!-- end article header -->

			<section class="entry-content clearfix" >
				<?php the_content(); ?>
			</section> <!-- end article section -->

			<footer class="article-footer">
				<?php the_tags('<span class="tags">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?>
			</footer> <!-- end article footer -->


		</article> <!-- end article -->
	</section>

	<section class="entry-content" >
		

		<?php
		$attachments = new Attachments( 'my_attachments'); /* pass the instance name */ 
		if( $attachments->exist() ) {
			for ( $i = 0 ; $i < $attachments->total() ; $i++)
				{ ?>

			<div class="attachment <?php if($i % 2 == 0 )echo 'first'?> sixcol ">
				<a href="<?php echo $attachments->field( 'linkurl',$i);?>" target="_blank">
				<?php
				echo $attachments->image( 'large', $i )."<br/ >";
				echo $attachments->field( 'title',$i)."<br/ >";
				echo $attachments->field( 'caption',$i);
				?>
			</a>
			</div>
			<?php
		}
	}
	?>



</section>

<section class="first clearfix">
	<div class="embed Flexible-container">
		<?php 
		$embed = get_field('embed');
		if($embed) echo $embed;
		?>
	</div>
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







  