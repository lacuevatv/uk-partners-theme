<?php 
global $metaCursos;
?>
<!-- **********CURSOS********* -->
<section class="uk-cursos">

    <div class="section-content">
        <div class="wrap">
            <h2 class="title-section">
                <?php esc_html_e($metaCursos[2]); ?>
            </h2>
            <p class="sub-line">
                <?php esc_html_e($metaCursos[5]); ?>
            </p>

            <div class="cursos-wrapper">
                <?php
                $cursos = new WP_Query( 
                    array(
                        'post_type'      => 'cursos',
                        'posts_per_page' => $metaCursos[1],
                        'order'          => 'desc',
                        ) 
                );

                if ( $cursos->have_posts() ) : ?>

                    <ul id="cursos-slider" class="cursos-lista owl-carousel">

                        <?php 
                        while ( $cursos->have_posts() ) : $cursos->the_post(); ?>

                            <li>
                                <article class="curso">
                                    <span class="tag-destacado">
                                        <?php the_tags('', ' ' ); ?>
                                    </span>
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="curso-imagen">
                                            <?php 
                                            if ( has_post_thumbnail()) {
                                                echo '<img class="owl-lazy" data-src="' . get_the_post_thumbnail_url(null, array(550,768)) .'" alt="' . get_the_title() .'">';
                                            } else {
                                                echo '<img class="owl-lazy" data-src="' . IMAGES_DIR .'default_destinos.png" alt="' . get_the_title() .'">';
                                            }
                                            ?>
                                            <span class="shutter"></span>
                                        </div>

                                        <div class="curso-contenido">
                                            <h1>
                                                <?php the_title(); ?>
                                            </h1>
                                            <p class="curso-resumen">
                                                <?php echo acortaTexto($post->post_excerpt, 10); ?>
                                            </p>
                                        </div>
                                    </a>        
                                </article>
                            </li>

                        <?php endwhile; ?>
                        
                    </ul>
                <?php endif; ?>
            </div>
            <?php 
            if ($metaCursos[3] == '1') : 
            ?>
                <a class="btn btn-mas-cursos btn-violeta" href="<?php echo esc_url($metaCursos[4]); ?>">
                    Ver más
                </a>
            <?php endif; ?>
        </div><!-- .wrap -->
    </div><!-- .section-content -->

</section>