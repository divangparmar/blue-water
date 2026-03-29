<?php
/**
 * Blue Water functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blue_Water
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Required files
 */
require get_template_directory() . '/inc/theme-setup.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/theme-options.php';
require get_template_directory() . '/inc/acf-fields.php';
require get_template_directory() . '/inc/acf-blocks.php';

/**
 * Keep original underscores includes if needed
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
