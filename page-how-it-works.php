<?php
/*
	Template Name: How It Works
*/

?>

<?php get_header(); ?>

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

<?php get_footer(); ?>
