<?php
/*
	Template Name: Pricing Page
*/

?>

<?php get_header(); ?>




				<section class="plans">
					<div class="content">
						<h2><?php if (empty(get_post_meta(get_the_ID(), 'plan_section_title', 1))) { echo 'Plans to suit you'; } else { echo get_post_meta(get_the_ID(), 'plan_section_title', 1); } ?></h2>
						

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php the_content(); ?>
						<?php endwhile; endif; ?>
						

					</div>
				</section>

				<?php include_once("includes/testimonials.php"); ?>




<?php get_footer(); ?>
