<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main default-page-wrapper" role="main">
	
	<?php get_template_part( 'template-parts/content', 'none' ); ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();