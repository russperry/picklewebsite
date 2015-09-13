<?php
/*
	Template Name: Squeeze Page
*/

?>

<?php get_header(); ?>




				<section class="squeeze">
					<div class="content">
						<div class="squeeze-copy">
							<h1><?php if (empty(get_post_meta(get_the_ID(), 'header_h1', 1))){ echo get_the_title(); } else { echo get_post_meta(get_the_ID(), 'header_h1', 1); } ?></h1>
							<?php if(!empty(get_post_meta(get_the_ID(), 'header_subhead', 1))) { ?>
								<p class="subhead"><?php echo get_post_meta(get_the_ID(), 'header_subhead', 1); ?></p>
							<?php } ?>
							<?php if(!empty(get_post_meta(get_the_ID(), 'header_subhead_extra', 1))) { ?>
								<p class="subhead-alt"><?php echo get_post_meta(get_the_ID(), 'header_subhead_extra', 1); ?></p>
							<?php } ?>
						</div>
						<div class="squeeze-form">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</section>




<?php get_footer(); ?>
