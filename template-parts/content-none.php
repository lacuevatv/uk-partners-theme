<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 * @version 1.0
 */

?>

<section class="no-results not-found">
	
		<h1 class="page-title-404"><?php _e( 'No hemos encontrado nada', 'ukpartnerstheme' ); ?></h1>
	</header>
	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( '¿Estás listo para publicar tu primer post? <a href="%1$s">Hace click aquí</a>.', 'ukpartnerstheme' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php else : ?>

			<p class="p-404"><?php _e( 'Parece que no se ha podido encontrar lo que estabas buscando.', 'ukpartnerstheme' ); ?></p>
            
        <?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
