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
			while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" class="uk-front-page-wrapper">
					<header class="front-page-header">

						<?php
						/** 
						 * 1. slider
						*/
						$checkHomeSliders = get_post_meta( $post->ID, '_uk_home_sliders', true );
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
				$metaDestinos = get_post_meta( $post->ID, '_uk_home_destinos', true );
				var_dump($metaDestinos);

				if ( $metaDestinos != null & $metaDestinos != '' && is_array($metaDestinos) & ! empty($metaDestinos) ) :
					echo 'aca iría destinos';
				else : 
					echo 'destinos esta desactivado';
				endif;

				echo '<div><br></div>';
				/** 
				 * 3. separador
				*/
				$separadorData = get_post_meta( $post->ID, '_uk_home_separador', true );
				var_dump($separadorData);

				echo '<div><br></div>';

				/** 
				 * 4. cursos
				*/
				$metaDestinos = get_post_meta( $post->ID, '_uk_home_cursos', true );
				var_dump($metaDestinos);

				echo '<div><br></div>';

				/** 
				 * 5. alojamientos
				*/
				$alojamientoData = get_post_meta( $post->ID, '_uk_home_alojamientos', true );
				var_dump($alojamientoData);

				echo '<div><br></div>';
				/** 
				 * 6. testimonios
				*/
				$metaTestimonios = get_post_meta( $post->ID, '_uk_home_testimonios', true );
				var_dump($metaTestimonios);
				echo '<div><br></div>';
				/** 
				 * 7. contacto
				*/
				$metaContactFormCode = get_post_meta( $post->ID, '_uk_home_contacto', true );
				var_dump($metaContactFormCode);

			endwhile;
		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();