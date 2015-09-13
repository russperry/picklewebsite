<?php
/*
	Template Name: Home Page v3
*/

?>

<?php get_header(); ?>

			

				<section class="core-points">
					<div class="content">

						<div class="core-point flex large-content-block viewport-height-block contents-center">
							<div class="core-point-text contents-center">
								<h2><?php getthefield('core_point_1_title'); ?></h2>
								<p class="subhead"><?php getthefield('core_point_1_subhead'); ?></p>
								<?php getthefield('core_point_1_paras'); ?>
							</div>
							<div class="core-point-img">
								<?php if (!empty(get_post_meta(get_the_ID(), 'core_point_1_img', 1))) { ?>
									<img src="<?php echo get_post_meta(get_the_ID(), 'core_point_1_img', 1); ?>" >
								<?php } else { ?>
									<img src="<?php echo get_template_directory_uri(); ?>/library/images/homepage_flare.png">
								<?php }; ?>
							</div>
						</div>

					</div>
				</section>


				<section class="how-it-works">
					<div class="content">
						<h2 class="text-center"><?php echo get_post_meta(get_the_ID(), 'howitworks_title', 1); ?></h2>
						<div class="how-it-works-blocks">
							<div class="med-content-block">
								<div class="how-it-works-img">
									<?php if (!empty(get_post_meta(get_the_ID(), 'howitworks_1_img', 1))) { ?>
										<img src="<?php echo get_post_meta(get_the_ID(), 'howitworks_1_img', 1); ?>">
									<?php } else { ?>
										<img src="<?php echo Get_template_directory_uri(); ?>/library/images/brieffallback.png">
									<?php }; ?>
								</div>
								<div class="med-content-block-text">
									<h3><?php echo get_post_meta(get_the_ID(), 'howitworks_1_title', 1); ?></h3>
									<p class="subhead"><b>One</b> Two Three</p>
									<p><?php echo get_post_meta(get_the_ID(), 'howitworks_1_para', 1); ?></p>
								</div>
							</div>

							<div class="med-content-block">
								<div class="how-it-works-img">
									<?php if (!empty(get_post_meta(get_the_ID(), 'howitworks_2_img', 1))) { ?>
										<img src="<?php echo get_post_meta(get_the_ID(), 'howitworks_2_img', 1); ?>">
									<?php } else { ?>
										<img src="<?php echo Get_template_directory_uri(); ?>/library/images/work_fallback.png">
									<?php }; ?>
								</div>
								<div class="med-content-block-text">
									<h3><?php echo get_post_meta(get_the_ID(), 'howitworks_2_title', 1); ?></h3>
									<p class="subhead">One <b>Two</b> Three</p>
									<p><?php echo get_post_meta(get_the_ID(), 'howitworks_2_para', 1); ?></p>
								</div>
							</div>

							<div class="med-content-block">
								<div class="how-it-works-img">
									<?php if (!empty(get_post_meta(get_the_ID(), 'howitworks_3_img', 1))) { ?>
										<img src="<?php echo get_post_meta(get_the_ID(), 'howitworks_3_img', 1); ?>">
									<?php } else { ?>
										<img src="<?php echo Get_template_directory_uri(); ?>/library/images/files_fallback.png">
									<?php }; ?>
								</div>
								<div class="med-content-block-text">
									<h3><?php echo get_post_meta(get_the_ID(), 'howitworks_3_title', 1); ?></h3>
									<p class="subhead">One Two <b>Three</b></p>
									<p><?php echo get_post_meta(get_the_ID(), 'howitworks_3_para', 1); ?></p>
								</div>
							</div>

						</div>
					</div>
				</section>



				<section class="plans">
					<div class="content">
						<h2>Plans to suit you</h2>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>
					</div>
				</section>

				<?php include_once('includes/testimonials.php'); ?>



<?php get_footer(); ?>
