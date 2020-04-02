<?php get_header(); ?>
<div class="wrap">
    <div id="primary" class="content-area">   
        <main id="main" class="site-main" role="main">
            <?php if ( have_posts() ) : ?>

                <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>

                    <?php do_action( 'tainacan-unb-covid-19-single-item-top' ); ?>

                    <?php while ( have_posts() ) : the_post(); ?>
                        <header class="entry-header">  
                            <h1 class="entry-title">
                                <?php the_title(); ?>
                                <?php if (has_post_thumbnail()): ?>
                                    <div class="single-item-collection--thumbnail">
                                        <?php the_post_thumbnail('tainacan-medium-full', array('class' => 'item-card--thumbnail mt-2')); ?>
                                    </div>
                                <?php endif; ?>
                            </h1> 
                            <?php if (has_post_thumbnail()): ?>
                                <div class="entry-meta entry-meta-thumbnail-aside">
                            <?php else: ?>
                                <div class="entry-meta">
                            <?php endif; ?>
                                <a href="javascript:history.go(-1)">Voltar<object data="" type=""></object></a>
                                <span class="multivalue-separator">|</span>
                                <?php if(function_exists('tainacan_the_item_edit_link')) {
                                    tainacan_the_item_edit_link(null, '');
                                } ?>
                                <span class="multivalue-separator">|</span>
                                <?php if ( true == get_theme_mod( 'tainacan_facebook_share', true ) ) : ?> 
                                    <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" class="item-card-link--sharing" target="_blank">
                                        <img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/facebook-circle.png'; ?>" alt="Compartilhar no Facebook">
                                    </a>
                                <?php endif; ?>
                                <span class="multivalue-separator">|</span>
                                <?php if ( true == get_theme_mod( 'tainacan_twitter_share', true ) ) : ?> 
                                    <?php
                                    $twitter_option = get_theme_mod( 'tainacan_twitter_user' );
                                    $via = ! empty( $twitter_option ) ? '&amp;via=' . esc_attr( get_theme_mod( 'tainacan_twitter_user' ) ) : '';
                                    ?>
                                    <a href="http://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title_attribute(); ?><?php echo $via; ?>" target="_blank" class="item-card-link--sharing">
                                        <img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/twitter-circle.png'; ?>" alt="Compartilhar no Twitter">
                                    </a>
                                <?php endif; ?>
                            </div>
                        </header>
                        
                        <?php do_action( 'tainacan-unb-covid-19-single-item-after-title' ); ?>
                    
                        <section class="tainacan-entry-content entry-content">

                            <h2 class="title-content-items">Informações</h2>
                            <div class="single-item-collection--information justify-content-center">
                                <div class="tainacan-metadata-list">
                               
                                
                                <?php do_action( 'tainacan-unb-covid-19-single-item-metadata-begin' ); ?>
                                
                                    <?php
                                        $args = array(
                                            'before_title' => '<div><h3>',
                                            'after_title' => '</h3>',
                                            'before_value' => '<p>',
                                            'after_value' => '</p></div>',
                                        );
                                        //$field = null;
                                        tainacan_the_metadata( $args );
                                    ?>
                                    <?php do_action( 'tainacan-unb-covid-19-single-item-metadata-end' ); ?>
                                </div>
                            </div>
                        </section>
                        
                        <?php do_action( 'tainacan-unb-covid-19-single-item-after-metadata' ); ?>

                        <?php if ( tainacan_has_document() ) : ?>
                            <hr>
                            <section class="tainacan-entry-content entry-content">
                                <h2 class="title-content-items">Documento</h2>
                                <div class="single-item-collection--document">
                                    <?php tainacan_the_document(); ?>
                                </div>
                            </section>
                        <?php endif; ?>
                    
                        <?php do_action( 'tainacan-unb-covid-19-single-item-after-document' ); ?>

                        <?php
                            if (function_exists('tainacan_get_the_attachments')) {
                                $attachments = tainacan_get_the_attachments();
                            } else {
                                // compatibility with pre 0.11 tainacan plugin
                                $attachments = array_values(
                                    get_children(
                                        array(
                                            'post_parent' => $post->ID,
                                            'post_type' => 'attachment',
                                            'post_mime_type' => 'image',
                                            'order' => 'ASC',
                                            'numberposts'  => -1,
                                        )
                                    )
                                );
                            }
                        ?>

                        <?php if ( ! empty( $attachments ) ) : ?>
                            <hr>
                            <section class="tainacan-entry-content entry-content">
                                <h2 class="title-content-items">Anexos</h2>
                                <div class="single-item-collection--attachments">
                                    <?php foreach ( $attachments as $attachment ) { ?>
                                        <?php
                                        if ( function_exists('tainacan_get_attachment_html_url') ) {
                                            $href = tainacan_get_attachment_html_url($attachment->ID);
                                        } else {
                                            $href = wp_get_attachment_url($attachment->ID, 'large');
                                        }
                                        ?>
                                        <div class="single-item-collection--attachments-file">
                                            <a 
                                                class="<?php if (!wp_get_attachment_image( $attachment->ID, 'tainacan-unb-covid-19-item-attachments')) echo'attachment-without-image'; ?>"
                                                href="<?php echo $href; ?>" data-toggle="lightbox" data-gallery="example-gallery">
                                                <?php
                                                    echo wp_get_attachment_image( $attachment->ID, 'tainacan-unb-covid-19-item-attachments', true );
                                                    echo get_the_title( $attachment->ID );
                                                ?>
                                            </a>
                                        </div>
                                    <?php }
                                    ?>
                                </div>
                            </section>

                            <footer class="entry-footer">
                                <?php
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif; ?>
                            </footer>

                        </article>

                    <?php endif; ?>

                    <?php do_action( 'tainacan-unb-covid-19-single-item-after-attachments' ); ?>

                <?php endwhile; ?>
                <?php do_action( 'tainacan-unb-covid-19-single-item-bottom' ); ?>
            <?php else : ?>
                Nada encontrado aqui.
            <?php endif; ?>
        
        </main>
    </div>
</div>
<?php get_footer(); ?>

<script>
	
</script>