<?php
/**
 * AJAX file
 *
 * @link https://codex.wordpress.org/AJAX_in_Plugins
 *
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 * @version 1.0
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
 
if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) :

    add_action( 'wp_ajax_get_data_galeria', 'get_data_galeria_cb' );
    add_action( 'wp_ajax_nopriv_get_data_galeria', 'get_data_galeria_cb' );

    if ( ! function_exists( 'get_data_galeria_cb' ) ) :

        function get_data_galeria_cb() {
            
            $respuesta = null;
            $arraysId = isset($_POST['ids']) ? $_POST['ids'] : array();
            $mainID = isset($_POST['mainId']) ? $_POST['mainId'] : '';

            if ( ! empty($arraysId ) && $mainID != ''  ) {

                $respuesta = array();
                foreach ( $arraysId as $id ) {
                    if ( $id != '' ) {
                        $respuesta['id'] = $id;
                        $respuesta['url'] = $urlImagen = wp_get_attachment_image_src($id, 'full');

                        if ( $id == $mainID ) {
                            $respuesta['active'] = true;
                        } else {
                            $respuesta['active'] = false;
                        }
                    }
                }

            }
            
            if ( $respuesta == null ) {
                echo '0';
            } else {
                echo json_encode($respuesta);
            }
            wp_die();
        }

    endif;
    

endif; //doing ajax