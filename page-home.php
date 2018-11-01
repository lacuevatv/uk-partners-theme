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
							get_template_part( 'template-parts/page/content', 'sliders' );
						
						endif; ?>
					</header><!-- .entry-header -->
				
				<?php


				/** 
				 * 2. destinos
				*/
				global $metaDestinos;
				$metaDestinos = get_post_meta( $idHome, '_uk_home_destinos', true );

				if ( $metaDestinos &&  $metaDestinos[0] == 1 && $metaDestinos != '' && is_array($metaDestinos) & ! empty($metaDestinos) ) :
					
					get_template_part( 'template-parts/page/content', 'destinos' );
				
				endif;

				
				/** 
				 * 3. separador
				*/
				$separadorData = get_post_meta( $idHome, '_uk_home_separador', true );
				
				if ( $separadorData &&  $separadorData[0] == 1 && $separadorData != '' && is_array($separadorData) & ! empty($separadorData) ) :
					
					var_dump($separadorData);
				
				endif;

				

				/** 
				 * 4. cursos
				*/
				$metaCursos = get_post_meta( $idHome, '_uk_home_cursos', true );
				
				if ( $metaCursos &&  $metaCursos[0] == 1 && $metaCursos != '' && is_array($metaCursos) & ! empty($metaCursos) ) :

					var_dump($metaCursos);
				
				endif;

				

				/** 
				 * 5. alojamientos
				*/
				$alojamientoData = get_post_meta( $idHome, '_uk_home_alojamientos', true );
				
				if ( $alojamientoData &&  $alojamientoData[0] == 1 && $alojamientoData != '' && is_array($alojamientoData) & ! empty($alojamientoData) ) :
				
					var_dump($alojamientoData);
				
				endif;

				
				/** 
				 * 6. testimonios
				*/
				$metaTestimonios = get_post_meta( $idHome, '_uk_home_testimonios', true );
				
				if ( $metaTestimonios &&  $metaTestimonios[0] == 1 && $metaTestimonios != '' && is_array($metaTestimonios) & ! empty($metaTestimonios) ) :
				
					var_dump($metaTestimonios);
				
				endif;
				

				/** 
				 * 7. contacto
				*/
				$metaContactFormCode = get_post_meta( $idHome, '_uk_home_contacto', true );
				
				if ( $metaContactFormCode &&  $metaContactFormCode[0] == 1 && $metaContactFormCode != '' && is_array($metaContactFormCode) & ! empty($metaContactFormCode) ) :
				
					var_dump($metaContactFormCode);
				
				endif;

			endwhile;
		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();