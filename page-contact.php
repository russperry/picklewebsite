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
							<?php if (!empty(get_post_meta(get_the_ID(), 'support_team_img_1_url', 1))) { ?>
								<img src="<?php echo get_post_meta(get_the_ID(), 'support_team_img_3_url', 1); ?>">
							<?php } ?>
							<?php if (!empty(get_post_meta(get_the_ID(), 'support_team_img_2_url', 1))) { ?>
								<img src="<?php echo get_post_meta(get_the_ID(), 'support_team_img_3_url', 1); ?>">
							<?php }; ?>
							<?php if (!empty(get_post_meta(get_the_ID(), 'support_team_img_3_url', 1))) { ?>
								<img src="<?php echo get_post_meta(get_the_ID(), 'support_team_img_3_url', 1); ?>">
							<?php } ?>
						</div>
						<div class="team-content">
							<h2><?php echo get_post_meta(get_the_ID(), 'support_team_title', 1); ?></h2>
							<p><?php echo get_post_meta(get_the_ID(), 'support_team_content', 1); ?></p>
						</div>
					</div>
				</section>




<?php get_footer(); ?>
