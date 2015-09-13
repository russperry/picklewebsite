<?php get_header(); ?>

<div class="blog-content">

	<div class="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="article-wrap">

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

				<?php if ( has_post_thumbnail() ) { ?> 
				<div class="featuredimg">
					<a class="featuredimg-inner" href="<?php the_permalink(); ?>">
						<img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0]; ?>">
					</a>
				</div>
				<?php }; ?>

				<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<p class="byline entry-meta vcard">
		         	<?php printf( __( 'Posted', 'bonestheme' ).' %1$s %2$s',
						/* the time the post was published */
						'<time class="updated entry-time" datetime="' . get_the_time('Y-m-d') . '" itemprop="datePublished">' . get_the_time(get_option('date_format')) . '</time>',
						/* the author of the post */
						'<span class="by">'.__( 'by', 'bonestheme').'</span> <span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">' . get_the_author_link( get_the_author_meta( 'ID' ) ) . '</span>'
					); ?>
				</p>

				<section class="entry-content cf">
					<?php if(!is_single()) { ?>
						<?php the_excerpt(); ?>
					<?php } else { ?>
					<?php the_content(); ?>
					<?php } ;?>
				</section> 

			</article>
		</div>	
	<?php endwhile; ?>
		<div class="pagination">
			<?php posts_nav_link('&nbsp;','Go  Forward In Time','Go Back in Time'); ?>
		</div>
	</div>

	<?php else : ?>

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
	<?php get_sidebar(); ?>

	</div>
</div>

</div>


<?php get_footer(); ?>
