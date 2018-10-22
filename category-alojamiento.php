<?php
/**
 * The template for displaying categoriy alojamiento pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<header class="entry-header page-header">
	<div class="header-image">
		<picture>
			<source srcset="<?php echo IMAGES_DIR ?>headermobile-default.jpg" media="(max-width: 769px)">
			<img src="<?php echo IMAGES_DIR; ?>header-default.jpg" alt="<?php single_cat_title(); ?>">
		</picture>
		
		<span class="shutter"></span>
	</div>
	
	<div class="wrap">
		<h1 class="entry-title page-title-header">
			<?php single_cat_title(); ?>
		</h1>
	</div>
</header><!-- .entry-header -->


<div id="primary" class="content-area">
	<main id="main" class="site-main category-alojamientos-wrapper" role="main">
		<div class="wrap row row-justify-between">

            <div class="content-posts-wrapper-alojamiento">
                
                <!-- contenido simulado -->
                <div class="uk-content">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>

                <?php
                if ( have_posts() ) : ?>

                <div class="content-posts-alojamiento">

                    <?php
                    $subcategoria = '';
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
                        
                        $subcat = ( get_the_category( get_the_ID() ) );
                        foreach ($subcat as $cat) {
                            if ( $cat->slug != 'alojamiento' && $subcategoria != $cat->cat_name ) {
                                $subcategoria = $cat->cat_name;
                                
                                echo '<h2 class="title-category-alojamiento">' . $subcategoria . '</h2>';
                            }
                        }
                        
                        /*
                        * Include the Post-Format-specific template for the content.
                        * If you want to override this in a child theme, then include a file
                        * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                        */
                        get_template_part( 'template-parts/post/content', 'alojamiento' );

                    endwhile;

                    the_posts_pagination( array(
                        'prev_text' => '<span class="screen-reader-text">' . __( 'Página anterior', 'ukpartnerstheme' ) . '</span>',
                        'next_text' => '<span class="screen-reader-text">' . __( 'Página siguiente', 'ukpartnerstheme' ) . '</span>',
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Página', 'ukpartnerstheme' ) . ' </span>',
                    ) ); ?>

                </div><!-- .content-posts-wrapper-alojamiento -->

            </div><!-- .wrapper-single-post-w-sidebar -->

            <aside id="contact-sidebar" class="contact-sidebar widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Formulario Contacto', 'ukpartnerstheme' ); ?>">
                <button class="btn btn-turqueza toggle-buton-single-contact">
                    <?php _e( 'Solicitar información', 'ukpartnerstheme' ); ?>
                </button>
                <div class="wrapper-contact-form">
                    <?php dynamic_sidebar( 'contact-sidebar' ); ?>
                </div>
            </aside><!-- #single-sidebar -->

			<?php

			else : ?>
			
			<div class="default-page-wrapper">

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			</div><!--//.default-page-wrapper -->

			<?php endif; ?>

			
		</div><!-- .wrap -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();