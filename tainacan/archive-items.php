<?php get_header(); ?>

<?php if ( get_header_image() ) : ?>
	<div class="front-page-content-area">
		<div id="hero" class="hero" style="background-image: url(<?php header_image(); ?>);">
			<img src="<?php header_image(); ?>" class="attachment-veganos-hero-thumbnail size-veganos-hero-thumbnail wp-post-image" alt="">						
			<div class="hero-container-outer">
			<div class="hero-container-inner">
					<article id="post-9" class="post-9 page type-page status-publish has-post-thumbnail hentry">
<?php endif; ?>										
					<header class="entry-header archive-items-header">  
						<h1 class="entry-title">
							<?php tainacan_the_collection_name(); ?>
							<?php if ( has_post_thumbnail( tainacan_get_collection_id() ) ) : 
								$thumbnail_id = get_post_thumbnail_id( $post->ID );
								$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>
								<div class="single-item-collection--thumbnail">
									<img src="<?php echo get_the_post_thumbnail_url( tainacan_get_collection_id() ); ?>" class="t-collection--info-img rounded-circle img-fluid border border-white position-absolute text-left" alt="<?php echo esc_attr($alt); ?>">
								</div>
							<?php endif; ?>
						</h1>
						<?php $tainacan_collection_description = tainacan_get_the_collection_description(); ?>
						<?php if ( ! empty( $tainacan_collection_description )) : ?>
							<?php if (has_post_thumbnail( tainacan_get_collection_id() )): ?>
								<div class="entry-description entry-description-thumbnail-aside">
							<?php else: ?>
								<div class="entry-description">
							<?php endif; ?>
								<?php tainacan_the_collection_description(); ?>
							</div>
						<?php endif; ?> 
					</header>
<?php if ( get_header_image() ) : ?>
					</article>
				</div>
			</div>
			<span class="overlay-bg"></span>
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1440 86" style="enable-background:new 0 0 1440 86;" xml:space="preserve">
				<path class="st0" d="M685.6,38.8C418.7-11.1,170.2,9.9,0,30v96h1440V30C1252.7,52.2,1010,99.4,685.6,38.8z"></path>
			</svg>
		</div>
	</div>
<?php endif; ?>

<div class="archive-items-header">
	<?php if (get_header_image()): ?>
		<div class="entry-meta entry-meta-header-above">
	<?php else: ?>
		<div class="entry-meta">
	<?php endif; ?>
		<a href="javascript:history.go(-1)">Voltar<object data="" type=""></object></a>
		<span class="multivalue-separator">|</span>
		Compartilhar:&nbsp; 
		<?php global $wp; ?>
		<?php if ( true == get_theme_mod( 'tainacan_facebook_share', true ) ) : ?> 
			<a href="http://www.facebook.com/sharer.php?u=<?php esc_url( home_url( $wp->request ) ); ?>" class="item-card-link--sharing" target="_blank">
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() ) . '/assets/images/facebook-circle.png'; ?>" alt="Compartilhar no Facebook">
			</a>
		<?php endif; ?>
		&nbsp;
		<?php if ( true == get_theme_mod( 'tainacan_twitter_share', true ) ) : ?> 
			<?php
			$twitter_option = get_theme_mod( 'tainacan_twitter_user' );
			$via = ! empty( $twitter_option ) ? '&amp;via=' . esc_attr( get_theme_mod( 'tainacan_twitter_user' ) ) : '';
			?>
			<a href="http://twitter.com/share?url=<?php esc_url( home_url( $wp->request ) ); ?>&amp;text=<?php tainacan_the_collection_name() ?><?php echo $via; ?>" target="_blank" class="item-card-link--sharing">
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() ) . '/assets/images/twitter-circle.png'; ?>" alt="Compartilhar no Twitter">
			</a>
		<?php endif; ?>
	</div>
</div>	

<?php tainacan_the_faceted_search(); ?>

<?php get_footer();
