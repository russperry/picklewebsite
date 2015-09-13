			<?php if (is_page()) { ?>
				<?php if (!is_page_template('page-free-request.php') && !is_page_template('page-squeeze-page.php')) { ?>
				 	<?php if (!empty(get_post_meta(get_the_ID(), 'footer_h2', 1))) { ?>
						<section class="footer-cta background-<?php echo do_shortcode(get_post_meta(get_the_ID(), 'footer_color', true)); ?> flex text-center">
							<div class="content contents-center">
								<div class="header-content">
									<div class="header-content-inner">
										<h2 class="h1 title"><?php echo get_post_meta(get_the_ID(), 'footer_h2', 1); ?></h2>
										<?php if (!empty(get_post_meta(get_the_ID(), 'footer_subhead', 1))) { ?>
											<p class="subhead"><?php echo get_post_meta(get_the_ID(), 'footer_subhead', 1); ?></p>
										<?php }; ?>
										<?php if (!empty(get_post_meta(get_the_ID(), 'footer_subhead_extra', 1))) { ?>
											<p class="subhead-alt"><?php echo get_post_meta(get_the_ID(), 'footer_subhead_extra', 1); ?></p>
										<?php }; ?>

										<?php if (is_page_template("page-faqs.php")) {
											include_once("includes/email-call.php");
										} ?>

										<div class="button-wrap">
											<?php if(!empty(get_post_meta(get_the_ID(), 'footer_secondary_button_text', 1)) && (!empty(get_post_meta(get_the_ID(), 'footer_secondary_button_url', 1)))) { ?>
												<?php 
													$url1 = get_post_meta(get_the_ID(), 'footer_secondary_button_url', 1);
													$shortcode1 = '';
													
													if (substr($url1, 0, 4) == "[con") {
														$shortcode1 = do_shortcode($url1);
														$url1 = '/contact?inpage';
													}
												?>
												<a class="<?php if (get_post_meta(get_the_ID(), 'footer_color', 1) == "green") { echo "button-white-outline"; } else { echo "button-black-outline"; }; ?>" href="<?php echo $url1 ?>"><?php echo get_post_meta(get_the_ID(), 'footer_secondary_button_text', 1); ?></a>
											<?php }; ?>

											<?php if(!empty(get_post_meta(get_the_ID(), 'footer_primary_button_text', 1)) && (!empty(get_post_meta(get_the_ID(), 'footer_primary_button_url', 1)))) { ?>
												<?php 
													$url2 = get_post_meta(get_the_ID(), 'footer_primary_button_url', 1);
													$shortcode2 = '';

													if (substr($url2, 0, 4) == "[con") {
														$shortcode2 = do_shortcode($url2);
														$url2 = '/contact?inpage';
													}
												?>
												<a class="<?php if (get_post_meta(get_the_ID(), 'footer_color', 1) == "green") { echo "button-white-fill"; } else { echo "button-green-fill"; }; ?>" href="<?php echo $url2 ?>"><?php echo get_post_meta(get_the_ID(), 'footer_primary_button_text', 1); ?></a>
											<?php }; ?>
										</div>
										<p></p>
										<!-- <p class="button-support"><a href="#">Got Questions? Let's Chat</a></p> -->
										
									</div>
								</div>
								<div class="inpage-contact hidden">
									<?php echo do_shortcode($shortcode1); ?>
									<?php echo do_shortcode($shortcode2); ?>
								</div>
							</div>
						</section>
					<?php } else if (!is_page_template('page-squeeze-page.php') && !is_page_template('page-free-request.php')) { ?>
						<div class="footer-cta-clear">
				 		</div>
			 		<?php } ?>
				<?php } ?>
			<?php } else if (!is_page_template('page-squeeze-page.php') ) { ?>
				<section class="footer-cta background-green flex text-center blog-footer-cta">
					<div class="content contents-center">
						<div class="header-content">
							<div class="header-content-inner">
								<h2 class="h1 title"><?php get_custom('blog_footer_h2'); ?></h2>
								<p class="subhead"><?php get_custom('blog_footer_subtitle'); ?></p>
								
								<div class="button-wrap">
										<a class="button-white-fill" href="<?php get_custom('blog_footer_primary_button_url'); ?>"><?php get_custom('blog_footer_primary_button_text'); ?></a>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php } ?>

			<?php if (!is_page_template('page-squeeze-page.php')) { ?>
			<footer class="footer background-<?php echo get_post_meta(get_the_ID(), 'footer_color', 1); ?> flex" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
				<div class="content flex flex-stretch">
					<div>
						<?php if (!is_page_template('page-free-request.php')) { ?>
						<nav role="navigation">
							<?php wp_nav_menu(array(
	    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
	    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
	    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
	    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
	    					'theme_location' => 'footer-links',             // where it's located in the theme
	    					'before' => '',                                 // before the menu
	    					'after' => '',                                  // after the menu
	    					'link_before' => '',                            // before each link
	    					'link_after' => '',                             // after each link
	    					'depth' => 0,                                   // limit the depth of the nav
	    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
							)); ?>
						</nav>
						<?php } ?>
						<div class="contact">
							<p class="helvetica small"><b>Email:</b> <?php get_custom('contact_email'); ?></p>
							<p class="helvetica small"><b>Call:</b> <?php get_custom('contact_number'); ?></p>
						</div>
					</div>
					<div class="flex-align-self-right text-right">
						<div class="logo"><a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo-small.png"></a></div>
						<ul class="social-media">
							<li><a class="facebook-icon" href="<?php get_custom('facebook_url'); ?>">Facebook</a></li>
							<li><a class="twitter-icon" href="<?php get_custom('twitter_url'); ?>">Twitter</a></li>
							<li><a class="linkedin-icon" href="<?php get_custom('linkedin_url'); ?>">LinkedIn</a></li>
							<li><a class="instagram-icon" href="<?php get_custom('instagram_url'); ?>">Instagram</a></li>
						</ul>

						<p class="source-org copyright helvetica small">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>
						<p class="source-org copyright helvetica small"><a href="/terms">Terms</a> | <a href="/privacy">Privacy</a></p>
					</div>
				</div>

			</footer>
			<?php } ?>

		<?php get_custom('footer_scripts'); ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->