<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 * @version 1.0
 */
$post_type = get_post_type( $post->ID );
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main post" role="main">
		
		<?php
		/* Start the post */
		while ( have_posts() ) : the_post(); ?>
	
			<header class="entry-header page-header">
				<?php if ( is_single() ) : ?>
					
					<div class="header-image">
						<?php 
						if ( has_post_thumbnail()) {
							the_post_thumbnail('full'); 
						} else {
							echo '<picture>';
								echo '<source srcset="' . IMAGES_DIR . 'headermobile-default.jpg" media="(max-width: 769px)">';
								echo '<img src="' . IMAGES_DIR . 'header-default.jpg" alt="'. get_the_title() . ' - ' .get_bloginfo('name').'">';
							echo '</picture>';
						}
						?>
						<span class="shutter"></span>
					</div><!-- .header-image -->

					<div class="wrap">
						<?php the_title( '<h1 class="entry-title page-title-header">', '</h1>' ); ?>
					</div>
				
				<?php else: 

					the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
				
				endif; ?>

			</header><!-- .entry-header -->

			<div class="wrap row row-justify-between">

				<div class="wrapper-single-post-w-sidebar">

					
					<?php 

					if ( $post_type != 'post' ) {
						echo uk_get_meta_info_resumen($post->ID);
					}
					
					get_template_part( 'template-parts/post/content', 'single-post' );

					// If comments are open or we have at least one comment, load up the comment template.
					/*if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;*/

					/*the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Anterior', 'ukpartnerstheme' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Anterior', 'ukpartnerstheme' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Siguiente', 'ukpartnerstheme' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Siguiente', 'ukpartnerstheme' ) . '</span>',
					) );*/

					?>

				</div><!-- //.wrapper-single-post-w-sidebar-->
	
				
				<?php if ($post_type != 'post' ) : ?>

					<aside id="contact-sidebar" class="contact-sidebar widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Formulario Contacto', 'ukpartnerstheme' ); ?>">
						
						<button class="btn btn-turqueza toggle-buton-single-contact">
							<?php _e( 'Solicitar información', 'ukpartnerstheme' ); ?>
						</button>
						<div class="wrapper-contact-form">
							<?php dynamic_sidebar( 'contact-sidebar' ); ?>
						</div>

					</aside><!-- #single-sidebar -->

				<?php else : ?>
				<?php get_sidebar(); ?>
				<?php endif; ?>

				
			</div><!-- //.wrap -->

			<aside class="extra-single-wrapper">
    			<div class="wrap">
					<?php 
					/*
						* INFO AUXILIAR DEL POST
						* donde estudiar, etc
						* carousel
					*/
					if ( $post_type == 'programas' ) {
						echo uk_get_meta_cursos($post->ID);
						echo uk_get_meta_galeria($post->ID);
					}
					if ( $post_type == 'destinos' ) {
						echo uk_get_meta_cursos($post->ID);
						echo uk_get_meta_galeria($post->ID);
					}
					if ( $post_type == 'cursos' ) {
						echo uk_get_meta_destinos($post->ID);
					}
					?>
				</div><!-- .wrap -->

				<div id="galeria-fotos-wrapper">
					<div class="inner-wrapper">
						<div class="contenido-galeria">
							<button class="btn-close-galeria"></button>
							<div id="contenedor-owl"></div>
						</div>
					</div>
				</div>
			</aside>

		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
