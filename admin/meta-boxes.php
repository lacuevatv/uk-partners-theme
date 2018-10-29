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

if ( ! function_exists( 'uk_partners_theme_add_metabox_partner' ) ) {
	/**
	 * Register custom meta boxes for product. Section: header.
	 *
	 * @since 1.0
	 *
	 * @uses add_meta_box()
	 */
    function uk_partners_theme_add_metabox_partner() {
        add_meta_box(
            'url_partner',
            __( 'url', 'ukpartnerstheme' ),
            'uk_partners_theme_add_metabox_partner_callback',
            'partners'
        );
    }
}

add_action( 'add_meta_boxes', 'uk_partners_theme_add_metabox_partner' );

if ( ! function_exists( 'uk_partners_theme_add_metabox_partner_callback' ) ) {
	/**
	 * Print HTML for meta box.
	 *
	 * @since 1.0
	 *
	 * @param WP_Post $post
	 *
	 * @see uk_partners_theme_add_metabox_partner()
	 */
    function uk_partners_theme_add_metabox_partner_callback( WP_Post $post ) {
        wp_nonce_field( 'uk_partners_theme_url_partner', 'uk_partners_theme_url_partner_nonce' );

        $metaPartner = get_post_meta( $post->ID, '_url_partner', true );
        ?>

        <div class="url_partner_metabox_wrapper">
        	<p>
        		<?php _e('<strong> Instrucciónes</strong>: Insertar url del partner (opcional).', 'ukpartnerstheme' ); ?>
        	</p>

        	<div class="url_partner_metabox_input_data_wrapper">
        		<div class="url_partner_metabox_input_data">
	            	<label for="uk_url_partner">
						<?php esc_html_e( 'Url ', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="text" name="uk_url_partner" id="uk_url_partner" value="<?php echo isset($metaPartner) ? esc_attr( $metaPartner) : ''; ?>"/>		
	            </div>
            </div>
        </div>
        <?php

    }
}

if ( ! function_exists( 'uk_partners_theme_save_metabox_partner' ) ) {
	/**
	 * Save meta data for a post.
	 *
	 * @param int     $post_id
	 * @param WP_Post $post
	 *
	 * @since 1.0
	 * @see uk_partners_add_metabox_partner()
	 */
    function uk_partners_theme_save_metabox_partner( $post_id, WP_Post $post ) {
        // Si no se reciben los datos o no hay ninguno, salir de la función.
        $dato = isset( $_POST['uk_url_partner'] ) ? esc_url($_POST['uk_url_partner']) : '';
        if ($dato == '') {
			return;
		}
        //si es un autosave salir de la funcion
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        	return;
        }

    // Si no se aprueba el chequeo de seguridad, salir de la función.
	   if ( ! isset( $_POST['uk_partners_theme_url_partner_nonce'] ) || ! wp_verify_nonce( $_POST['uk_partners_theme_url_partner_nonce'], 'uk_partners_theme_url_partner' ) ) {
		  return;
	   }

        $post_type = get_post_type_object( $post->post_type );

        // Si el usuario actual no tiene permisos para modificar el post, salir de la función.
        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
            return;
        }
		
        // Guardamos:

        
        update_post_meta( $post_id, '_url_partner', $dato );
        
        
 	}   
}

add_action( 'save_post', 'uk_partners_theme_save_metabox_partner', 10, 2 );
