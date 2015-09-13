<?php
/*
	Template Name: Contact Page
*/

?>

<?php get_header(); ?>




				<section class="contact background-<?php echo do_shortcode(get_post_meta(get_the_ID(), 'header_color', true)); ?>">
					<?php include_once('includes/contact-form.php'); ?>
				</section>

				<section class="contact-methods">
					<div class="content">
						<?php include_once("includes/email-call.php"); ?>
					</div>
				</section>

				<section class="the-team">
					<div class="content">
						<div class="team-images">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/russ_small.png">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/russ_small.png">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/russ_small.png">
						</div>
						<div class="team-content">
							<h2>Meet The Support Team</h2>
							<p>We’re available from 9AM to 5PM PST, Monday to Friday.<br>
								We’ll try to reply within 2 hours if we’re in the office.</p>
						</div>
					</div>
				</section>




<?php get_footer(); ?>
