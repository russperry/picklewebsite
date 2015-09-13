<?php
/*
	Template Name: Past Work Page
*/

?>

<?php get_header(); ?>




				<section class="past-work">
					<div class="content">
						<h2 class="text-center"><?php echo get_post_meta(get_the_ID(), 'pastwork_title', 1); ?></h2>
						<p class="text-center subhead-alt"><?php echo get_post_meta(get_the_ID(), 'pastwork_subhead', 1); ?></p>
					</div>
					<div class="content past-work grid">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>
					</div>
				</section>

				
				<?php include_once('includes/testimonials.php'); ?>




<?php get_footer(); ?>
