<?php
/*
 * Plugin Name:       Frags.au custom code
 * Plugin URI:        https://frags.au/
 * Description:       Custom code.
 * Version:           0.1
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * Author:            findingsimple
 * Author URI:        https://findingsimple.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://github.com/binaryplayground/frags-custom/
 * Text Domain:       frags-custom
 */


add_action('wp_head', 'frags_add_typekit');

function frags_add_typekit(){
	if ( ! is_admin() ) { 
		echo '<link rel="stylesheet" href="https://use.typekit.net/bmc0efd.css"><style>.wp-block-site-title a { font-family: bitcount-prop-double-square, sans-serif; font-weight: 500; font-style: normal; }</style>';
	}
};

function add_loginout_block_to_primary_navigation( $hooked_block_types, $relative_position, $anchor_block_type, $context ) {

	// Is $context a Navigation menu?
	if ( ! $context instanceof WP_Post || 'wp_navigation' !== $context->post_type ) {
		return $hooked_block_types;
	}
	
	if ( 'last_child' === $relative_position && 'core/navigation' === $anchor_block_type ) {
		$hooked_block_types[] = 'core/loginout';
	}

	return $hooked_block_types;
}
//add_filter( 'hooked_block_types', 'add_loginout_block_to_primary_navigation', 10, 4 );

