<div id="main" class="layout-1r3c" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<!-- page content -->
	<section class="first clearfix" >
		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix withicon'); ?> role="article" >

			<header class="article-header">
				<h2 class="page-title" ><?php the_title(); ?></h2>
			</header> <!-- end article header -->

			<section class="entry-content clearfix" >
				<?php the_content(); ?>
			</section> <!-- end article section -->

		</article> <!-- end article -->
	</section>

	<!-- 3 col attachments -->
	<section class="entry-content" >
		<?php
		$attachments = new Attachments( 'my_attachments'); /* pass the instance name */ 
		if( $attachments->exist() ) {
			for ( $i = 0 ; $i < $attachments->total() ; $i++) { ?>
			
			<?php if($i % 3 == 0 ) echo '<div class="row clearfix">'?>
				<div class="attachment background-panel <?php if($i % 3 == 0 )echo 'first'?> fourcol ">
					<a href="<?php echo $attachments->field( 'linkurl',$i);?>" target="_blank">
						<?php
						echo '<h2>'.$attachments->field( 'title',$i)."</h2>";
						echo $attachments->image( 'fullsize', $i )."<br />";
						echo '<p>'.$attachments->field( 'caption',$i)."</p>";
						?>
					</a>
				</div>
			<?php if(($i % 3 == 2) OR $attachments->total()-1 == $i) echo '</div>'; ?>
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







  