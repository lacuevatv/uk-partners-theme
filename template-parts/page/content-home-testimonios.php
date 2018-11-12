<?php
global $metaTestimonios;
?>

<!-- **********TESTIMONIOS********* -->
<section class="uk-testimonios">

<div class="section-content">
    <div class="wrap">
        <h2 class="title-section">
            <?php esc_html_e($metaTestimonios[2]); ?>
        </h2>
        <p class="sub-line">
            <?php esc_html_e($metaTestimonios[3]); ?>
        </p>

        <?php
        $testimonios = new WP_Query( 
            array(
                'post_type'      => 'testimonios',
                'posts_per_page' => $metaTestimonios[1],
                'order'          => 'desc',
                ) 
            );

        if ( $testimonios->have_posts() ) : ?>

            <ul id="testimonio-slider" class="testimonios-wrapper owl-carousel">
                <?php while ( $testimonios->have_posts() ) : $testimonios->the_post(); ?>

                    <li class="testimonio-item">

                        <div class="testimonio-contenido">
                            <div class="slider-text">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="testimonio-nombre">
                            <h3>
                                <?php the_title(); ?>
                            </h3>
                            <p>
                                (<?php echo uk_partners_theme_testimonio_date();  //the_date(); ?>)
                            </p>
                        </div>
                    </li>

                <?php endwhile; ?>
        
            </ul>
        
        <?php endif; ?>        

    </div><!-- .wrap -->
</div><!-- .section-content -->

</section>