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

        <div class="post-thumbnail load-images-ajax">
            <?php 
            if ( has_post_thumbnail()) {
                echo '<img class="owl-lazy" data-src="' . get_the_post_thumbnail_url(null, 'medium') .'" alt="' . get_the_title() .'">';
            }
            ?>
        </div><!-- .post-thumbnail -->
			
        <div class="post-content">
		<?php the_title( '<h1 class="alojamiento-title">', '</h1>' ); ?>

            <div class="entry-content alojamiento-contenido">
                
                <?php the_content(); ?>

            </div><!-- .entry-content -->
        
        <span class="tag-destacado-alojamientos">
            <?php the_tags('', ' ' ); ?>
        </span>
          
        <?php
            echo uk_get_meta_info_resumen($post->ID);
        ?>   
        </div>
    </div><!--//.inner-wrapper-alojamiento-->
</article><!-- #post-## -->