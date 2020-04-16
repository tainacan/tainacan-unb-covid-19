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

	wp_register_script( 'barra_unb', get_stylesheet_directory_uri() . '/assets/js/barra-unb.js', []);
	wp_enqueue_script( 'barra_unb' );

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

function tainacan_unb_covid_19_barra_unb_template() {
	?>
		<div class="barra-topo">
			<div class="barra-inner container">
				<div class="row-fluid">
					<div class="logo-unb span3">
						<div class="custom">
							<p>
								<a href="https://www.unb.br" title="Ir para o Portal da UnB">
								<img alt="" src="https://web.unb.br/images/logo-unb.png">
							</a>
							</p>
						</div>
					</div>
					<div class="menu-unb span7">
						<div class="menu-toggle-list">
							<a class="btn-menu collapsed" data-target="#menu-collapse" data-toggle="collapse" onClick="barraUnbOpenMenu(event)">
								<img src="https://web.unb.br/images/icon-menu.png" alt="Ícone do menu">
								<span>Menu</span>
							</a>
							<div id="menu-collapse" class="barra-sp-mobile-menu collapse">
								<ul class="nav menu">
									<li class="item-301">
										<a href="http://www.unb.br/a-unb?menu=423" target="_blank">Sobre a UnB</a>
									</li>
									<li class="item-305">
										<a href="https://www.unb.br/institucional/unidades-academicas/institutos" target="_blank">Unidades acadêmicas</a>
									</li>
									<li class="item-302">
										<a href="https://www.unb.br/estude-na-unb/graduacao" target="_blank">Estude na UnB</a>
									</li>
									<li class="item-312">
										<a href="http://www.unb.br/graduacao?menu=439" target="_blank">Graduação</a>
									</li>
									<li class="item-313">
										<a href="http://www.unb.br/pos-graduacao?menu=440" target="_blank">Pós-Graduação</a>
									</li>
									<li class="item-306">
										<a href="http://www.unb.br/estrutura-administrativa?menu=425" target="_blank">Administração</a>
									</li>
									<li class="item-307">
										<a href="http://dgp.unb.br/" target="_blank">Servidor</a>
									</li>					      
								</ul>
							</div>
						</div>
					</div>
					<div class="links-unb span2 pull-right">
						<div class="modulo-icones-barratopo" style="float:right">
							<ul>
								<!-- 
									111 <li><a target="_blank" href="https://webmail.unb.br/" class="icones-barratopo" id="default">&nbsp;</a>
								</li> -->
								<!-- JONA-->                         
								<li>
									<a target="_blank" href="https://webmail.unb.br/" class="icones-barratopo" id="webmail" title="Webmail">&nbsp;</a>
								</li>
								<li style="display:none;">
									<a href="/mapa-do-site?view=html&amp;id=0" class="icones-barratopo" style="padding-right:35px" id="mapa" title="Mapa do Site">&nbsp;</a>
								</li>
								<li>
									<a target="_blank" href="https://noticias.unb.br/images/Telefones_unb/mprazer.pdf" id="telefones" title="Telefones da UnB">&nbsp;</a>
								</li>
								<li>
									<a target="_blank" href="https://sistema.ouvidorias.gov.br" id="transparencia" title="Fala.BR">&nbsp;</a>
								</li>
								<li>
									<a target="_blank" href="http://www.sistemas.unb.br" class="icones-barratopo" id="sistemas" title="Sistemas">&nbsp;</a>
								</li> 
							</ul>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	<?php
}
add_action('wp_head', 'tainacan_unb_covid_19_barra_unb_template');

?>