<?php
/**
 * Template Name: Blog
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
if ( have_posts() ) : the_post(); ?>

<header class="entry-header page-header">
	<div class="header-image">
		<?php 
		if ( has_post_thumbnail()) {
			the_post_thumbnail(); 
		} else {
			echo '<picture>';
				echo '<source srcset="' . IMAGES_DIR . 'headermobile-default.jpg" media="(max-width: 769px)">';
				echo '<img src="' . IMAGES_DIR . 'header-default.jpg" alt="'. get_the_title() . ' - ' .get_bloginfo('name').'">';
			echo '</picture>';
		}
		?>
		<span class="shutter"></span>
	</div>
	
	<div class="wrap">
        <h1 class="entry-title page-title-header">
            <?php single_post_title(); ?>
        </h1>
	</div>
</header><!-- .entry-header -->

<div id="primary" class="content-area">
	<main id="main" class="site-main page-content-wrapper" role="main">
		<div class="wrap">
			
			<div class="main-content-editor">
            	<?php the_content(); ?>
			</div>

            <?php
            $posts = new WP_Query( array('post_type' => 'post') );
			if ( $posts->have_posts() ) : ?>

			<div class="content-posts-wrapper">

				<?php
				/* Start the Loop */
				while ( $posts->have_posts() ) : $posts->the_post();

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

<?php endif;
get_footer();