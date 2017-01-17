			<footer class="footer" role="contentinfo">
				<nav role="navigation " class = "wrap clearfix">
					<?php bones_footer_links(); ?>
				</nav>
				<div id="inner-footer" class="wrap clearfix">
					
					<?php 

						$my_postid = 40;//This is page id or post id
						$content_post = get_post($my_postid);
						$content = $content_post->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);
					?>
						
						<div class="first sixcol" >
							<?php echo $content; ?>
						</div>

						<div class="last sixcol" >
							<p class="ph"><span>Gefördert von</span></p>
							<div class="coops clearfix">
								<?php
								
								$attachments = new Attachments( 'my_attachments',40 ); /* pass the instance name */ 
								if( $attachments->exist() ) {
									for ( $i = 0 ; $i < $attachments->total() ; $i++)
										{ 
									
									if($attachments->field('linkurl',$i))
									{
										$urlflag = true; 
										echo '<a href="'. $attachments->field('linkurl',$i). '" >';
									}

									?>
									<div class="partner">
										<?php
										echo $attachments->image( 'fullsize', $i )."<br />";
										echo $attachments->field('title',$i);
										?>
									</div> 

									<?php

									if($urlflag) {
										echo "</a>";
										$urlflag = false; 
									}
								}
							}
							?>
						</div>
				</div>
			</div> <!-- end #inner-footer -->
		</footer> <!-- end footer -->
	</div> <!-- end #container -->

	<!-- all js scripts are loaded in library/bones.php -->
	<?php wp_footer(); ?>

</body>

</html> <!-- end page. what a ride! -->
