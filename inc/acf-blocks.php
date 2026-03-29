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

		// Testimonials Section Block
		acf_register_block_type(array(
			'name' => 'testimonials-section',
			'title' => __('Testimonials Section'),
			'description' => __('Testimonials and reviews block.'),
			'render_template' => 'template-parts/blocks/block-testimonials.php',
			'category' => 'bluewater-blocks',
			'icon' => 'format-quote',
			'keywords' => array('testimonials', 'reviews', 'ratings'),
			'mode' => 'edit',
		));

		// Contact Section Block
		acf_register_block_type(array(
			'name' => 'contact-section',
			'title' => __('Contact Section'),
			'description' => __('Contact form and info block.'),
			'render_template' => 'template-parts/blocks/block-contact.php',
			'category' => 'bluewater-blocks',
			'icon' => 'email-alt',
			'keywords' => array('contact', 'form', 'touch'),
			'mode' => 'edit',
		));

		// Valuation Section Block
		acf_register_block_type(array(
			'name' => 'valuation-section',
			'title' => __('Valuation Section'),
			'description' => __('Valuation form and info block.'),
			'render_template' => 'template-parts/blocks/block-valuation.php',
			'category' => 'bluewater-blocks',
			'icon' => 'calculator',
			'keywords' => array('valuation', 'form', 'estimate'),
			'mode' => 'edit',
		));

		// Client Section Block
		acf_register_block_type(array(
			'name' => 'client-section',
			'title' => __('Client Logos Section'),
			'description' => __('Worldwide trusted client logos.'),
			'render_template' => 'template-parts/blocks/block-client.php',
			'category' => 'bluewater-blocks',
			'icon' => 'images-alt2',
			'keywords' => array('clients', 'logos', 'partners'),
			'mode' => 'edit',
		));
		// Exchange Section Block
		acf_register_block_type(array(
			'name' => 'exchange-section',
			'title' => __('Exchange Section'),
			'description' => __('True Blue Water Exchange block.'),
			'render_template' => 'template-parts/blocks/block-exchange.php',
			'category' => 'bluewater-blocks',
			'icon' => 'money-alt',
			'keywords' => array('exchange', 'trade', 'stats'),
			'mode' => 'edit',
		));

		// Banner Section Block
		acf_register_block_type(array(
			'name' => 'banner-section',
			'title' => __('Banner Section'),
			'description' => __('Page banner block.'),
			'render_template' => 'template-parts/blocks/block-banner.php',
			'category' => 'bluewater-blocks',
			'icon' => 'cover-image',
			'keywords' => array('banner', 'hero', 'page title'),
			'mode' => 'edit',
		));

		// Team Section Block
		acf_register_block_type(array(
			'name' => 'team-section',
			'title' => __('Team Section'),
			'description' => __('Our Managing Board Team Section block.'),
			'render_template' => 'template-parts/blocks/block-team.php',
			'category' => 'bluewater-blocks',
			'icon' => 'groups',
			'keywords' => array('team', 'members', 'board'),
			'mode' => 'edit',
		));

		// Australian Owned Block
		acf_register_block_type(array(
			'name' => 'australian-owned',
			'title' => __('Australian Owned Section'),
			'description' => __('Proudly 100% Australian-Owned and Operated block.'),
			'render_template' => 'template-parts/blocks/block-australian-owned.php',
			'category' => 'bluewater-blocks',
			'icon' => 'admin-site',
			'keywords' => array('australian', 'owned', 'about'),
			'mode' => 'edit',
		));

		// Locations Section Block
		acf_register_block_type(array(
			'name' => 'locations-section',
			'title' => __('Locations Section'),
			'description' => __('Our Locations block with Maps.'),
			'render_template' => 'template-parts/blocks/block-locations.php',
			'category' => 'bluewater-blocks',
			'icon' => 'location-alt',
			'keywords' => array('locations', 'maps', 'address'),
			'mode' => 'edit',
		));

		// Why Partner Block
		acf_register_block_type(array(
			'name' => 'why-partner',
			'title' => __('Why Partner Section'),
			'description' => __('Why Partner With TB Water Exchange block.'),
			'render_template' => 'template-parts/blocks/block-why-partner.php',
			'category' => 'bluewater-blocks',
			'icon' => 'awards',
			'keywords' => array('partner', 'why', 'cards'),
			'mode' => 'edit',
		));

		// Partner CTA Block
		acf_register_block_type(array(
			'name' => 'partner-cta',
			'title' => __('Partner CTA Section'),
			'description' => __('Help others access smarter water trading solutions block.'),
			'render_template' => 'template-parts/blocks/block-partner-cta.php',
			'category' => 'bluewater-blocks',
			'icon' => 'megaphone',
			'keywords' => array('partner', 'cta', 'sign up'),
			'mode' => 'edit',
		));

		// Earn Commission Block
		acf_register_block_type(array(
			'name' => 'earn-commission',
			'title' => __('Earn Commission Section'),
			'description' => __('Earn Commission on Every Trade block.'),
			'render_template' => 'template-parts/blocks/block-earn-commission.php',
			'category' => 'bluewater-blocks',
			'icon' => 'chart-line',
			'keywords' => array('earn', 'commission', 'cards'),
			'mode' => 'edit',
		));

		// Partner Logos Block
		acf_register_block_type(array(
			'name' => 'partner-logos',
			'title' => __('Partner Logos Section'),
			'description' => __('Partner logos display block.'),
			'render_template' => 'template-parts/blocks/block-partner-logos.php',
			'category' => 'bluewater-blocks',
			'icon' => 'images-alt',
			'keywords' => array('partner', 'logos', 'companies'),
			'mode' => 'edit',
		));
	}
}
add_action('acf/init', 'blue_water_register_acf_blocks');
