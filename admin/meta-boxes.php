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
* METABOX 1: PARTNERS
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

        <div class="uk_partner_metabox_wrapper">
        	<p>
        		<?php _e('<strong> Instrucciónes</strong>: Insertar url del partner (opcional).', 'ukpartnerstheme' ); ?>
        	</p>

        	<div class="uk_partner_metabox_input_data_wrapper">
        		<div class="metabox_input_data">
	            	<label for="uk_url_partner">
						<?php esc_html_e( 'Url', 'ukpartnerstheme' ); ?>
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



/*------------------
* METABOX 2: SLIDERS
-------------------*/

if ( ! function_exists( 'uk_partners_theme_add_metabox_sliders' ) ) {
	/**
	 * Register custom meta boxes for product. Section: header.
	 *
	 * @since 1.0
	 *
	 * @uses add_meta_box()
	 */
    function uk_partners_theme_add_metabox_sliders() {
        add_meta_box(
            'Datos adicionales:',
            __( 'Datos Adicionales', 'ukpartnerstheme' ),
            'uk_partners_theme_add_metabox_sliders_callback',
			'sliders'
        );
    }
}

add_action( 'add_meta_boxes', 'uk_partners_theme_add_metabox_sliders' );

if ( ! function_exists( 'uk_partners_theme_add_metabox_sliders_callback' ) ) {
	/**
	 * Print HTML for meta box.
	 *
	 * @since 1.0
	 *
	 * @param WP_Post $post
	 *
	 * @see uk_partners_theme_add_metabox_sliders()
	 */
    function uk_partners_theme_add_metabox_sliders_callback( WP_Post $post ) {
        wp_nonce_field( 'uk_partners_theme_sliders', 'uk_partners_theme_sliders_nonce' );

        $metaSliders = get_post_meta( $post->ID, '_uk_sliders', true );
        ?>

        <div class="uk_partner_metabox_wrapper">
        	<p>
        		<?php _e('<strong> Instrucciónes</strong>: Agregar imagen pc y imagen movil, texto del boton y url.', 'ukpartnerstheme' ); ?>
        	</p>

        	<div class="uk_partner_metabox_input_data_wrapper">
        		<div class="metabox_input_data">
	            	<label for="uk_url_sliders">
						<?php esc_html_e( 'Url', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="text" name="uk_url_sliders" id="uk_url_sliders" value="<?php echo isset($metaSliders[0]) ? esc_attr( $metaSliders[0]) : ''; ?>"/>		
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_btn_sliders">
						<?php esc_html_e( 'Texto del botón', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="text" name="uk_btn_sliders" id="uk_btn_sliders" value="<?php echo isset($metaSliders[1]) ? esc_attr( $metaSliders[1]) : _e( 'Más información','ukpartnerstheme'); ?>"/>		
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_open_sliders">
						<?php esc_html_e( 'Abrir en ventana nueva', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="checkbox" name="uk_open_sliders" id="uk_open_sliders" value="<?php echo isset($metaSliders[2]) ? esc_attr( $metaSliders[2]) : '' ?>" <?php if (isset($metaSliders[2]) && $metaSliders[2] == '1') {echo 'checked'; } ?>/>		
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_imagen_sliders">
						<?php esc_html_e( 'Imagen', 'ukpartnerstheme' ); ?>
					</label>
					<input type="text" name="uk_imagen_sliders" id="uk_url_sliders" value="<?php echo isset($metaSliders[3]) ? esc_attr( $metaSliders[3]) : ''; ?>"/>
					<button type="button" class="upload-images button-primary">Agregar imagen</button>		
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_imagen_movil_sliders">
						<?php esc_html_e( 'Imagen p movil', 'ukpartnerstheme' ); ?>
					</label>
					<input type="text" name="uk_imagen_movil_sliders" id="uk_imagen_movil_sliders" value="<?php echo isset($metaSliders[4]) ? esc_attr( $metaSliders[4]) : ''; ?>"/>
					<button type="button" class="upload-images button-primary">Agregar imagen</button>
	            </div>
            </div>
        </div>
        <?php

    }
}

if ( ! function_exists( 'uk_partners_theme_save_metabox_sliders' ) ) {
	/**
	 * Save meta data for a post.
	 *
	 * @param int     $post_id
	 * @param WP_Post $post
	 *
	 * @since 1.0
	 * @see uk_partners_add_metabox_sliders()
	 */
    function uk_partners_theme_save_metabox_sliders( $post_id, WP_Post $post ) {
        // Si no se reciben los datos o no hay ninguno, salir de la función.
		$dato1 = isset( $_POST['uk_url_sliders'] ) ? 1 : 0;
		$dato2 = isset( $_POST['uk_btn_sliders'] ) ? 1 : 0;
		$dato3 = isset( $_POST['uk_open_sliders'] ) ? 1 : 0;
		$dato4 = isset( $_POST['uk_imagen_sliders'] ) ? 1 : 0;
		$dato5 = isset( $_POST['uk_imagen_movil_sliders'] ) ? 1 : 0;
		$datos_sumados = $dato1 + $dato2 + $dato3 + $dato4 + $dato5;
		
		if ( $datos_sumados == 0  ) {
            return;
        };
		
        //si es un autosave salir de la funcion
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        	return;
        }

    	// Si no se aprueba el chequeo de seguridad, salir de la función.
	   if ( ! isset( $_POST['uk_partners_theme_sliders_nonce'] ) || ! wp_verify_nonce( $_POST['uk_partners_theme_sliders_nonce'], 'uk_partners_theme_sliders' ) ) {
		  return;
	   }

        $post_type = get_post_type_object( $post->post_type );

        // Si el usuario actual no tiene permisos para modificar el post, salir de la función.
        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
            return;
		}
		
        // Guardamos:
		$dataSlider = array();
		array_push($dataSlider, esc_url( $_POST['uk_url_sliders'] ) );

		array_push($dataSlider, sanitize_text_field( $_POST['uk_btn_sliders'] ) );
		
		array_push($dataSlider, esc_attr( $_POST['uk_open_sliders'] ) );

		array_push($dataSlider, esc_url( $_POST['uk_imagen_sliders'] ) );

		array_push($dataSlider, esc_url( $_POST['uk_imagen_movil_sliders'] ) );
		
        if ( ! empty( $dataSlider ) ) {
        	update_post_meta( $post_id, '_uk_sliders', $dataSlider );
        }
        
        
        
 	}   
}

add_action( 'save_post', 'uk_partners_theme_save_metabox_sliders', 10, 2 );


/*------------------
* METABOX 3: CREW
-------------------*/

if ( ! function_exists( 'uk_partners_theme_add_metabox_crew' ) ) {
	/**
	 * Register custom meta boxes for product. Section: header.
	 *
	 * @since 1.0
	 *
	 * @uses add_meta_box()
	 */
    function uk_partners_theme_add_metabox_crew() {
        add_meta_box(
            'cargo',
            __( 'Cargo', 'ukpartnerstheme' ),
            'uk_partners_theme_add_metabox_crew_callback',
            'crew'
        );
    }
}

add_action( 'add_meta_boxes', 'uk_partners_theme_add_metabox_crew' );

if ( ! function_exists( 'uk_partners_theme_add_metabox_crew_callback' ) ) {
	/**
	 * Print HTML for meta box.
	 *
	 * @since 1.0
	 *
	 * @param WP_Post $post
	 *
	 * @see uk_partners_theme_add_metabox_partner()
	 */
    function uk_partners_theme_add_metabox_crew_callback( WP_Post $post ) {
        wp_nonce_field( 'uk_partners_theme_crew', 'uk_partners_theme_crew_nonce' );

        $metaCrew = get_post_meta( $post->ID, '_crew', true );
        ?>

        <div class="uk_partner_metabox_wrapper">
        	<p>
        		<?php _e('<strong> Instrucciónes</strong>: Insertar el cargo (opcional).', 'ukpartnerstheme' ); ?>
        	</p>

        	<div class="uk_partner_metabox_input_data_wrapper">
        		<div class="metabox_input_data">
	            	<label for="uk_cargo_crew">
						<?php esc_html_e( 'Cargo', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="text" name="uk_cargo_crew" id="uk_cargo_crew" value="<?php echo isset($metaCrew) ? sanitize_text_field( $metaCrew) : ''; ?>"/>		
	            </div>
            </div>
        </div>
        <?php

    }
}

if ( ! function_exists( 'uk_partners_theme_save_metabox_crew' ) ) {
	/**
	 * Save meta data for a post.
	 *
	 * @param int     $post_id
	 * @param WP_Post $post
	 *
	 * @since 1.0
	 * @see uk_partners_add_metabox_partner()
	 */
    function uk_partners_theme_save_metabox_crew( $post_id, WP_Post $post ) {
        // Si no se reciben los datos o no hay ninguno, salir de la función.
        $dato = isset( $_POST['uk_cargo_crew'] ) ? sanitize_text_field($_POST['uk_cargo_crew']) : '';
        if ($dato == '') {
			return;
		}
        //si es un autosave salir de la funcion
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        	return;
        }

    // Si no se aprueba el chequeo de seguridad, salir de la función.
	   if ( ! isset( $_POST['uk_partners_theme_crew_nonce'] ) || ! wp_verify_nonce( $_POST['uk_partners_theme_crew_nonce'], 'uk_partners_theme_crew' ) ) {
		  return;
	   }

        $post_type = get_post_type_object( $post->post_type );

        // Si el usuario actual no tiene permisos para modificar el post, salir de la función.
        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
            return;
        }
		
        // Guardamos:

        
        update_post_meta( $post_id, '_crew', $dato );
        
        
 	}   
}

add_action( 'save_post', 'uk_partners_theme_save_metabox_crew', 10, 2 );