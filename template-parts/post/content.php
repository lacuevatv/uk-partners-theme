<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<span class="tag-destacado">
		<?php _e('100% Off', 'ukpartnerstheme' ); ?>
	</span>
	<script>

		//QUITAR ESTO QUE LO PUSE SOLO PARA MOSTRAR UNO DESTACADO
		jQuery('#post-14').addClass('destacado');

	</script>
	<header class="entry-header">
		<?php if ( ! is_single() ) : ?>
			
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'post-thumbnails' ); ?>
				</a>
			</div><!-- .post-thumbnail -->
			
		<?php endif; ?>

		<?php
		if ( 'post' === get_post_type() ) {
			echo '<div class="entry-meta">';
				if ( is_single() ) {
					uk_partners_theme_posted_on();
				} else {
					uk_partners_theme_time_link();
					//uk_partners_theme_edit_link();
				};
			echo '</div><!-- .entry-meta -->';
		};

		if ( is_single() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} elseif ( is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		} else {
			the_title( '<div class="wrapper-title"><h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2></div>' );
		}
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		/* translators: %s: Name of current post */
		the_excerpt();
		?>
		<a class="btn btn-leer-mas btn-turqueza" href="<?php the_permalink(); ?>">
			Leer más
		</a>

		<?php
		wp_link_pages( array(
			'before'      => '<div class="page-links">' . __( 'Páginas:', 'ukpartnerstheme' ),
			'after'       => '</div>',
			'link_before' => '<span class="page-number">',
			'link_after'  => '</span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php
	if ( is_single() ) {
		uk_partners_theme_entry_footer();
	}
	?>
	

</article><!-- #post-## -->