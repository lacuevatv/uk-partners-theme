<?php
global $metaDestinos;
?>

<!-- **********DESTINOS********* -->
<section class="uk-destinos">
    <div class="wrap">
        <h2 class="title-section">
            <?php _e('Otros destinos', 'ukpartnerstheme'); ?>
        </h2>
        <p class="sub-line">
            <?php esc_html_e($metaDestinos[3]); ?>
        </p>

        <div class="destinos-wrapper">

            <?php
            $destinos = new WP_Query( 
                array(
                    'post_type'      => 'destinos',
                    'posts_per_page' => $metaDestinos[1],
                    'order'          => 'desc',
                    ) 
            );
            $counterDestinos = 0;
			if ( $destinos->have_posts() ) : ?>
            
                <ul class="destinos-lista">

                    <?php 
                    while ( $destinos->have_posts() ) : $destinos->the_post();
                    $counterDestinos++;

                    if ($metaDestinos[2] == 1 && $counterDestinos == $metaDestinos[1] ) { ?>
                        <li>
                            <a href="<?php echo $destino['url']; ?>">
                                <article class="destino">
                                    
                                    <div class="destino-imagen load-images-ajax">
                                        <img data-src="<?php echo IMAGES_DIR; ?>default_destinos.png" alt="<?php _e('Más lugares', 'ukpartnerstheme'); ?>">
                                        <span class="shutter"></span>
                                    </div>

                                    <div class="destino-contenido">
                                        <h1>
                                            <?php _e('Más lugares', 'ukpartnerstheme'); ?>
                                        </h1>
                                    </div>
                                    
                                </article>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <article class="destino">
                                
                                <span class="tag-destacado">
                                
                                    <?php the_tags('', ' ' ); ?>
                                
                                </span>
                                <a href="<?php the_permalink(); ?>">
                                <div class="destino-imagen load-images-ajax">
                                    <?php 
                                    if ( has_post_thumbnail()) {
                                        echo '<img data-src=' . get_the_post_thumbnail() .'" alt="' . get_the_title() .'">';
                                    } else {
                                        echo '<img data-src=' . IMAGES_DIR .'default_destinos.png" alt="' . get_the_title() .'">';
                                    }
                                    ?>
                                    <span class="shutter"></span>
                                </div>
                                </a>
                                <div class="destino-contenido">
                                    <h1>
                                        <?php the_title(); ?>
                                    </h1>
                                    <p class="destino-resumen">
                                        <?php //the_excerpt(); ?>
                                    </p>
                                </div>
                                
                                
                            </article>
                        </li>
                    <?php }
                    
                    endwhile; ?>
                
                </ul>

            <?php endif; ?>
                
        </div>

    </div><!-- .wrap -->
</section>