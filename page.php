<?php get_header(); ?>

<div class="blog-content">

	<div class="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<section class="entry-content cf">
			<?php the_content(); ?>
		</section> 
	<?php endwhile; else : ?>

		<article id="post-not-found" class="hentry cf">
				<header class="article-header">
					<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
			</header>
				<section class="entry-content">
					<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
			</section>
			<footer class="article-footer">
					<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
			</footer>
		</article>

	<?php endif; ?>

	</div>
</div>


<?php get_footer(); ?>
