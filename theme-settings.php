<?php

/**
 * ILC Tabbed Settings Page
 */

add_action( 'init', 'admin_init' );
add_action( 'admin_menu', 'settings_page_init' );

if(function_exists( 'wp_enqueue_media' )){
    wp_enqueue_media();
  }else{
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
  }

function admin_init() {
	$settings = get_option( "theme_settings" );
	if ( empty( $settings ) ) {
		$settings = array(
			'tag_class' => false,
		);
		add_option( "theme_settings", $settings, '', 'yes' );
	}	
}

function settings_page_init() {
	$theme_data = get_theme_data( TEMPLATEPATH . '/style.css' );
	$settings_page = add_theme_page( $theme_data['Name']. ' Theme Settings', $theme_data['Name']. ' Theme Settings', 'edit_theme_options', 'theme-settings', 'settings_page' );
	add_action( "load-{$settings_page}", 'load_settings_page' );
}

function load_settings_page() {
	if ( $_POST["ilc-settings-submit"] == 'Y' ) {
		check_admin_referer( "ilc-settings-page" );
		save_theme_settings();
		$url_parameters = isset($_GET['tab'])? 'updated=true&tab='.$_GET['tab'] : 'updated=true';
		wp_redirect(admin_url('themes.php?page=theme-settings&'.$url_parameters));
		exit;
	}
}

function save_theme_settings() {
	global $pagenow;
	$settings = get_option( "theme_settings" );
	
	if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ){ 
		if ( isset ( $_GET['tab'] ) )
	        $tab = $_GET['tab']; 
	    else
	        $tab = 'general'; 

	    switch ( $tab ){ 
	        case 'general' :
		        $settings['login_url']	  = $_POST['login_url'];
		        $settings['signup_url']	  = $_POST['signup_url'];
				$settings['tag_class']	  = $_POST['tag_class'];
				$settings['blog_title']	  = $_POST['blog_title'];
				$settings['blog_subtitle']	  = $_POST['blog_subtitle'];
				$settings['contact_email']	  = $_POST['contact_email'];
				$settings['contact_number']	  = $_POST['contact_number'];

				$settings['blog_footer_h2']	  = $_POST['blog_footer_h2'];
				$settings['blog_footer_subtitle']	  = $_POST['blog_footer_subtitle'];
				$settings['blog_footer_primary_button_url']	  = $_POST['blog_footer_primary_button_url'];
				$settings['blog_footer_primary_button_text']	  = $_POST['blog_footer_primary_button_text'];
			break; 
			case 'testimonials' :
				$settings['testimonial_1_name']	  = $_POST['testimonial_1_name'];
				$settings['testimonial_1_img']	  = $_POST['testimonial_1_img'];
				$settings['testimonial_1_position']	  = $_POST['testimonial_1_position'];
				$settings['testimonial_1_testimonial']	  = $_POST['testimonial_1_testimonial'];

				$settings['testimonial_2_name']	  = $_POST['testimonial_2_name'];
				$settings['testimonial_2_img']	  = $_POST['testimonial_2_img'];
				$settings['testimonial_2_position']	  = $_POST['testimonial_2_position'];
				$settings['testimonial_2_testimonial']	  = $_POST['testimonial_2_testimonial'];

				$settings['header_testimonial_name']	  = $_POST['header_testimonial_name'];
				$settings['header_testimonial_img']	  = $_POST['header_testimonial_img'];
				$settings['header_testimonial_position']	  = $_POST['header_testimonial_position'];
				$settings['header_testimonial_testimonial']	  = $_POST['header_testimonial_testimonial'];
			break; 
	        case 'footer' : 
				$settings['footer_scripts']  = $_POST['footer_scripts'];
				$settings['facebook_url']  = $_POST['facebook_url'];
				$settings['twitter_url']  = $_POST['twitter_url'];
				$settings['linkedin_url']  = $_POST['linkedin_url'];
				$settings['instagram_url']  = $_POST['instagram_url'];
			break;
	    }
	}
	
	if( !current_user_can( 'unfiltered_html' ) ){
		if ( $settings['footer_scripts']  )
			$settings['footer_scripts'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['footer_scripts'] ) ) );
		if ( $settings['blog_title'] )
			$settings['blog_title'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['blog_title'] ) ) );
		if ( $settings['blog_subtitle'] )
			$settings['blog_subtitle'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['blog_subtitle'] ) ) );
		if ( $settings['testimonial_1_img'] )
			$settings['testimonial_1_img'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['testimonial_1_img'] ) ) );
		if ( $settings['footer_scripts'] )
			$settings['footer_scripts'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['footer_scripts'] ) ) );
	}

	$updated = update_option( "theme_settings", $settings );
}

