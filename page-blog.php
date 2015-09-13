<?php
/*
 Template Name: Blog Page
 *
*/
?>

<?php get_header(); ?>

<section class="blog-feed">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article class="excerpt">
		<h1>Test</h1>
		<div class="featured-img">
			<?php the_post_thumbnail( 'single-post-thumbnail' ); ?>
		</div>
	<h2><?php the_title() ;?></h2>
	<?php the_post_thumbnail(); ?>
	<?php the_excerpt(); ?>
</article>

	<?php endwhile; else: ?>

		<p>Sorry, no posts to list</p>

	<?php endif; ?>







</section>

<?php get_footer(); ?>
