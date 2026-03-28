<?php
/**
 * Enqueue scripts and styles.
 *
 * @package Blue_Water
 */

function blue_water_scripts()
{
	// Main theme style
	wp_enqueue_style('blue-water-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('blue-water-style', 'rtl', 'replace');

	// HTML theme styles
	wp_enqueue_style('blue-water-fontawesome', get_template_directory_uri() . '/assets/css/all.min.css', array(), _S_VERSION);
	wp_enqueue_style('blue-water-fontawesome-min', get_template_directory_uri() . '/assets/css/fontawesome.min.css', array(), _S_VERSION);
	wp_enqueue_style('blue-water-themify', get_template_directory_uri() . '/assets/css/themify-icons.css', array(), _S_VERSION);
	wp_enqueue_style('blue-water-owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), _S_VERSION);
	wp_enqueue_style('blue-water-nice-select', get_template_directory_uri() . '/assets/css/nice-select.css', array(), _S_VERSION);
	wp_enqueue_style('blue-water-fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.min.css', array(), _S_VERSION);
	wp_enqueue_style('blue-water-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION);
	wp_enqueue_style('blue-water-main', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION);
	wp_enqueue_style('blue-water-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), _S_VERSION);

	// Google Fonts
	wp_enqueue_style('blue-water-google-fonts', '//fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&display=swap', array(), null);

	// HTML theme scripts
	// We'll rely on WP's built-in jQuery
	wp_enqueue_script('blue-water-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('blue-water-owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('blue-water-nice-select', get_template_directory_uri() . '/assets/js/jquery.nice-select.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('blue-water-fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('blue-water-countto', get_template_directory_uri() . '/assets/js/jquery.countTo.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('blue-water-jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('blue-water-rainyday', get_template_directory_uri() . '/assets/js/rainyday.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('blue-water-popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), _S_VERSION, true);
	wp_enqueue_script('blue-water-custom-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), _S_VERSION, true);

	wp_enqueue_script('blue-water-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'blue_water_scripts');
