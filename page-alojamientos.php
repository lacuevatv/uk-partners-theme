<?php
/**
 * Template Name: Listado Alojamientos
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 * @version 1.0
 */

get_header();

if ( have_posts() ) :  the_post() ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <header class="entry-header page-header">
				<div class="header-image">
					<?php 
					if ( has_post_thumbnail()) {
						the_post_thumbnail(); 
						echo '<span class="shutter"></span>';
					} else {
                        
                        echo '<picture>';
                            echo '<source srcset="' . IMAGES_DIR . 'headermobile-default.jpg" media="(max-width: 769px)">';
                            echo '<img src="' . IMAGES_DIR . 'header-default.jpg" alt="'. get_the_title() . ' - ' .get_bloginfo('name').'">';
                        echo '</picture>';
                        echo '<span class="shutter"></span>';
                    }
					?>  
				</div>
				
				<div class="wrap">
					<?php the_title( '<h1 class="entry-title page-title-header">', '</h1>' ); ?>
				</div>
				
            </header><!-- .entry-header -->

            <div class="category-alojamientos-wrapper">
                <div class="wrap row row-justify-between">
                    <div class="content-posts-wrapper-alojamiento">
                    
                        <!-- contenido simulado -->
                        <div class="uk-content">
                        
                            <?php the_content(); ?>

                        </div>
                        
                        <div class="content-posts-alojamiento">
                        <?php

                        $listaCategorias = get_terms(array(
                            'taxonomy' => 'catalojamientos',
                            'hide_empty' => false,
                        ));

                        //ahora se hace un query por cada categoria en especial:
                        foreach ($listaCategorias as $categoria) {

                        $alojamientos = new WP_Query( array(
                                'post_type' => 'alojamientos',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'catalojamientos',
                                        //'field'    => 'category_name',
                                        'terms'    => $categoria->term_id,
                                        ),
                                    ),
                                )
                            );

                        if ( $alojamientos->have_posts() ) : ?>
                        
                        <?php 

                        echo '<h2 class="title-category-alojamiento">' . $categoria->name . '</h2>';

                            while ( $alojamientos->have_posts() ) : $alojamientos->the_post();
                                $nombre = get_the_title();
                                $parrafo = get_the_content();

                                get_template_part( 'template-parts/post/content', 'alojamiento' );

                            endwhile;
                            
                            /*the_posts_pagination( array(
                                'prev_text' => '<span class="screen-reader-text">' . __( 'Anterior', 'ukpartnerstheme' ) . '</span>',
                                'next_text' => '<span class="screen-reader-text">' . __( 'Siguiente', 'ukpartnerstheme' ) . '</span>',
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Página', 'ukpartnerstheme' ) . ' </span>',
                            ) );*/

                        wp_reset_postdata();
                        endif;

                        }//foreach de categorias
                        ?>

                        </div><!-- //.content-posts-alojamiento -->

                    </div><!-- //.content-posts-wrapper-alojamiento -->

                    <aside id="contact-sidebar" class="contact-sidebar widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Formulario Contacto', 'ukpartnerstheme' ); ?>">
                        <button class="btn btn-turqueza toggle-buton-single-contact">
                            <?php _e( 'Solicitar información', 'ukpartnerstheme' ); ?>
                        </button>
                        <div class="wrapper-contact-form">
                            <?php dynamic_sidebar( 'contact-sidebar' ); ?>
                        </div>
                        <script>
                            var is_alojamientos = true;
                        </script>
                    </aside><!-- #single-sidebar -->

                </div><!-- //.wrap .row -->
            </div>
				
		</div><!-- #post-## -->
    </main>
</div><!-- #primary-## -->

<?php endif;
get_footer();