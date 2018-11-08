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
$post_type = get_post_type();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<span class="tag-destacado">
		<?php the_tags('', ' ' ); ?>
	</span>
	
	

	<header class="entry-header">
		<?php if ( ! is_single() ) : ?>
			
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>" class="load-images-ajax">
					<?php 
					if ( has_post_thumbnail()) {
						echo '<img class="owl-lazy" data-src="' . get_the_post_thumbnail_url(null, 'medium') .'" alt="' . get_the_title() .'">';
					}
					?>
				</a>
			</div><!-- .post-thumbnail -->
			
		<?php endif; ?>

		<?php
		
		if ( ! is_single() ) {
			the_title( '<div class="wrapper-title"><h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2></div>' );
		} elseif (  is_front_page() && is_home() ) {
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		}
		?>
	</header><!-- .entry-header -->


	<div class="entry-content<?php if ( is_single() ) { echo ' entry-content-single'; } ?>">
		<?php
		if ( ! is_single() ) { ?>
			
			<p>
				<?php echo acortaTexto($post->post_excerpt, 10); ?>
			</p>
			<a class="btn btn-leer-mas <?php if ($post_type == 'cursos') { echo 'btn-verde'; } elseif($post_type == 'programas') {echo 'btn-violeta';} else {echo 'btn-turqueza';};?>" href="<?php esc_url( the_permalink() ); ?>">
				Leer más
			</a>

		<?php } ?>
	</div><!-- .entry-content -->

	<?php
	if ( is_single() ) {
		uk_partners_theme_entry_footer();
	}
	?>
	
</article><!-- #post-## -->