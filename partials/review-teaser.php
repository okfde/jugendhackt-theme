

<section class="background-panel entry-content clearfix">

	<h2><?php echo $review->post_title ?></h2>
	
	<?php 

	$content = get_the_content_by_id($review->ID);
	$content = get_extended($content);
    
	if(!empty($content)) { ?>
		<div class="twelvecol first entry-content clearfix"> 
			
			<?php //  echo $content; 
			    echo $content['main'];
			    echo '--more--';
 				echo $content['extended'];
			?>

		</div>
	<?php } ?>

	<div class="sixcol first entry-content clearfix">
		<?php 

		$content = get_extended(get_field('gp_leftcol', $review->ID)); 
				
	    echo $content['main'];
	    echo '--more--';
		echo $content['extended'];
		
		?>
	</div>
	<div class="sixcol last entry-content clearfix">
		<?php 

		echo get_field('gp_rightcol', $review->ID ); 

		?>
	</div>
</section>

<?php 
$rows = get_field('gp_rows', $review->ID);
if(!empty($rows)) { 

	foreach ($rows as $key => $row) { ?>
	<section class="twelvecol first background-panel entry-content" >
		<?php echo $row['gp_rows_row']; ?>
	</section>

	<?php } 
}	?>