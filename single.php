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

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main post" role="main">
		
		<?php
		/* Start the post */
		while ( have_posts() ) : the_post(); ?>
	
			<header class="entry-header page-header">
				<?php if ( is_single() ) : ?>
					
					<div class="header-image">
						<?php the_post_thumbnail( 'post-thumbnails' ); ?>
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

					$post_type = get_post_type( $post->ID );
					if ( $post_type != 'post' ) {
						echo uk_get_meta_info_resumen($post->ID);
					}
					
					get_template_part( 'template-parts/post/content', 'single-post' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

					/*the_post_navigation( array(
						'prev_text' => '<span class="screen-reader-text">' . __( 'Anterior', 'ukpartnerstheme' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Anterior', 'ukpartnerstheme' ) . '</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Siguiente', 'ukpartnerstheme' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Siguiente', 'ukpartnerstheme' ) . '</span>',
					) );*/

					?>

				</div><!-- //.wrapper-single-post-w-sidebar-->

				<aside id="contact-sidebar" class="contact-sidebar widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Formulario Contacto', 'ukpartnerstheme' ); ?>">
					<button class="btn btn-turqueza toggle-buton-single-contact">
						<?php _e( 'Solicitar información', 'ukpartnerstheme' ); ?>
					</button>
					<div class="wrapper-contact-form">
						<?php dynamic_sidebar( 'contact-sidebar' ); ?>
					</div>
				</aside><!-- #single-sidebar -->
				
			</div><!-- //.wrap -->

			<?php 
			/*
				* INFO AUXILIAR DEL POST
				* donde estudiar, etc
				* carousel
			*/
	
			get_template_part( 'template-parts/post/content', 'single-extra' );	

		endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();