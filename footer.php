			<footer class="footer" role="contentinfo">
				<div id="inner-footer" class="wrap clearfix">
					
					<?php 

						$my_postid = 40;//This is page id or post id
						$content_post = get_post($my_postid);
						$content = $content_post->post_content;
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);
						?>
						
						<div class="first sixcol" >
							<nav role="navigation">
								<?php bones_footer_links(); ?>
							</nav>
							<?php echo $content; ?>
						</div>
						
				</div>
			</div> <!-- end #inner-footer -->
		</footer> <!-- end footer -->
	</div> <!-- end #container -->

	<!-- all js scripts are loaded in library/bones.php -->
	<?php wp_footer(); ?>

</body>

</html> <!-- end page. what a ride! -->
