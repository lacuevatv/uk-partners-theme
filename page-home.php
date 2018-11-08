<?php
/**
 * Template Name: Home Page
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 * @version 1.0
 */
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<script>
			var is_home = true;
		</script>
		<?php // Show the selected frontpage content.
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();
			$idHome= $post->ID
			?>

				<article id="post-<?php the_ID(); ?>" class="uk-front-page-wrapper">
					<header class="front-page-header">

						<?php
						/** 
						 * 1. slider
						*/
						$checkHomeSliders = get_post_meta( $idHome, '_uk_home_sliders', true );
						
						if ( $checkHomeSliders == '' || $checkHomeSliders == '0' || $checkHomeSliders == false ) : ?>
							
							<div class="wrap">
								<?php the_title( '<h1 class="entry-title front-page-title-header">', '</h1>' ); ?>
							</div>
						
						<?php else : 
							
							the_title( '<h1 class="screen-reader-text">', '</h1>' );
							get_template_part( 'template-parts/page/content', 'home-sliders' );
						
						endif; ?>
					</header><!-- .entry-header -->
				
				<?php

				/** 
				 * 2. programas
				*/
				global $metaProgramas;
				$metaProgramas = get_post_meta( $idHome, '_uk_meta_home_programas', true );

				if ( $metaProgramas &&  $metaProgramas[0] == 1 && $metaProgramas != '' && is_array($metaProgramas) & ! empty($metaProgramas) ) :
					
					get_template_part( 'template-parts/page/content', 'home-programas' );
				
				endif;

				/** 
				 * 3. destinos
				*/
				global $metaDestinos;
				$metaDestinos = get_post_meta( $idHome, '_uk_home_destinos', true );

				if ( $metaDestinos &&  $metaDestinos[0] == 1 && $metaDestinos != '' && is_array($metaDestinos) & ! empty($metaDestinos) ) :
					
					get_template_part( 'template-parts/page/content', 'home-destinos' );
				
				endif;

				
				/** 
				 * 4. separador
				*/
				global $separadorData;
				$separadorData = get_post_meta( $idHome, '_uk_home_separador', true );
				
				if ( $separadorData &&  $separadorData[0] == 1 && $separadorData != '' && is_array($separadorData) & ! empty($separadorData) ) :
					
					get_template_part( 'template-parts/page/content', 'home-separador' );
				
				endif;

				/** 
				 * 5. cursos
				*/
				global $metaCursos;
				$metaCursos = get_post_meta( $idHome, '_uk_home_cursos', true );
				
				if ( $metaCursos &&  $metaCursos[0] == 1 && $metaCursos != '' && is_array($metaCursos) & ! empty($metaCursos) ) :

					get_template_part( 'template-parts/page/content', 'home-cursos' );
				
				endif;

				

				/** 
				 * 6. alojamientos
				*/
				global $alojamientoData;
				$alojamientoData = get_post_meta( $idHome, '_uk_home_alojamientos', true );
				
				if ( $alojamientoData &&  $alojamientoData[0] == 1 && $alojamientoData != '' && is_array($alojamientoData) & ! empty($alojamientoData) ) :
				
					get_template_part( 'template-parts/page/content', 'home-alojamientos' );
				
				endif;

				
				/** 
				 * 7. testimonios
				*/
				global $metaTestimonios;
				$metaTestimonios = get_post_meta( $idHome, '_uk_home_testimonios', true );
				
				if ( $metaTestimonios &&  $metaTestimonios[0] == 1 && $metaTestimonios != '' && is_array($metaTestimonios) & ! empty($metaTestimonios) ) :
				
					get_template_part( 'template-parts/page/content', 'home-testimonios' );
				
				endif;
				

				/** 
				 * 8. contacto
				*/
				$metaContactFormCode = get_post_meta( $idHome, '_uk_home_contacto', true );
				
				if ( $metaContactFormCode &&  $metaContactFormCode[0] == 1 && $metaContactFormCode != '' && is_array($metaContactFormCode) & ! empty($metaContactFormCode) ) : ?>
				
				<!-- **********FOOTER CONTACTO********* -->
					<footer class="front-page-footer">
						<div class="wrap row row-justify-between row-reverse-in-pc">

							<div class="wrapper-text">
								<h2 class="contact-title">
									<?php esc_html_e($metaContactFormCode[1]); ?>
								</h2>

								<div class="text">
									<?php echo wpautop($metaContactFormCode[2]); ?>
								</div>
							</div>
						
						<!-- ************ contact form 7 ********* --->
							<?php 
							if ( $metaContactFormCode[3] != '' ) {
								echo do_shortcode( htmlspecialchars_decode($metaContactFormCode[3]) );
							}
								
							?>

						</div><!-- .wrap -->

					</footer>
				
				<?php endif;

			endwhile;
		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();