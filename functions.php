<?php
/**
 * Tainacan-unb-covid-19 Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package tainacan-unb-covid-19
 */

add_action( 'wp_enqueue_scripts', 'veganos_parent_theme_enqueue_styles' );

/**
 * Enqueue scripts and styles.
 */
function veganos_parent_theme_enqueue_styles() {
	wp_enqueue_style( 'veganos-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'tainacan-unb-covid-19-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( 'veganos-style' )
	);

}
