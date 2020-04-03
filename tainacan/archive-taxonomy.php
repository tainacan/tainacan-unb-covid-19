<?php get_header(); ?>

<?php
	$current_term = tainacan_get_term();
	$current_taxonomy = get_taxonomy( $current_term->taxonomy );
	$current_term = \Tainacan\Repositories\Terms::get_instance()->fetch($current_term->term_id, $current_term->taxonomy);
	$image =  $current_term->get_header_image_id();
	$src = wp_get_attachment_image_src($image, 'full');
?>

<header class="entry-header archive-items-header">  
	<h1 class="entry-title">
		<span style="font-weight: normal;">
			<?php echo $current_taxonomy->labels->name . ':'; ?>
		</span>
		<?php tainacan_the_term_name(); ?>
		<?php if ($src && $src[0]) : ?>
			<div class="single-item-collection--thumbnail">
				<img src="<?php echo($src[0]) ?>" alt="Imagem do termo">
			</div>
		<?php endif; ?>
	</h1> 
	<?php $tainacan_term_description = tainacan_get_the_term_description(); ?>
	<?php if ( ! empty( $tainacan_term_description )) : ?>
		<?php if ($src): ?>
			<div class="entry-description entry-description-thumbnail-aside">
		<?php else: ?>
			<div class="entry-description">
		<?php endif; ?>
			<?php echo $tainacan_term_description; ?>
		</div>
	<?php endif; ?> 
	<?php if ($src): ?>
		<div class="entry-meta entry-meta-thumbnail-aside">
	<?php else: ?>
		<div class="entry-meta">
	<?php endif; ?>
		<a href="javascript:history.go(-1)">Voltar<object data="" type=""></object></a>
		<span class="multivalue-separator">|</span>
		Compartilhar:&nbsp;
		<?php if ( true == get_theme_mod( 'tainacan_facebook_share', true ) ) : ?> 
			<a href="http://www.facebook.com/sharer.php?u=<?php echo get_term_link((int) $current_term->get_id()); ?>" class="item-card-link--sharing" target="_blank">
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() ) . '/assets/images/facebook-circle.png'; ?>" alt="Compartilhar no Facebook">
			</a>
		<?php endif; ?>
		&nbsp;
		<?php if ( true == get_theme_mod( 'tainacan_twitter_share', true ) ) : ?> 
			<?php
			$twitter_option = get_theme_mod( 'tainacan_twitter_user' );
			$via = ! empty( $twitter_option ) ? '&amp;via=' . esc_attr( get_theme_mod( 'tainacan_twitter_user' ) ) : '';
			?>
			<a href="http://twitter.com/share?url=<?php echo get_term_link((int) $current_term->get_id()); ?>&amp;text=<?php echo $current_taxonomy->labels->name . ':' . $current_term->get_name(); ?><?php echo $via; ?>" target="_blank" class="item-card-link--sharing">
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() ) . '/assets/images/twitter-circle.png'; ?>" alt="Compartilhar no Twitter">
			</a>
		<?php endif; ?>
	</div>
</header>

<?php tainacan_the_faceted_search(); ?>

<?php get_footer();
