<?php
/**
 * Register ACF Blocks
 *
 * @package Blue_Water
 */

function bluewater_block_category($categories, $post)
{
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'bluewater-blocks',
				'title' => __('Blue Water', 'textdomain'),
				'icon' => 'admin-site',
			),
		)
	);
}
add_filter('block_categories_all', 'bluewater_block_category', 10, 2);

function blue_water_register_acf_blocks()
{
	if (function_exists('acf_register_block_type')) {
		// Hero Section Block
		acf_register_block_type(array(
			'name' => 'hero-section',
			'title' => __('Hero Section'),
			'description' => __('A custom hero section block.'),
			'render_template' => 'template-parts/blocks/block-hero.php',
			'category' => 'bluewater-blocks',
			'icon' => 'cover-image',
			'keywords' => array('hero', 'banner'),
			'mode' => 'edit',
		));

		// Support Section Block
		acf_register_block_type(array(
			'name' => 'support-section',
			'title' => __('Support Section'),
			'description' => __('Step-by-step support section block.'),
			'render_template' => 'template-parts/blocks/block-support.php',
			'category' => 'bluewater-blocks',
			'icon' => 'welcome-learn-more',
			'keywords' => array('support', 'steps', 'services'),
			'mode' => 'edit',
		));

		// How It Works Block
		acf_register_block_type(array(
			'name' => 'how-it-works',
			'title' => __('How It Works'),
			'description' => __('How it works section block.'),
			'render_template' => 'template-parts/blocks/block-how-it-works.php',
			'category' => 'bluewater-blocks',
			'icon' => 'welcome-widgets-menus',
			'keywords' => array('how', 'steps', 'process'),
			'mode' => 'edit',
		));

		// Services Section Block
		acf_register_block_type(array(
			'name' => 'services-section',
			'title' => __('Services Section'),
			'description' => __('Services grid section block.'),
			'render_template' => 'template-parts/blocks/block-services.php',
			'category' => 'bluewater-blocks',
			'icon' => 'grid-view',
			'keywords' => array('services', 'products', 'grid'),
			'mode' => 'edit',
		));
	}
}
add_action('acf/init', 'blue_water_register_acf_blocks');
