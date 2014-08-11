<?php get_header(); 
  // Set the loop: only get the ones that have show on homepage set
$args = array( 	'post_type' => array('page') , 
	'meta_key' => 'show_this_page',
	'meta_value' => true,
	'orderby' => 'menu_order',
	'order' => 'ASC'
	);

$wp_query = new WP_Query( $args );

?>
<div id="content" data-speed="3" >
	<div id="inner-content" class="wrap clearfix">
		<div id="main" class="clearfix" role="main">			
			<?php 
			$i = -1; 
			while (have_posts()) : the_post(); ?>

			<?php 
			// Is it odd or even
			if($i%2 == 0) 
				{ $odd = true; 
				} 
			else {
					$odd = false;
				};


				// If its odd (first column): Start a new row
				if($odd) {echo "<div class='clearfix'>";} ?>

				<article id="post-<?php the_ID(); ?>" class="<?php 

				// If its odd (first column) echo class "first"
				if($odd) {
					// if we are beyond first item (we want to have this full)
					{ echo "first sixcol";}
				} 

				// If its even (second column ) echo class "last"
				else if($i > 0) {echo "last sixcol";} 

				?>  clearfix withicon background-yellow teaser-item">
				<header class="article-header" >
					<a href="<?php the_permalink(); ?>" > 
						<h2 class="page-title" ><?php the_title(); ?> </h2>
					</a>
				</header>

				<section class="entry-content clearfix">
					<?php 
					$value = get_field( "teaser_content" );
					if( $value ) { echo $value; }
					?>
				</section> <!-- end article section -->
			</article>
			
			<?php 
			
			// If its even (second col) and we are beyon the first one: Close the row
			if(!$odd && ($i > 0)) {echo "</div>";} 
			
			$i++;
			?>


			<?php endwhile; 
			 // It the loop exits on first col close the row anyhow
			if($odd) {echo "</div>";} 
			?>
		
	</div> <!-- end #main -->
</div> <!-- end #inner-content -->

</div> <!-- end #content -->
<?php get_footer(); ?>