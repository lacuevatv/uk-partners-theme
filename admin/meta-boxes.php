<?php
/**
 * META BOXES
 *
 * @link https://developer.wordpress.org/plugins/metadata/custom-meta-boxes/
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

/*------------------
* METABOX 1: HEADER
-------------------*/

if ( ! function_exists( 'thonet_add_metabox_product_header' ) ) {
	/**
	 * Register custom meta boxes for product. Section: header.
	 *
	 * @since 1.0
	 *
	 * @uses add_meta_box()
	 */
    function thonet_add_metabox_product_header() {
        add_meta_box(
            'header_product',
            __( 'Header del Producto', 'thonet' ),
            'thonet_add_metabox_product_header_callback',
            'product'
        );
    }
}

add_action( 'add_meta_boxes', 'thonet_add_metabox_product_header' );

if ( ! function_exists( 'thonet_add_metabox_product_header_callback' ) ) {
	/**
	 * Print HTML for meta box.
	 *
	 * @since 1.0
	 *
	 * @param WP_Post $post
	 *
	 * @see thonet_add_metabox_product_header()
	 */
    function thonet_add_metabox_product_header_callback( WP_Post $post ) {
        wp_nonce_field( 'thonet_header_product', 'thonet_header_product_nonce' );

        $headerProduct = get_post_meta( $post->ID, '_thonet_header', true );
        ?>

        <div class="thonet_metabox_wrapper">
        	<p>
        		<?php _e('<strong> Instrucciónes</strong>: Cargar imagen y subtitulos para mostrar el header.', 'thonet' ); ?>
        	</p>

        	<div class="thonet_metabox_input_data_wrapper">
        		<div class="thonet_metabox_input_data">
	            	<label for="thonet_subtitulo_header"><?php esc_html_e( 'Subtitulo ', 'thonet' ); ?></label>
            		<input type="text" name="thonet_subtitulo_header" id="thonet_subtitulo_header" value="<?php echo isset($headerProduct[0]) ? esc_attr( $headerProduct[0] ) : ''; ?>"/>		
	            </div>
	            <div class="thonet_metabox_input_data">
		            <label for="thonet_bajada_header"><?php esc_html_e( 'Bajada', 'thonet' ); ?></label>
		            <input type="text" name="thonet_bajada_header" id="thonet_bajada_header" value="<?php echo isset($headerProduct[2]) ? esc_attr( $headerProduct[2] ) : ''; ?>"/>	
	            </div>
	            <div class="thonet_metabox_input_data_img">
		            <label for="thonet_background_header"><?php esc_html_e( 'Imagen de fondo', 'thonet' ); ?></label>
		            <input type="url" name="thonet_background_header" id="thonet_background_header" value="<?php echo isset($headerProduct[1]) ? esc_url( $headerProduct[1] ) : ''; ?>"/>
		            <button class="upload-custom-img">Agregar imagen</button>
	            </div>
				<div class="thonet_metabox_input_data_img_mb">
		            <label for="thonet_background_header_mb"><?php esc_html_e( 'Imagen de fondo Movil', 'thonet' ); ?></label>
		            <input type="url" name="thonet_background_header_mb" id="thonet_background_header_mb" value="<?php echo isset($headerProduct[3]) ? esc_url( $headerProduct[1] ) : ''; ?>"/>
		            <button class="upload-custom-img-mb">Agregar imagen</button>
	            </div>
            </div>
        </div>
        <?php

    }
}

if ( ! function_exists( 'thonet_save_metabox_product_header' ) ) {
	/**
	 * Save meta data for a post.
	 *
	 * @param int     $post_id
	 * @param WP_Post $post
	 *
	 * @since 1.0
	 * @see thonet_add_metabox_product_header()
	 */
    function thonet_save_metabox_product_header( $post_id, WP_Post $post ) {
        // Si no se reciben los datos o no hay ninguno, salir de la función.
        $dato1 = isset( $_POST['thonet_subtitulo_header'] ) ? 1 : 0;
        $dato2 = isset( $_POST['thonet_background_header'] ) ? 1 : 0;
		$dato3 = isset( $_POST['thonet_bajada_header'] ) ? 1 : 0;
		$dato4 = isset( $_POST['thonet_background_header_mb'] ) ? 1 : 0;
        $datos_sumados = $dato1 + $dato2 + $dato3 + $dato4;
        if ( $datos_sumados == 0  ) {
            return;
        };
        //si es un autosave salir de la funcion
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        	return;
        }

        // Si no se aprueba el chequeo de seguridad, salir de la función.
	   if ( ! isset( $_POST['thonet_header_product_nonce'] ) || ! wp_verify_nonce( $_POST['thonet_header_product_nonce'], 'thonet_header_product' ) ) {
		  return;
	   }

        $post_type = get_post_type_object( $post->post_type );

        // Si el usuario actual no tiene permisos para modificar el post, salir de la función.
        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
            return;
        }
		
        // Guardamos: 1. subtitulo, 2. imagen, 3. bajada

        $headerProduct = array();
        	array_push($headerProduct, sanitize_text_field( $_POST['thonet_subtitulo_header'] ) );

        	array_push($headerProduct, esc_url( $_POST['thonet_background_header'] ) );

			array_push($headerProduct, sanitize_text_field( $_POST['thonet_bajada_header'] ) );
			
			array_push($headerProduct, esc_url( $_POST['thonet_background_header_mb'] ) );

        if ( ! empty( $headerProduct ) ) {
        	update_post_meta( $post_id, '_thonet_header', $headerProduct );
        }
        
 	}   
}

add_action( 'save_post', 'thonet_save_metabox_product_header', 10, 2 );
