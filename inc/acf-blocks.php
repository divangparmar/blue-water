<?php
/**
 * Register ACF Blocks
 *
 * @package Blue_Water
 */

function blue_water_register_acf_blocks() {
	if( function_exists('acf_register_block_type') ) {
		// Example Block Registration
		/*
		acf_register_block_type(array(
			'name'              => 'hero_section',
			'title'             => __('Hero Section'),
			'description'       => __('A custom hero section block.'),
			'render_template'   => 'template-parts/blocks/block-hero.php',
			'category'          => 'formatting',
			'icon'              => 'admin-comments',
			'keywords'          => array( 'hero', 'banner' ),
		));
		*/
	}
}
add_action('acf/init', 'blue_water_register_acf_blocks');
