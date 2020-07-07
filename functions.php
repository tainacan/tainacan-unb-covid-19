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

	wp_register_script( 'barra_brasil', 'https://barra.brasil.gov.br/barra.js', [], false, true );
	wp_enqueue_script( 'barra_brasil' );

}
add_action( 'wp_enqueue_scripts', 'tainacan_unb_covid_19_scripts' );  

function tainacan_unb_covid_19_barra_brasil_template() {
	?>
		<div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px;display:block;">
			<ul id="menu-barra-temp" style="list-style:none;">
				<li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED">
					<a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a>
				</li>
				<li>
				<a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a>
				</li>
			</ul>
		</div>
	<?php
}
add_action('wp_head', 'tainacan_unb_covid_19_barra_brasil_template');

?>