<?php
/**
 * ACF Settings: JSON Load and Save Points
 *
 * @package Blue_Water
 */

// Save ACF fields as JSON in theme directory
add_filter('acf/settings/save_json', 'blue_water_acf_json_save_point');
function blue_water_acf_json_save_point( $path ) {
	$path = get_stylesheet_directory() . '/acf-json';
	return $path;
}

// Load ACF fields from JSON in theme directory
add_filter('acf/settings/load_json', 'blue_water_acf_json_load_point');
function blue_water_acf_json_load_point( $paths ) {
	unset($paths[0]);
	$paths[] = get_stylesheet_directory() . '/acf-json';
	return $paths;
}
