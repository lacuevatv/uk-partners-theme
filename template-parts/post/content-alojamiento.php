<?php
/**
 * Template part for displaying posts of especial category: ALOJAMIENTO
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
    <div class="inner-wrapper-alojamiento row row-justify-between">
        <script>
            //QUITAR ESTO QUE LO PUSE SOLO PARA MOSTRAR UNO DESTACADO
            jQuery('#post-80').addClass('destacado');

        </script>

        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'post-thumbnails' ); ?>
            </a>
        </div><!-- .post-thumbnail -->
			
        <div class="post-content">
		<?php
	
			the_title( '<h1 class="alojamiento-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		
		?>


        <div class="entry-content alojamiento-contenido">
            
            <?php the_content(); ?>

        </div><!-- .entry-content -->
        
        <span class="tag-destacado-alojamientos">
            <?php _e('Destacado', 'ukpartnerstheme' ); ?>
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