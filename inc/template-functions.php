<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Blue_Water
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function blue_water_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'blue_water_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function blue_water_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'blue_water_pingback_header' );

/**
 * Add Bootstrap classes to navigation menu.
 */
function blue_water_add_menu_link_class( $atts, $item, $args ) {
    if ( property_exists( $args, 'theme_location' ) && $args->theme_location == 'menu-1' ) {
        $atts['class'] = 'nav-link';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'blue_water_add_menu_link_class', 1, 3 );

function blue_water_add_menu_list_item_class( $classes, $item, $args ) {
    if ( property_exists( $args, 'theme_location' ) && $args->theme_location == 'menu-1' ) {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'blue_water_add_menu_list_item_class', 1, 3 );
