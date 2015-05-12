<div class="background-panel teaser-item">

	<div class="teaser-wrap">
		<iframe src="" width="100%" height="450" frameborder="0" allowtransparency="true" title="Hackdash"></iframe>
	</div>

	<?php

	// Split and insert embed into url
	echo $project['project_hackdash_url'];

	$links = $project['project_links'];
					
	if(!empty($links)){ ?>
		<div class="project-links"> 
			<h3>
			<?php
				foreach ($links as $key1 => $link) { ?>					
					<a class="h3" href="<?php echo  $link['project_links_url']; ?>">
						<?php echo $link['project_links_title'];?>
					</a>
				<?php if($key1 != (count($links)-1)) { echo ', ';} } ?>
			</h3>
		</div>
	<?php } ?>

</div>