<aside class="extra-single-wrapper">
    <div class="wrap">

<!-- tabs -->
        <h2 class="title-section">
            <?php _e('Cursos', 'ukpartnerstheme'); ?>
        </h2>

        <div class="tabs-wrapper">
            <ul class="tabs-lista">
                <?php
                global $cursos_databd;
                foreach ($cursos_databd as $curso) { ?>
                <li>
                    <article class="tab">
                        <h1 class="title-tab">
                            <?php echo $curso['titulo']; ?>
                        </h1>
                        <div class="contenido-tab">
                            <p>
                                <?php echo $curso['texto']; ?>
                            </p>
                            <a href="<?php echo $curso['url']; ?>" class="btn btn-borde">
                                <?php _e('Leer más', 'ukpartnerstheme'); ?>
                            </a>
                        </div>
                    </article>
                </li>
                <?php } ?>
            </ul>
        </div>

<!-- carousel -->
        <h2 class="title-section">
            <?php _e('Donde estudiar', 'ukpartnerstheme'); ?>
        </h2>

        <div class="carousel-wrapper">
            <ul class="carousel-lista owl-carousel">
                <?php 
                global $destinos_databd;
                foreach ($destinos_databd as $destino) { ?>
                    
                    <li>
                        <a href="<?php echo $destino['url']; ?>">
                            <article class="item<?php if ($destino['destacado']) {echo ' item-destacado'; } ?>">
                                
                                <span class="tag-destacado"><?php _e('Nuevo', 'ukpartnerstheme'); ?></span>
                                <div class="item-imagen load-images-ajax">
                                    <img data-src="<?php echo $destino['image']; ?>" alt="<?php echo $destino['titulo']; ?>">
                                    <span class="shutter"></span>
                                </div>

                                <div class="item-contenido">
                                    <h1>
                                        <?php echo $destino['titulo']; ?>
                                    </h1>
                                    <p class="item-resumen">
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
</aside>