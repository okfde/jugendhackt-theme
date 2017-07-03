<?php 
/*
Template Name: Page Team
*/
get_header(); 

// Get the categories 
$region_parent_obj = get_term_by('name', 'region', 'page_category');
$region_parent_id = $region_parent_obj->term_id;

$args = array(
	'child_of'                 => $region_parent_id,
	'orderby'                  => 'name',
	'order'                    => 'ASC',
	'hide_empty'               => 1,
	'hierarchical'             => 1,
	'taxonomy'                 => 'page_category',
); 

$categories = get_categories( $args );


// Get the team members
$args = array(
	'post_parent' => $post->ID,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'post_type'   => 'page', 
	'posts_per_page' => -1,
	'post_status' => 'published' ); 

$team_members = get_children( $args );
$team_members = array_values($team_members);

$positions  = array("Orga" => 2, "Mentor/in" => 1);

$points = array("Orga" => 2, "Mentor/in" => 1);

usort($team_members, function ($a, $b) use ($points) {

	$pos_a = 0;
	$pos_b = 0;


	$positions_a = get_field('team_positions', $a->ID);
	$positions_b = get_field('team_positions', $b->ID);

	foreach ($positions_a as $position) {
		$pos_a = max($pos_a, $points[$position]);
	}

	foreach ($positions_b as $position) {
		$pos_b = max($pos_b, $points[$position]);
	}

	if($pos_b - $pos_a == 0){
		return(strcmp($a->post_title, $b->post_title));
	} else {
		return($pos_b - $pos_a);		
	}
});

var_dump($team_members);

?>

<div id="content" data-speed="3" >
	<div id="inner-content" class="wrap clearfix">

	
		<div id="main"  role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<section class="isotope-container twelvecol first entry-content team-items" >
		<div class="grid-sizer"></div>
		<div class="gutter-sizer"></div>

		<div id="filters" class="entry-content background-panel teaser-item" itemprop="articleBody">
				
			<h2 class="filter" data-filter="*" >Alle</h2>
			<?php
			if(!empty($categories)) {
				foreach ($categories as $key => $value) { ?>
					<h2 class="filter" data-filter=".term-<?php echo $value->term_id; ?>" > <?php echo $value->name;  ?> </h2>
				<?php 	
				}
			} ?>	

		</div> <!-- end article section -->

		<?php 

		if( !empty($team_members) ) {
			foreach ($team_members as $key => $member) {
				include('partials/team-member.php');
			}
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