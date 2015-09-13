<?php
/*
	Template Name: Free Request
*/

?>

<?php get_header(); ?>




				<section class="request-form-section">
					<a href="request-form-section"></a>
					<div class="content">
						<div class="form-wrap">
							<?php 
								echo do_shortcode(get_post_meta(get_the_ID(), 'free_request_step_shortcode', 1));
							?>
						</div>
					</div>
				</section>




<?php get_footer(); ?>
