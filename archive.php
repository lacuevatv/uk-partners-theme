<?php
/**
 * The template for displaying categoriy pages
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
			<?php
			//si es categoria muestra el titulo de la categoria
				if (is_category() ) {
					single_cat_title();
				} elseif ( get_post_type() ) {
					echo get_post_type();
				} else {
					bloginfo('name');
				} 
			?>
		</h1>
	</div>
</header><!-- .entry-header -->

<div id="primary" class="content-area">
	<main id="main" class="site-main category-wrapper" role="main">
		<div class="wrap">
			
			<?php
			if ( have_posts() ) : ?>

			<div class="content-posts-wrapper">

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					* Include the Post-Format-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Format name) and that will be used instead.
					*/
					get_template_part( 'template-parts/post/content', get_post_format() );

				endwhile;

				the_posts_pagination( array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Página anterior', 'ukpartnerstheme' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . __( 'Página siguiente', 'ukpartnerstheme' ) . '</span>',
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Página', 'ukpartnerstheme' ) . ' </span>',
				) ); ?>

			</div><!-- .content-posts-wrapper -->

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