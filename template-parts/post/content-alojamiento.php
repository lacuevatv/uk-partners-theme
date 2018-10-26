<?php
/**
 * Template part for displaying posts types of category: ALOJAMIENTO
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 * @version 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="inner-wrapper-alojamiento row row-justify-between">

        <div class="post-thumbnail">
            
            <?php the_post_thumbnail( 'post-thumbnails' ); ?>
            
        </div><!-- .post-thumbnail -->
			
        <div class="post-content">
		<?php the_title( '<h1 class="alojamiento-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>

        <div class="entry-content alojamiento-contenido">
            
            <?php the_content(); ?>

        </div><!-- .entry-content -->
        
        <span class="tag-destacado-alojamientos">
            <?php the_terms( $post->ID, 'tagalojamientos', '', ' - ' ); ?>
            <script>jQuery('.tag-destacado-alojamientos a').click(function(e){e.preventDefault(); });</script>
        </span>
           
        <div class="meta-resumen-single-post-wrapper">
            <ul class="meta-resumen-list">
                <li>
                    1 semanas min
                </li>
                <li>
                    + 14 años
                </li>
                <li>
                    + habitación 2 o 4 personas
                </li>
            </ul>
        </div>

    </div><!--//.inner-wrapper-alojamiento-->
</article><!-- #post-## -->