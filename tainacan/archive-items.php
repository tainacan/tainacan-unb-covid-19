<?php get_header(); ?>

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
	<?php if (has_post_thumbnail( tainacan_get_collection_id() )): ?>
		<div class="entry-meta entry-meta-thumbnail-aside">
	<?php else: ?>
		<div class="entry-meta">
	<?php endif; ?>
		<a href="javascript:history.go(-1)">Voltar<object data="" type=""></object></a>
		<span class="multivalue-separator">|</span>

		<?php global $wp; ?>
		<?php if ( true == get_theme_mod( 'tainacan_facebook_share', true ) ) : ?> 
			<a href="http://www.facebook.com/sharer.php?u=<?php esc_url( home_url( $wp->request ) ); ?>" class="item-card-link--sharing" target="_blank">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/facebook-circle.png'; ?>" alt="Compartilhar no Facebook">
			</a>
		<?php endif; ?>
		<span class="multivalue-separator">|</span>
		<?php if ( true == get_theme_mod( 'tainacan_twitter_share', true ) ) : ?> 
			<?php
			$twitter_option = get_theme_mod( 'tainacan_twitter_user' );
			$via = ! empty( $twitter_option ) ? '&amp;via=' . esc_attr( get_theme_mod( 'tainacan_twitter_user' ) ) : '';
			?>
			<a href="http://twitter.com/share?url=<?php esc_url( home_url( $wp->request ) ); ?>&amp;text=<?php the_title_attribute(); ?><?php echo $via; ?>" target="_blank" class="item-card-link--sharing">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/twitter-circle.png'; ?>" alt="Compartilhar no Twitter">
			</a>
		<?php endif; ?>
	</div>
</header>

<?php tainacan_the_faceted_search(); ?>

<?php get_footer();
