<?php
/**
 * ACF Theme Options Page
 *
 * @package Blue_Water
 */

if( function_exists('acf_add_options_page') ) {
	
	// Add parent options page
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'icon_url'      => 'dashicons-admin-generic',
		'position'      => 30
	));

	// Add sub pages
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-options',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-options',
	));
	
}
