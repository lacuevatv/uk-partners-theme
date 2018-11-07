<ul id="header-inicio-slider" class="slider-wrapper owl-carousel">
    <?php 
    
    $sliders = new WP_Query( array('post_type' => 'sliders') );
    if ( $sliders->have_posts() ) : 

        /* Start the Loop */
        while ( $sliders->have_posts() ) : $sliders->the_post();
        
            $id = get_the_ID();
            $titulo = get_the_title();
            $texto = get_the_content();

            $metaSliders = get_post_meta( $id, '_uk_sliders', true );
            $url = isset($metaSliders[0]) ? $metaSliders[0] : '#';
            $texto_boton = isset($metaSliders[1]) ? $metaSliders[1] : 'Más Información';
            $target = isset($metaSliders[2]) ? $metaSliders[2] : '0';
            $imagen = isset($metaSliders[3]) ? $metaSliders[3] : '';
            $imagen_movil = isset($metaSliders[4]) ? $metaSliders[4] : '$imagen';

            if ( $imagen == '' ) {
                $imagen = IMAGES_DIR . 'header-default.jpg';
            }
            if ( $imagen_movil == '' ) {
                if ( $imagen != '' ) {
                    $imagen_movil = $imagen;
                } else {
                    $imagen_movil = IMAGES_DIR . 'headermobile-default.jpg';
                }   
            }
            ?>

            <li class="slider-item">
                <div class="slider-image">
                    <picture>
                        <source srcset="<?php echo $imagen_movil; ?>" media="(max-width: 769px)">
                        <img src="<?php echo $imagen; ?>" alt="<?php echo $titulo; ?>">
                    </picture>
                    <span class="shutter">
                </div>
                <div class="slider-contenido">
                    <div class="wrap">
                        <h3 class="slider-title">
                            <?php echo $titulo; ?>
                        </h3>
                        <p class="slider-text">
                            <?php echo $texto; ?>
                        </p>

                        <a href="<?php echo $url; ?>"<?php if ($target == 1) { echo ' target="_blank"'; }; ?> class="slider-button btn btn-violeta">
                            <?php echo $texto_boton; ?>
                        </a>
                    </div><!-- .wrap -->
                
                </div>
            </li>

        <?php endwhile;
    
    endif; ?>
        
</ul>