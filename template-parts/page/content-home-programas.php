<?php
global $metaProgramas;
$postsIds = explode(',', $metaProgramas[4]);

?>

<!-- **********PROGRAMAS ********* -->
<section class="uk-programas">
    <div class="wrap">
        <h2 class="title-section">
            <?php esc_html_e($metaProgramas[1]); ?>
        </h2>

        <div class="programas-wrapper">

            <?php
            $programas = new WP_Query( 
                array(
                    'post_type'       => 'programas',
                    'order'           => 'desc',
                    'post__in' => $postsIds,
                    ) 
            );

			if ( $programas->have_posts() ) : ?>
            
                <ul class="programas-lista">

                    <?php 
                    while ( $programas->have_posts() ) : $programas->the_post(); ?>

                    
                        <li>
                            <article class="programa">

                                <a href="<?php the_permalink(); ?>">
                                    <div class="programa-imagen load-images-ajax">
                                        <?php 
                                        if ( has_post_thumbnail()) {
                                            echo '<img data-src="' . esc_url( get_the_post_thumbnail_url(null, 'full' ) ) .'" alt="' . get_the_title() .'">';
                                            
                                        } else {
                                            echo '<img data-src="' . IMAGES_DIR .'default_programas.png" alt="' . get_the_title() .'">';
                                        }
                                        ?>
                                        <span class="shutter"></span>
                                    </div>
                                    
                                    <div class="programa-contenido">
                                        <h1>
                                            <?php the_title(); ?>
                                        </h1>

                                        <p class="programas-resumen">
                                            <?php echo acortaTexto($post->post_excerpt, 10); ?>
                                        </p>

                                        <button type="button" class="btn btn-programa">
                                            <?php _e('Ver más', 'ukpartnerstheme'); ?>
                                        </button>
                                    </div>
                                </a>
                                
                            </article>
                        </li>
                    
                    <?php endwhile; ?>
                
                </ul>

                <?php if ($metaProgramas[2] == '1' ) : ?>
                    <a href="<?php echo esc_url($metaProgramas[3]); ?>" class="btn-programas btn-naranja">Ver más</a>
                <?php endif; ?>

            <?php endif; ?>
                
        </div>

    </div><!-- .wrap -->
</section>