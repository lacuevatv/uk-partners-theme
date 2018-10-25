<?php
/**
 * Manage shortcode tarifas
 *
 * @package     Minimal Theme
 * @author      LaCueva.tv
 * @license     GPL-2.0+
 * @link        http://www.lacueva.tv/
 * @copyright   2016 LaCueva
 * @since       1.1
 */
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
add_shortcode( 'tarifas', 'tarifas_shortcode_func' );
function tarifas_shortcode_func ( $atts ) {
  if ( ( $content = get_transient( 'tarifas_shortcode_tarifas' ) ) ) {
    $content = get_transient( 'tarifas_shortcode_tarifas' );
  } else {
  	// The Query
  	$tarifas_query = new WP_Query( array(
  			'post_type' => 'tarifas',
        'orderby'   => 'meta_value_num',
        'posts_per_page' => 6
  		)
  	);
  	ob_start();
  	// The Loop
    	if ( $tarifas_query->have_posts() ) :
					echo '<ul class="tarifas-items">';
    		while ( $tarifas_query->have_posts() ) : $tarifas_query->the_post();
							$tarifaPrecio = get_post_meta( get_the_ID(), '_tarifa_data', true );
								echo '<li class="tarifa-item"><article class="tarifa">';
                echo the_title( '<header><h1 class="titulo-tarifa"><a href="' . get_the_permalink() . '">', '</a></h1>' );
								echo '<a href="' . get_the_permalink() . '" class="btn-detalles-tarifa">', 'Ver detalles</a></header>';
                echo '<div class="contenido-tarifa">';
								echo the_content();
								echo '</div><div class="tarifa-precio">' . $tarifaPrecio . '</div>';
								echo '<figure class="tarifa-imagen"><a href="' . get_permalink() . '">';
								echo the_post_thumbnail('full', array( 'class' => 'entri-img') );
								echo '</a></figure>';
								echo '<a href="#" class="tarifa-btn">contacto</a>';
								echo '</article></li>';
    	  endwhile;
					echo '</ul>';
        wp_reset_postdata();
    	else :
    		echo esc_html__( 'No hay ninguna tarifa cargada', '_minimal' );
    	endif;
  	$content = ob_get_clean();
  	set_transient( 'tarifas_shortcode_tarifas',  $content, ( 60 * 60 * 24 * 7 ) );
  }
  return $content;
}//tarifas shortcode
if ( ! function_exists( 'tarifas_delete_shortcode_transients' ) ) :
add_action( 'save_post', 'tarifas_delete_shortcode_transients' );
/**
 * Delete shortcode transients.
 *
 * @since 1.1
 */
function tarifas_delete_shortcode_transients() {
		delete_transient( 'tarifas_shortcode_tarifas' );
}
endif;