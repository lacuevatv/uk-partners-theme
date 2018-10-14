<article id="post-<?php the_ID(); ?>" class="uk-front-page-wrapper">

    <header class="front-page-header">
        <?php the_title( '<h1 class="screen-reader-text">', '</h1>' ); ?>

        <ul id="header-inicio-slider" class="slider-wrapper owl-carousel">
            <?php 
            global $sliders_databd;
            foreach ($sliders_databd as $slider) { ?>
                
                <li class="slider-item">
                    <div class="slider-image">
                        <picture>
                            <source srcset="<?php echo $slider['image-mobile']; ?>" media="(max-width: 769px)">
                            <img src="<?php echo $slider['image']; ?>" alt="<?php echo $slider['titulo']; ?>">
                        </picture>
                        
                        <span class="shutter">
                    </div>
                    <div class="slider-contenido">
                        <div class="wrap">
                            <h3 class="slider-title">
                                <?php echo $slider['titulo']; ?>
                            </h3>
                            <p class="slider-text">
                                <?php echo $slider['texto']; ?>
                            </p>
    
                            <a href="<?php echo $slider['url']; ?>" target="<?php echo $slider['target']; ?>" class="slider-button btn btn-violeta">
                                <?php echo $slider['texto-boton']; ?>
                            </a>
                        </div><!-- .wrap -->
                    
                    </div>
                </li>

            <?php } ?>
            
        </ul>

    </header><!-- .entry-header -->


<!-- **********DESTINOS********* -->
    <section class="uk-destinos">
        <div class="wrap">
            <h2 class="title-section">
                <?php _e('Otros destinos', 'ukpartnerstheme'); ?>
            </h2>
            <p class="sub-line">
                <?php _e('Cada destino es una experiencia nueva. En cada lugar encontrarás mejores colegios donde estudiar inglés', 'ukpartnerstheme'); ?>
            </p>

            <div class="destinos-wrapper">
                <ul class="destinos-lista">
                    <?php 
                    global $destinos_databd;
                    foreach ($destinos_databd as $destino) { ?>
                        
                        <li>
                            <a href="<?php echo $destino['url']; ?>">
                                <article class="destino<?php if ($destino['destacado']) {echo ' destino-destacado'; } ?>">
                                    
                                    <span class="tag-destacado"><?php _e('Nuevo', 'ukpartnerstheme'); ?></span>
                                    <div class="destino-imagen load-images-ajax">
                                        <img data-src="<?php echo $destino['image']; ?>" alt="<?php echo $destino['titulo']; ?>">
                                        <span class="shutter"></span>
                                    </div>

                                    <div class="destino-contenido">
                                        <h1>
                                            <?php echo $destino['titulo']; ?>
                                        </h1>
                                        <p class="destino-resumen">
                                            <?php echo $destino['texto']; ?>
                                        </p>
                                    </div>
                                    
                                </article>
                            </a>
                        </li>

                    <?php } ?>
                    
                </ul>
            </div>

        </div><!-- .wrap -->
    </section>

<!-- **********ARMA VIAJE********* -->
    <section class="uk-arma-viaje">
        <div class="background-section-wrapper load-images-ajax">
            <picture>
                <source srcset="<?php echo IMAGES_DIR; ?>temp/viaje-mobile.jpg" media="(max-width: 769px)">
                <img data-src="<?php echo IMAGES_DIR; ?>temp/viaje.jpg" alt="<?php _e('Arma tu viaje', 'ukpartnerstheme'); ?>">
            </picture>
            <span class="shutter"></span>
        </div>

        <div class="section-content">

            <div class="wrap">
                <h2 class="title-section">
                    <?php _e('Arma tu viaje', 'ukpartnerstheme'); ?>
                </h2>
                <p class="sub-line">
                    <?php _e('Podés viajar solo en cualquier momento del año y por el tiempo que quieras y al destino que quieras', 'ukpartnerstheme'); ?>
                </p>

                <a href="#" class="btn btn-verde">
                    <?php _e('Más informacion', 'ukpartnerstheme'); ?>
                </a>

            </div><!-- .wrap -->
        </div><!-- .section-content -->
    </section>


