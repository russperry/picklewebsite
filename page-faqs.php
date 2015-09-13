<?php
/*
	Template Name: FAQ Page
*/

?>

<?php get_header(); ?>




				<section class="faqs">
					<div class="content faq-content">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>
						
					</div>
				</section>




<?php get_footer(); ?>
