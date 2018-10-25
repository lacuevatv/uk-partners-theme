<?php
/**
 * Manage post type and taxonomies.
 *
 * @package     Minimal theme
 * @author      lacueva.tv <info@lacueva.tv>
 * @license     GPL-2.0+
 * @link        http://lacueva.tv/
 * @copyright   2016 LaCueva.tv
 * @since       1.1
 */
 // If this file is called directly, abort.
 if ( ! defined( 'WPINC' ) ) {
 	die;
 }
//register post type
if ( !function_exists( 'minimal_create_post_type' ) ) :
function minimal_create_post_type () {
  register_post_type ( 'tarifas', array (
      //etiquetas de texto utilizadas por el post type
      'labels'       => array(
          'name'          => __( 'tarifas', '_minimal' ),
          'singular_name' => __( 'tarifa', '_minimal' ),
      ),
      'supports'      => array (
            'title', 'editor', 'excerpt', 'thumbnail'
          ),
      'public'      => true,
      'has_archive' => false,
      'menu_icon'   => 'dashicons-admin-post'
    )
  );
}
add_action( 'init', 'minimal_create_post_type' );
endif; //if function exixts
 /**
  * Reseteamos las reglas de permalinks para asegurarnos de que
  * los links a nuestro post type funcionen.
  *
  */
if ( ! function_exists( 'lqva_flush_rewrite_rules' ) ) :
add_action( 'init', 'lqva_flush_rewrite_rules', 90 );
/**
 * Reset rewrite rules for reentrly added post type and taxonomies.
 *
 * @since 1.0
 */
function lqva_flush_rewrite_rules() {
	if ( ! get_option( 'lqva_flushed_rewrite_rules' ) ) {
		flush_rewrite_rules();
		add_option( 'lqva_flushed_rewrite_rules', true );
	}
}
endif;