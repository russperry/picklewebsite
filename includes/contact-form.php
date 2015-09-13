<?php

	$shortcode = $_POST['shortcode'];

	if (!empty($shortcode)) {
		echo $shortcode;
		echo 'wooohooo';
		echo do_shortcode($shortcode);
	} else {
		echo do_shortcode(get_post_meta(get_the_ID(), 'contact_form_shortcode', 1));
	}

?>