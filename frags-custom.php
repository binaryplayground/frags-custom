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

/**
 * Changes the logo title (hover text)
 */
function frags_login_logo_url_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertext', 'frags_login_logo_url_title' );

/**
 * Changes the logo URL to the website's homepage
 */
function frags_login_logo_url() {
    return get_bloginfo( 'wpurl' );
}
add_filter( 'login_headerurl', 'frags_login_logo_url' );

/**
 * Change login logo
 */
function frags_login_logo() { ?>
    <style type="text/css">
        #login h1 a {
            background-image: url(<?php echo esc_url( plugins_url( 'assets/logo.png', __FILE__ ) )  ?>); !important;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'frags_login_logo' );
