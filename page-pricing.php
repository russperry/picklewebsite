<?php
/*
	Template Name: Pricing Page
*/

?>

<?php get_header(); ?>




				<section class="plans">
					<div class="content">
						<h2>Plans to suit you</h2>
						

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php the_content(); ?>
						<?php endwhile; endif; ?>
						

					</div>
				</section>

				<?php include_once("includes/testimonials.php"); ?>




<?php get_footer(); ?>