<!-- **********CURSOS********* -->
    <section class="uk-cursos">

        <div class="section-content">
            <div class="wrap">
                <h2 class="title-section">
                    <?php _e('Nuestros cursos', 'ukpartnerstheme'); ?>
                </h2>
                <p class="sub-line">
                    <?php _e('Cada curso está orientado a una necesidad. En cada uno encontrarás el nivel y las características de como se desarrollan.', 'ukpartnerstheme'); ?>
                </p>

                <div class="cursos-wrapper">
                    <ul id="cursos-slider" class="cursos-lista owl-carousel">
                        <?php 
                        global $cursos_databd;
                        foreach ($cursos_databd as $curso) { ?>
                            
                            <li>
                                <a href="<?php echo $curso['url']; ?>">
                                    <article class="curso<?php if ($curso['destacado']) {echo ' curso-destacado'; } ?>">
                                        
                                        <span class="tag-destacado"><?php _e('Nuevo', 'ukpartnerstheme'); ?></span>
                                        <div class="curso-imagen">
                                            <img class="owl-lazy" data-src="<?php echo $curso['image']; ?>" alt="<?php echo $curso['titulo']; ?>">
                                            <span class="shutter"></span>
                                        </div>

                                        <div class="curso-contenido">
                                            <h1>
                                                <?php echo $curso['titulo']; ?>
                                            </h1>
                                            <p class="curso-resumen">
                                                <?php echo $curso['texto']; ?>
                                            </p>
                                        </div>
                                        
                                    </article>
                                </a>
                            </li>

                        <?php } ?>
                        
                    </ul>
                </div>

            </div><!-- .wrap -->
        </div><!-- .section-content -->
    
    </section>

<!-- **********ALOJAMIENTOS********* -->
    <section class="uk-alojamiento">
        <div class="background-section-wrapper load-images-ajax">
            <picture>
                <source srcset="<?php echo IMAGES_DIR ?>temp/alojamiento-mobile.jpg" media="(max-width: 769px)">
                <img data-src="<?php echo IMAGES_DIR; ?>temp/alojamiento.jpg" alt="<?php _e('Alojamiento', 'ukpartnerstheme'); ?>">
            </picture>
            <span class="shutter"></span>
        </div>

        <div class="section-content">
            <div class="wrap">
                <h2 class="title-section">
                    <?php _e('Alojamiento', 'ukpartnerstheme'); ?>
                </h2>
                <h5 class="subtitle-section">
                    <?php _e('Home is where the heart is', 'ukpartnerstheme'); ?>
                </h5>
                <p class="sub-line">
                    <?php _e('Elegí entre todas las opciones Residencias, Casa de familia, Campus, Hotel.', 'ukpartnerstheme'); ?>
                </p>

                <a href="#" class="btn btn-naranja">
                    <?php _e('Más informacion', 'ukpartnerstheme'); ?>
                </a>
            </div><!-- .wrap -->
        </div><!-- .section-content -->

    </section>

<!-- **********TESTIMONIOS********* -->
    <section class="uk-testimonios">

        <div class="section-content">
            <div class="wrap">
                <h2 class="title-section">
                    <?php _e('Testimonios', 'ukpartnerstheme'); ?>
                </h2>
                <p class="sub-line">
                    <?php _e('¡Nada mejor para que nos conozcas, que leer las propias experiencias de los que viajaron con nosotros!', 'ukpartnerstheme'); ?>
                </p>


                <ul id="testimonio-slider" class="testimonios-wrapper owl-carousel">
                    <?php 
                    global $testimonios_databd;
                    foreach ($testimonios_databd as $testimonio) { ?>
                        
                        <li class="testimonio-item">
                            <div class="testimonio-image">
                                <figure>
                                    <img class="owl-lazy" data-src="<?php echo $testimonio['image']; ?>" alt="<?php echo $testimonio['nombre']; ?>">
                                </figure>
                                <h3 class="testimonio-nombre">
                                    <?php echo $testimonio['nombre']; ?>
                                </h3>
                            </div>

                            <div class="testimonio-contenido">
                                <p class="slider-text">
                                    <?php echo $testimonio['texto']; ?>
                                </p>
                            </div>
                        </li>

                    <?php } ?>
                    
                </ul>

            </div><!-- .wrap -->
        </div><!-- .section-content -->

    </section>

<!-- **********FOOTER CONTACTO********* -->
    <footer class="front-page-footer">
        <div class="wrap row row-justify-between row-reverse-in-pc">

            <div class="wrapper-text">
                <h2 class="contact-title">
                    <?php _e('Contactanos', 'ukpartnerstheme'); ?>
                </h2>

                <div class="text">
                    <p>
                        <?php _e('En UKP nos preocupamos por satisfacer las necesidades particulares de cada viajero.', 'ukpartnerstheme'); ?>
                    </p>
                    <p>
                        <?php _e('Si no encontraste el programa o el destino que buscabas entre nuestras opciones, llená este formulario y nos comunicaremos con vos.', 'ukpartnerstheme'); ?>
                    </p>
                    <p>
                        <?php _e('¡Podemos visitar tu colegio o tener una entrevista personalizada!', 'ukpartnerstheme'); ?>
                    </p>
                </div>
            </div>
        
        <!-- ************ contact form 7 ********* --->
            <?php get_template_part( 'template-parts/page/content', 'contact-form' ); ?>

        </div><!-- .wrap -->

    </footer>

</article><!-- #post-## -->