function admin_tabs( $current = 'general' ) { 
    $tabs = array( 'general' => 'General', 'testimonials' => 'Testimonials', 'footer' => 'Footer' ); 
    $links = array();
    echo '<div id="icon-themes" class="icon32"><br></div>';
    echo '<h2 class="nav-tab-wrapper">';
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=theme-settings&tab=$tab'>$name</a>";
        
    }
    echo '</h2>';
}

function settings_page() {
	global $pagenow;
	$settings = get_option( "theme_settings" );
	$theme_data = get_theme_data( TEMPLATEPATH . '/style.css' );
	?>
	
	<div class="wrap">
		<h2><?php echo $theme_data['Name']; ?> Theme Settings</h2>
		
		<?php
			if ( 'true' == esc_attr( $_GET['updated'] ) ) echo '<div class="updated" ><p>Theme Settings updated.</p></div>';
			
			if ( isset ( $_GET['tab'] ) ) admin_tabs($_GET['tab']); else admin_tabs('general');
		?>

		<div id="poststuff">
			<form method="post" action="<?php admin_url( 'themes.php?page=theme-settings' ); ?>">
				<?php
				wp_nonce_field( "ilc-settings-page" ); 
				
				if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ){ 
				
					if ( isset ( $_GET['tab'] ) ) $tab = $_GET['tab']; 
					else $tab = 'general'; 
					
					echo '<table class="form-table">';
					switch ( $tab ){
						case 'general' :
							?>
							<tr>
								<th><label for="login_url">Login URL:</label></th>
								<td>
									<input id="login_url" name="login_url" cols="60" type="text" value="<?php echo esc_html( stripslashes( $settings["login_url"] ) ); ?>" /> 
									<span class="description">Default login URL for nav</span>
								</td>
							</tr>
							<tr>
								<th><label for="signup_url">Signup URL:</label></th>
								<td>
									<input id="signup_url" name="signup_url" cols="60" type="text" value="<?php echo esc_html( stripslashes( $settings["signup_url"] ) ); ?>" /> 
									<span class="description">Default signup URL for nav</span>
								</td>
							</tr>
							<tr>
								<th><label for="blog_title">Blog Title:</label></th>
								<td>
									<input id="blog_title" name="blog_title" cols="60" type="text" value="<?php echo esc_html( stripslashes( $settings["blog_title"] ) ); ?>" /> 
									<span class="description">Header in green header block on each blog post.</span>
								</td>
							</tr>
							<tr>
								<th><label for="blog_subtitle">Blog Subtitle:</label></th>
								<td>
									<input id="blog_subtitle" name="blog_subtitle" cols="60" type="text" value="<?php echo esc_html( stripslashes( $settings["blog_subtitle"] ) ); ?>" /> 
									<span class="description">Subtitle in green header block on each blog post.</span>
								</td>
							</tr>
							<tr>
								<th><label for="contact_email">Public Email Address:</label></th>
								<td>
									<input id="contact_email" name="contact_email" cols="60" type="text" value="<?php echo esc_html( stripslashes( $settings["contact_email"] ) ); ?>" /> 
								</td>
							</tr>
							<tr>
								<th><label for="contact_number">Public Phone Number:</label></th>
								<td>
									<input id="contact_number" name="contact_number" cols="60" type="text" value="<?php echo esc_html( stripslashes( $settings["contact_number"] ) ); ?>" /> 
								</td>
							</tr>

							<tr>
								<th><label for="blog_footer_h2">Blog Footer Title:</label></th>
								<td>
									<input id="blog_footer_h2" name="blog_footer_h2" cols="60" type="text" value="<?php echo esc_html( stripslashes( $settings["blog_footer_h2"] ) ); ?>" /> 
								</td>
							</tr>
							<tr>
								<th><label for="blog_footer_subtitle">Bloog Footer Subtitle:</label></th>
								<td>
									<input id="blog_footer_subtitle" name="blog_footer_subtitle" cols="60" type="text" value="<?php echo esc_html( stripslashes( $settings["blog_footer_subtitle"] ) ); ?>" /> 
								</td>
							</tr>

							<tr>
								<th><label for="blog_footer_primary_button_url">Blog Footer Button URL:</label></th>
								<td>
									<input id="blog_footer_primary_button_url" name="blog_footer_primary_button_url" cols="60" type="text" value="<?php echo esc_html( stripslashes( $settings["blog_footer_primary_button_url"] ) ); ?>" /> 
								</td>
							</tr>

							<tr>
								<th><label for="blog_footer_primary_button_text">Blog Footer Button Text:</label></th>
								<td>
									<input id="blog_footer_primary_button_text" name="blog_footer_primary_button_text" cols="60" type="text" value="<?php echo esc_html( stripslashes( $settings["blog_footer_primary_button_text"] ) ); ?>" /> 
								</td>
							</tr>

							<?php
						break; 
						case 'testimonials' :
							?>
							<tr>
								<th><label for="testimonial_1_img">Testimonial 1 Image</label></th>
								<td>
									<img class="testimonial_1_img" src="<?php echo get_custom('testimonial_1_img'); ?>" height="100" width="100"/><br>
									<input class="testimonial_1_img_url" type="text" name="testimonial_1_img" size="60" value="<?php echo get_custom('testimonial_1_img'); ?>"><br/>
									<a href="#" class="testimonial_1_img_upload">Upload</a>
								</td>
							</tr>
							<tr>
								<th><label for="btestimonial_1_name">Testimonial 1 Name:</label></th>
								<td>
									<input id="testimonial_1_name" name="testimonial_1_name" cols="60" type="text" value="<?php echo get_custom('testimonial_1_name'); ?>" /> <br/>
									<span class="description">Subtitle in green header block on each blog post.</span>
								</td>
							</tr>
							<tr>
								<th><label for="testimonial_1_position">Testimonial 1 Position:</label></th>
								<td>
									<input id="testimonial_1_position" name="testimonial_1_position" cols="60" type="text" value="<?php echo get_custom('testimonial_1_position'); ?>" /> <br/>
									<span class="description">First Testimonial Job/Company</span>
								</td>
							</tr>
							<tr>
								<th><label for="testimonial_1_testimonial">Testimonial 1 Testimonial:</label></th>
								<td>
									<textarea id="testimonial_1_testimonial" name="testimonial_1_testimonial" cols="60" type="text" value="<?php echo get_custom('testimonial_1_testimonial'); ?>" /><?php echo get_custom('testimonial_1_testimonial'); ?></textarea><br/>
									<span class="description">The Testimonial</span>
								</td>
							</tr>



							<tr>
								<th><label for="testimonial_2_img">Testimonial 2 Image</label></th>
								<td>
									<img class="testimonial_2_img" src="<?php echo get_custom('testimonial_2_img'); ?>" height="100" width="100"/><br>
									<input class="testimonial_2_img_url" type="text" name="testimonial_2_img" size="60" value="<?php echo get_custom('testimonial_2_img'); ?>"><br/>
									<a href="#" class="testimonial_2_img_upload">Upload</a>
								</td>
							</tr>
							<tr>
								<th><label for="btestimonial_2_name">Testimonial 2 Name:</label></th>
								<td>
									<input id="testimonial_2_name" name="testimonial_2_name" cols="60" type="text" value="<?php echo get_custom('testimonial_2_name'); ?>" /> <br/>
									<span class="description">Subtitle in green header block on each blog post.</span>
								</td>
							</tr>
							<tr>
								<th><label for="testimonial_2_position">Testimonial 2 Position:</label></th>
								<td>
									<input id="testimonial_2_position" name="testimonial_2_position" cols="60" type="text" value="<?php echo get_custom('testimonial_2_position'); ?>" /> <br/>
									<span class="description">First Testimonial Job/Company</span>
								</td>
							</tr>
							<tr>
								<th><label for="testimonial_2_testimonial">Testimonial 2 Testimonial:</label></th>
								<td>
									<textarea id="testimonial_2_testimonial" name="testimonial_2_testimonial" cols="60" type="text" value="<?php echo get_custom('testimonial_2_testimonial'); ?>" /><?php echo get_custom('testimonial_2_testimonial'); ?></textarea><br/>
									<span class="description">The Testimonial</span>
								</td>
							</tr>
							<?php
						break; 
						case 'footer' : 
							?>
							<tr>
								<th><label for="footer_scripts">Insert Scripts here</label></th>
								<td>
									<textarea id="footer_scripts" name="footer_scripts" cols="60" rows="5"><?php echo esc_html( stripslashes( $settings["footer_scripts"] ) ); ?></textarea><br/>
									<span class="description">Tracking codes go here (i.e. Google Analytics)</span>
								</td>
							</tr>
							<tr>
								<th><label for="facebook_url">Facebook URL:</label></th>
								<td>
									<input id="facebook_url" name="facebook_url" cols="60" type="text" value="<?php echo esc_html( stripslashes( $settings["facebook_url"] ) ); ?>" /> 
								</td>
							</tr>
							<tr>
								<th><label for="twitter_url">Twitter URL:</label></th>
								<td>
									<input id="twitter_url" name="twitter_url" cols="60" type="text" value="<?php echo esc_html( stripslashes( $settings["twitter_url"] ) ); ?>" /> 
								</td>
							</tr>
							<tr>
								<th><label for="linkedin_url">LinkedIn URL:</label></th>
								<td>
									<input id="linkedin_url" name="linkedin_url" cols="60" type="text" value="<?php echo esc_html( stripslashes( $settings["linkedin_url"] ) ); ?>" /> 
								</td>
							</tr>
							<tr>
								<th><label for="instagram_url">Instagram URL:</label></th>
								<td>
									<input id="instagram_url" name="instagram_url" cols="60" type="text" value="<?php echo esc_html( stripslashes( $settings["instagram_url"] ) ); ?>" /> 
								</td>
							</tr>
							<?php
						break;
					}
					echo '</table>';
				}
				?>
				<p class="submit" style="clear: both;">
					<input type="submit" name="Submit"  class="button-primary" value="Update Settings" />
					<input type="hidden" name="ilc-settings-submit" value="Y" />
				</p>
			</form>
		</div>

	</div>

	<script>
    jQuery(document).ready(function($) {
        $('.testimonial_1_img_upload').click(function(e) {
            e.preventDefault();

            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: {
                    text: 'Upload Image'
                },
                multiple: false  // Set this to true to allow multiple files to be selected
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.testimonial_1_img').attr('src', attachment.url);
                $('.testimonial_1_img_url').val(attachment.url);

            })
            .open();
        });

         $('.testimonial_2_img_upload').click(function(e) {
            e.preventDefault();

            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: {
                    text: 'Upload Image'
                },
                multiple: false  // Set this to true to allow multiple files to be selected
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.testimonial_2_img').attr('src', attachment.url);
                $('.testimonial_2_img_url').val(attachment.url);

            })
            .open();
        });

          $('.header_testimonial_img_upload').click(function(e) {
            e.preventDefault();

            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: {
                    text: 'Upload Image'
                },
                multiple: false  // Set this to true to allow multiple files to be selected
            })
            .on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.header_testimonial_img').attr('src', attachment.url);
                $('.header_testimonial_img_url').val(attachment.url);

            })
            .open();
        });
    });
</script>


<?php
}


?>