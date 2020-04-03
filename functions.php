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

function tainacan_unb_covid_19_scripts() {

	wp_register_script( 'v_libras_library', 'https://vlibras.gov.br/app/vlibras-plugin.js', [] );
	wp_enqueue_script( 'v_libras_library' );

	wp_register_script( 'v_libras_script', get_stylesheet_directory_uri() . '/assets/js/v-libras.js', []);
	wp_enqueue_script( 'v_libras_script' );

}
add_action( 'wp_enqueue_scripts', 'tainacan_unb_covid_19_scripts' );  

function tainacan_unb_covid_19_sv_libras_tags() {
	?>
		<div vw class="enabled">
			<div vw-access-button class="active"></div>
			<div vw-plugin-wrapper>
				<div class="vw-plugin-top-wrapper"></div>
			</div>
		</div>
	<?php
}
add_action('wp_footer', 'tainacan_unb_covid_19_sv_libras_tags');

?>