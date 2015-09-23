<!doctype html>
<?php 
	
	$bgimg = '';

	if(is_page_template('page-home') || is_page_template('page-home-v2') || is_page_template('page-home-v3')) {
		$bgimg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0];
	}



?>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title><?php wp_title(''); ?></title>

		<?php // this is necessary to prevent the viewport height blocks from getting silly ?>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>

		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">

		<?php if (is_page() && !is_page_template('page-squeeze-page.php')) { ?>

			<header class="header flex flex-column background-<?php echo do_shortcode(get_post_meta(get_the_ID(), 'header_color', true)); if(is_home()){echo 'green';}; ?> flex-wrap <?php if (is_page_template("page-home.php") || is_page_template("page-home-v2.php") || is_page_template("page-home-v3.php")) { echo "viewport-height-block"; }; ?> <?php if(!empty(get_post_meta(get_the_ID(), 'header_testimonial_person', 1)) && !empty(get_post_meta(get_the_ID(), 'header_testimonial_text', 1))) { ?>no-testimonial<?php }; ?> <?php headerbuttonsexist(); ?>" role="banner" itemscope itemtype="http://schema.org/WPHeader" <?php if(!empty($bgimg)) { echo 'style="background-image:url('.$bgimg.');"'; } ?> >
				<div class="sidemenubutton"></div>
				<div class="logo fallback contents-center" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo-large.png"></a></div>
				<nav>

					<div class="logo contents-center" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo-large.png"></a></div>
						<?php if (!is_page_template('page-free-request.php')) { ?>
						<?php wp_nav_menu(array(
    					         'container' => false,                           // remove nav container
    					         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
    					         'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
    					         'menu_class' => 'nav top-nav cf',               // adding custom nav class
    					         'theme_location' => 'main-nav',                 // where it's located in the theme
    					         'before' => '',                                 // before the menu
        			               'after' => '',                                  // after the menu
        			               'link_before' => '',                            // before each link
        			               'link_after' => '',                             // after each link
        			               'depth' => 0,                                   // limit the depth of the nav
    					         'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>
						<?php } ?>
						<a href="<?php get_custom('login_url'); ?>" class="button-black-outline nav-button">Log In</a>
						<a href="<?php get_custom('signup_url'); ?>" class="button-green-fill nav-button">Sign Up</a>
						<div class="closebutton"></div>
				</nav>

				<div class="dheader-content flex full-width text-center" style="width:100%;">
					<div class="wide-650">
						<h1 class="title"><?php if (empty(get_post_meta(get_the_ID(), 'header_h1', 1))){ echo get_the_title(); } else { echo get_post_meta(get_the_ID(), 'header_h1', 1); } ?></h1>

						<?php if(!empty(get_post_meta(get_the_ID(), 'header_subhead', 1))) { ?>
							<p class="subhead"><?php echo get_post_meta(get_the_ID(), 'header_subhead', 1); ?></p>
						<?php } ?>
						<?php if(!empty(get_post_meta(get_the_ID(), 'header_subhead_extra', 1))) { ?>
							<p class="subhead-alt"><?php echo get_post_meta(get_the_ID(), 'header_subhead_extra', 1); ?></p>
						<?php } ?>
						<?php if( (!empty(get_post_meta(get_the_ID(), 'header_primary_button_text', 1)) && (!empty(get_post_meta(get_the_ID(), 'header_primary_button_url', 1)))) || (!empty(get_post_meta(get_the_ID(), 'header_secondary_button_text', 1)) && (!empty(get_post_meta(get_the_ID(), 'header_secondary_button_url', 1)))) || (!empty(get_post_meta(get_the_ID(), 'header_first_custom_button'))) || (!empty(get_post_meta(get_the_ID(), 'header_last_custom_button')))) { ?>
							<div class="button-wrap">
						<?php } ?>

							<?php echo get_post_meta(get_the_ID(), 'header_first_custom_button', 1); ?>

							<?php if(!empty(get_post_meta(get_the_ID(), 'header_primary_button_text', 1)) && (!empty(get_post_meta(get_the_ID(), 'header_primary_button_url', 1)))) { ?>
									<a class="button-green-fill" href="<?php echo get_post_meta(get_the_ID(), 'header_primary_button_url', 1); ?>"><?php echo get_post_meta(get_the_ID(), 'header_primary_button_text', 1); ?></a>
							<?php } ?>
							<?php if(!empty(get_post_meta(get_the_ID(), 'header_secondary_button_text', 1)) && (!empty(get_post_meta(get_the_ID(), 'header_secondary_button_url', 1)))) { ?>
								<a class="button-green-fill" href="<?php echo get_post_meta(get_the_ID(), 'header_secondary_button_url', 1); ?>"><?php echo get_post_meta(get_the_ID(), 'header_secondary_button_text', 1); ?></a>
							<?php } ?>

							<?php echo get_post_meta(get_the_ID(), 'header_last_custom_button', 1); ?>

						<?php if( (!empty(get_post_meta(get_the_ID(), 'header_primary_button_text', 1)) && (!empty(get_post_meta(get_the_ID(), 'header_primary_button_url', 1)))) || (!empty(get_post_meta(get_the_ID(), 'header_secondary_button_text', 1)) && (!empty(get_post_meta(get_the_ID(), 'header_secondary_button_url', 1))))  ) { ?>
							</div>
						<?php } ?>
						<?php if(!empty(get_post_meta(get_the_ID(), 'header_button_support', 1))) { ?>
						<p class="button-support text-center">7 Day Money-Back Guarantee</p>
						<?php } ?>

					</div>
				</div>

				


				<?php if(!empty(get_post_meta(get_the_ID(), 'header_testimonial_person', 1)) && !empty(get_post_meta(get_the_ID(), 'header_testimonial_text', 1))) { ?>		
					<div class="testimonial header-testimonial">
						<div class="content flex">
							<img src="http://placehold.it/100x100">
							<blockquote class="testimonial-content flex">
								<cite><?php echo get_post_meta(get_the_ID(), 'header_testimonial_person', 1); ?></cite>
								<p><?php echo get_post_meta(get_the_ID(), 'header_testimonial_text', 1); ?></p>
							</blockquote>
						</div>
					</div>
				<?php } ?>
				

			</header>

			<?php } else if (!is_page_template('page-squeeze-page.php')) { ?>
			<header class="header flex flex-column background-green flex-wrap <?php if (is_page_template("page-home.php") || is_page_template("page-home-v2.php") || is_page_template("page-home-v3.php")) { echo "viewport-height-block"; }; ?> <?php if(!empty(get_post_meta(get_the_ID(), 'header_testimonial_person', 1)) && !empty(get_post_meta(get_the_ID(), 'header_testimonial_text', 1))) { ?>no-testimonial<?php }; ?> <?php headerbuttonsexist(); ?>" role="banner" itemscope itemtype="http://schema.org/WPHeader">
				<div class="sidemenubutton"></div>
				<div class="logo fallback contents-center" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo-large.png"></a></div>
				<nav>

					<div class="logo contents-center" itemscope itemtype="http://schema.org/Organization"><a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo-small.png"></a></div>

						<?php wp_nav_menu(array(
    					         'container' => false,                           // remove nav container
    					         'container_class' => 'menu cf',                 // class of container (should you choose to use it)
    					         'menu' => __( 'The Main Menu', 'bonestheme' ),  // nav name
    					         'menu_class' => 'nav top-nav cf',               // adding custom nav class
    					         'theme_location' => 'main-nav',                 // where it's located in the theme
    					         'before' => '',                                 // before the menu
        			               'after' => '',                                  // after the menu
        			               'link_before' => '',                            // before each link
        			               'link_after' => '',                             // after each link
        			               'depth' => 0,                                   // limit the depth of the nav
    					         'fallback_cb' => ''                             // fallback function (if there is one)
						)); ?>
						<a href="<?php get_custom('login_url'); ?>" class="button-black-outline nav-button">Log In</a>
						<a href="<?php get_custom('signup_url'); ?>" class="button-green-fill nav-button">Sign Up</a>
					<div class="closebutton"></div>
				</nav>

				<div class="dheader-content flex full-width text-center" style="width:100%;">
					<div class="wide-650">
						<h1 class="title"><?php get_custom('blog_title'); ?></h1>
						<p class="subhead"><?php get_custom('blog_subtitle'); ?></p>
					</div>
						
				</div>
			</header>

			<?php } else { ?>
			<header class="header flex flex-column background-green flex-wrap <?php if (is_page_template("page-home.php") || is_page_template("page-home-v2.php") || is_page_template("page-home-v3.php")) { echo "viewport-height-block"; }; ?> <?php if(!empty(get_post_meta(get_the_ID(), 'header_testimonial_person', 1)) && !empty(get_post_meta(get_the_ID(), 'header_testimonial_text', 1))) { ?>no-testimonial<?php }; ?> <?php headerbuttonsexist(); ?>" role="banner" itemscope itemtype="http://schema.org/WPHeader">
				<div class="sidemenubutton"></div>
				<div class="logo fallback contents-center" itemscope itemtype="http://schema.org/Organization"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo-large.png"></div>
				<nav>

					<div class="logo contents-center" itemscope itemtype="http://schema.org/Organization"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo-large.png"></div>

				</nav>
			</header>
			<?php } ?>
