<?php
/*
	Template Name: Home Page
*/

?>

<?php get_header(); ?>

			

				<section class="core-points">

					<div class="content">

						<div class="core-point flex large-content-block contents-center ">
							<div class="core-point-text-wrap">
								<div class="core-point-text contents-center stickem">
									<h2><?php getthefield('core_point_1_title'); ?></h2>
									<p class="subhead"><?php getthefield('core_point_1_subhead'); ?></p>
									<?php getthefield('core_point_1_paras'); ?>
								</div>
							</div>
							<div class="core-point-img">
								<?php if (!empty(get_post_meta(get_the_ID(), 'core_point_1_img', 1))) { ?>
									<img src="<?php echo get_post_meta(get_the_ID(), 'core_point_1_img', 1); ?>" >
								<?php } else { ?>
									<img src="<?php echo get_template_directory_uri(); ?>/library/images/homepage_flare.png">
								<?php }; ?>
							</div>
						</div>

						<div class="core-point flex large-content-block contents-center">
							<div class="core-point-text-wrap">
								<div class="core-point-text contents-center">
									<h2><?php getthefield('core_point_2_title'); ?></h2>
									<p class="subhead"><?php getthefield('core_point_2_subhead'); ?></p>
									<?php getthefield('core_point_2_paras'); ?>
								</div>
							</div>
							<div class="core-point-img">
								<?php if (!empty(get_post_meta(get_the_ID(), 'core_point_2_img', 1))) { ?>
									<img src="<?php echo getthefield('core_point_2_img'); ?>" >
								<?php } else { ?>
									<img src="<?php echo get_template_directory_uri(); ?>/library/images/homepage_paper.png">
								<?php }; ?>
							</div>
						</div>

						<div class="core-point flex large-content-block contents-center">
							<div class="core-point-text-wrap">
								<div class="core-point-text contents-center">
									<h2><?php getthefield('core_point_3_title'); ?></h2>
									<p class="subhead"><?php getthefield('core_point_3_subhead'); ?></p>
									<?php getthefield('core_point_3_paras'); ?>
								</div>
							</div>
							<div class="core-point-img">
								<?php if (!empty(get_post_meta(get_the_ID(), 'core_point_3_img', 1))) { ?>
									<img src="<?php echo get_post_meta(get_the_ID(), 'core_point_3_img', 1); ?>" >
								<?php } else { ?>
									<img src="<?php echo get_template_directory_uri(); ?>/library/images/homepage_russ.png">
								<?php }; ?>
							</div>
						</div>
					</div>

				</section>

				<?php include_once('includes/testimonials.php'); ?>

<?php get_footer(); ?>
