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
        		<?php _e('Insertar url del partner (opcional).', 'ukpartnerstheme' ); ?>
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
            'datos-adicionales',
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
        		<?php _e('Agregar imagen pc y imagen movil, texto del boton y url.', 'ukpartnerstheme' ); ?>
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
        		<?php _e('Insertar el cargo (opcional).', 'ukpartnerstheme' ); ?>
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

        
        update_post_meta( $post_id, '_crew', sanitize_text_field( $_POST['uk_cargo_crew'] ) );
        
        
 	}   
}

add_action( 'save_post', 'uk_partners_theme_save_metabox_crew', 10, 2 );


/*------------------
* METABOX 4: META INFO RESUMEN
* aparece en destinos, cursos y alojamientos
-------------------*/

if ( ! function_exists( 'uk_partners_theme_add_metabox_meta_info_resumen' ) ) {
	/**
	 * Register custom meta boxes for product. Section: header.
	 *
	 * @since 1.0
	 *
	 * @uses add_meta_box()
	 */
    function uk_partners_theme_add_metabox_meta_info_resumen() {
        add_meta_box(
            'meta-resumen',
            __( 'Resumen:', 'ukpartnerstheme' ),
            'uk_partners_theme_add_metabox_meta_info_resumen_callback',
			'destinos'
		);
		add_meta_box(
            'meta-resumen',
            __( 'Resumen:', 'ukpartnerstheme' ),
            'uk_partners_theme_add_metabox_meta_info_resumen_callback',
			'alojamientos'
		);
		add_meta_box(
            'meta-resumen',
            __( 'Resumen:', 'ukpartnerstheme' ),
            'uk_partners_theme_add_metabox_meta_info_resumen_callback',
			'cursos'
		);	
    }
}

add_action( 'add_meta_boxes', 'uk_partners_theme_add_metabox_meta_info_resumen' );

if ( ! function_exists( 'uk_partners_theme_add_metabox_meta_info_resumen_callback' ) ) {
	/**
	 * Print HTML for meta box.
	 *
	 * @since 1.0
	 *
	 * @param WP_Post $post
	 *
	 * @see uk_partners_theme_add_metabox_destinos()
	 */
    function uk_partners_theme_add_metabox_meta_info_resumen_callback( WP_Post $post ) {
        wp_nonce_field( 'uk_partners_theme_meta_info_resumen', 'uk_partners_theme_meta_info_resumen_nonce' );

        $metaInfoResumen = get_post_meta( $post->ID, '_uk_meta_info_resumen', true );
        ?>

        <div class="uk_partner_metabox_wrapper">
        	<p>
        		<?php _e('Agregar meta info.', 'ukpartnerstheme' ); ?>
        	</p>

        	<div class="uk_partner_metabox_input_data_wrapper">
        		<div class="metabox_input_data">
	            	<label for="uk_meta_1">
						<?php esc_html_e( 'Info 1', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="text" name="uk_meta_1" id="uk_meta_1" value="<?php echo isset($metaInfoResumen[0]) ? sanitize_text_field( $metaInfoResumen[0]) : ''; ?>"/>		
				</div>

				<div class="metabox_input_data">
	            	<label for="uk_meta_2">
						<?php esc_html_e( 'Info 2', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="text" name="uk_meta_2" id="uk_meta_2" value="<?php echo isset($metaInfoResumen[1]) ? sanitize_text_field( $metaInfoResumen[1]) : ''; ?>"/>		
				</div>

				<div class="metabox_input_data">
	            	<label for="uk_meta_3">
						<?php esc_html_e( 'Info 3', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="text" name="uk_meta_3" id="uk_meta_3" value="<?php echo isset($metaInfoResumen[2]) ? sanitize_text_field( $metaInfoResumen[2]) : ''; ?>"/>		
				</div>
            </div>
        </div>
        <?php
    }
}

if ( ! function_exists( 'uk_partners_theme_save_metabox_meta_info_resumen' ) ) {
	/**
	 * Save meta data for a post.
	 *
	 * @param int     $post_id
	 * @param WP_Post $post
	 *
	 * @since 1.0
	 * @see uk_partners_add_metabox_meta_info_resumen()
	 */
    function uk_partners_theme_save_metabox_meta_info_resumen( $post_id, WP_Post $post ) {
        // Si no se reciben los datos o no hay ninguno, salir de la función.
		$dato1 = isset( $_POST['uk_meta_1'] ) ? 1 : 0;
		$dato2 = isset( $_POST['uk_meta_2'] ) ? 1 : 0;
		$dato3 = isset( $_POST['uk_meta_3'] ) ? 1 : 0;
		$datos_sumados = $dato1 + $dato2 + $dato3;
		
		if ( $datos_sumados == 0  ) {
            return;
        };
		
        //si es un autosave salir de la funcion
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        	return;
        }

    	// Si no se aprueba el chequeo de seguridad, salir de la función.
	   if ( ! isset( $_POST['uk_partners_theme_meta_info_resumen_nonce'] ) || ! wp_verify_nonce( $_POST['uk_partners_theme_meta_info_resumen_nonce'], 'uk_partners_theme_meta_info_resumen' ) ) {
		  return;
	   }

        $post_type = get_post_type_object( $post->post_type );

        // Si el usuario actual no tiene permisos para modificar el post, salir de la función.
        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
            return;
		}
		
        // Guardamos:
		$dataResumen = array();
		array_push($dataResumen, sanitize_text_field( $_POST['uk_meta_1'] ) );
		array_push($dataResumen, sanitize_text_field( $_POST['uk_meta_2'] ) );
		array_push($dataResumen, sanitize_text_field( $_POST['uk_meta_3'] ) );
			
        if ( ! empty( $dataResumen ) ) {
        	update_post_meta( $post_id, '_uk_meta_info_resumen', $dataResumen );
        }

 	}   
}

add_action( 'save_post', 'uk_partners_theme_save_metabox_meta_info_resumen', 10, 2 );


/*------------------
* METABOX 5: GALERÍA DE IMAGENES
-------------------*/

if ( ! function_exists( 'uk_partners_theme_add_metabox_galeria_imagenes' ) ) {
	/**
	 * Register custom meta boxes for product. Section: header.
	 *
	 * @since 1.0
	 *
	 * @uses add_meta_box()
	 */
    function uk_partners_theme_add_metabox_galeria_imagenes() {
        add_meta_box(
            'galeria_imagenes',
            __( 'Galería de imágenes', 'ukpartnerstheme' ),
            'uk_partners_theme_add_metabox_galeria_imagenes_callback',
			'destinos'
        );
    }
}

add_action( 'add_meta_boxes', 'uk_partners_theme_add_metabox_galeria_imagenes' );

if ( ! function_exists( 'uk_partners_theme_add_metabox_galeria_imagenes_callback' ) ) {
	/**
	 * Print HTML for meta box.
	 *
	 * @since 1.0
	 *
	 * @param WP_Post $post
	 *
	 * @see uk_partners_theme_add_metabox_galeria_imagenes()
	 */
    function uk_partners_theme_add_metabox_galeria_imagenes_callback( WP_Post $post ) {
        wp_nonce_field( 'uk_partners_theme_galeria_imagenes', 'uk_partners_theme_galeria_imagenes_nonce' );

        $imagenes = get_post_meta( $post->ID, '_uk_galeria_imagenes', true );
        ?>

        <div class="uk_partner_metabox_wrapper">
        	<p>
        		<?php _e('Seleccionar imágenes para la galería.', 'ukpartnerstheme' ); ?>
        	</p>

        	<div class="uk_partner_metabox_input_data_wrapper">
        		
				<div class="metabox_input_data">
					<input type="text" name="uk_imagenes" id="uk_imagenes" value="<?php echo isset($imagenes[0]) ? esc_attr( $imagenes[0]) : ''; ?>"/>
					<button type="button" class="upload-imagenes button-primary">Agregar imagenes</button>
	            </div>
            </div>
        </div>
        <?php

    }
}

if ( ! function_exists( 'uk_partners_theme_save_metabox_galeria_imagenes' ) ) {
	/**
	 * Save meta data for a post.
	 *
	 * @param int     $post_id
	 * @param WP_Post $post
	 *
	 * @since 1.0
	 * @see uk_partners_add_metabox_sliders()
	 */
    function uk_partners_theme_save_metabox_galeria_imagenes( $post_id, WP_Post $post ) {		
		
        //si es un autosave salir de la funcion
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        	return;
        }

    	// Si no se aprueba el chequeo de seguridad, salir de la función.
	   if ( ! isset( $_POST['uk_partners_theme_galeria_imagenes_nonce'] ) || ! wp_verify_nonce( $_POST['uk_partners_theme_galeria_imagenes_nonce'], 'uk_partners_theme_galeria_imagenes' ) ) {
		  return;
	   }

        $post_type = get_post_type_object( $post->post_type );

        // Si el usuario actual no tiene permisos para modificar el post, salir de la función.
        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
            return;
		}
		
        // Guardamos:
		$imagenes = array();

		array_push($imagenes, esc_url( $_POST['uk_imagenes'] ) );
		
        if ( ! empty( $imagenes ) ) {
        	update_post_meta( $post_id, '_uk_galeria_imagenes', $imagenes );
        }
        
        
        
 	}   
}

add_action( 'save_post', 'uk_partners_theme_save_metabox_galeria_imagenes', 10, 2 );


/*------------------
* METABOX 6: SELECCIONAR CURSOS
-------------------*/

if ( ! function_exists( 'uk_partners_theme_add_metabox_select_cursos' ) ) {
	/**
	 * Register custom meta boxes for product. Section: header.
	 *
	 * @since 1.0
	 *
	 * @uses add_meta_box()
	 */
    function uk_partners_theme_add_metabox_select_cursos() {
        add_meta_box(
            'select_cursos',
            __( 'Cursos del destino:', 'ukpartnerstheme' ),
            'uk_partners_theme_add_metabox_select_cursos_callback',
			'destinos'
		);
    }
}

add_action( 'add_meta_boxes', 'uk_partners_theme_add_metabox_select_cursos' );

if ( ! function_exists( 'uk_partners_theme_add_metabox_select_cursos_callback' ) ) {
	/**
	 * Print HTML for meta box.
	 *
	 * @since 1.0
	 *
	 * @param WP_Post $post
	 *
	 * @see uk_partners_theme_add_metabox_select_cursos()
	 */
    function uk_partners_theme_add_metabox_select_cursos_callback( WP_Post $post ) {
        wp_nonce_field( 'uk_partners_theme_select_cursos', 'uk_partners_theme_select_cursos_nonce' );

		$cursosSelected = get_post_meta( $post->ID, '_uk_meta_select_cursos', true ); ?>

		<div class="uk_partner_metabox_wrapper">

		<?php 
		//busca cursos cargados
		$cursos = new WP_Query( array(
			'post_type' => 'cursos',
			)
		);
		if ($cursos->have_posts()) : ?>

        	<p>
				<?php _e('Seleccionar los cursos de este destino.', 'ukpartnerstheme' ); ?>
			</p>
			
			<div class="uk_partner_metabox_input_data_wrapper">
			<?php while ( $cursos->have_posts() ) : $cursos->the_post();
				$nombre = get_the_title();
				$id = get_the_id();
				$resumen = get_the_excerpt();
				?>

				<div class="metabox_input_data">
					<input type="checkbox" name="curso_id" value="<?php echo $id; ?>">
		            <label for="curso_id">
						<?php echo $nombre; ?>
					</label>
				</div>

			<?php endwhile; ?>

			</div>

		<?php else : ?>

			<p>
				<?php _e('No hay ningún curso cargado.', 'ukpartnerstheme' ); ?>
			</p>

		<?php endif; ?>
		
		</div>
		
		<?php

    }
}

if ( ! function_exists( 'uk_partners_theme_save_metabox_select_cursos' ) ) {
	/**
	 * Save meta data for a post.
	 *
	 * @param int     $post_id
	 * @param WP_Post $post
	 *
	 * @since 1.0
	 * @see uk_partners_add_metabox_select_cursos_callback()
	 */
    function uk_partners_theme_save_metabox_select_cursos( $post_id, WP_Post $post ) {
       		
        //si es un autosave salir de la funcion
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        	return;
        }

    	// Si no se aprueba el chequeo de seguridad, salir de la función.
	   if ( ! isset( $_POST['uk_partners_theme_select_cursos_nonce'] ) || ! wp_verify_nonce( $_POST['uk_partners_theme_select_cursos_nonce'], 'uk_partners_theme_select_cursos' ) ) {
		  return;
	   }

        $post_type = get_post_type_object( $post->post_type );

        // Si el usuario actual no tiene permisos para modificar el post, salir de la función.
        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
            return;
		}
		
        // Guardamos:
		$cursosToSave = array(
	        $_POST['curso_id']
	    );

        update_post_meta( $post_id, '_uk_meta_select_cursos', $cursosToSave );

 	}
}

add_action( 'save_post', 'uk_partners_theme_save_metabox_select_cursos', 10, 2 );


/*------------------
* METABOX 7: SELECCIONAR DESTINOS
-------------------*/

if ( ! function_exists( 'uk_partners_theme_add_metabox_select_destinos' ) ) {
	/**
	 * Register custom meta boxes for product. Section: header.
	 *
	 * @since 1.0
	 *
	 * @uses add_meta_box()
	 */
    function uk_partners_theme_add_metabox_select_destinos() {
        add_meta_box(
            'select_destinos',
            __( 'Destinos del curso:', 'ukpartnerstheme' ),
            'uk_partners_theme_add_metabox_select_destinos_callback',
			'cursos'
		);
    }
}

add_action( 'add_meta_boxes', 'uk_partners_theme_add_metabox_select_destinos' );

if ( ! function_exists( 'uk_partners_theme_add_metabox_select_destinos_callback' ) ) {
	/**
	 * Print HTML for meta box.
	 *
	 * @since 1.0
	 *
	 * @param WP_Post $post
	 *
	 * @see uk_partners_theme_add_metabox_select_destinos()
	 */
    function uk_partners_theme_add_metabox_select_destinos_callback( WP_Post $post ) {
        wp_nonce_field( 'uk_partners_theme_select_destinos', 'uk_partners_theme_select_destinos_nonce' );

		$cursosSelected = get_post_meta( $post->ID, '_uk_meta_select_destinos', true ); ?>

		<div class="uk_partner_metabox_wrapper">

		<?php 
		//busca cursos cargados
		$cursos = new WP_Query( array(
			'post_type' => 'destinos',
			)
		);
		if ($cursos->have_posts()) : ?>

        	<p>
				<?php _e('Seleccionar los destinos para cursar este curso.', 'ukpartnerstheme' ); ?>
			</p>
			
			<div class="uk_partner_metabox_input_data_wrapper">
			<?php while ( $cursos->have_posts() ) : $cursos->the_post();
				$nombre = get_the_title();
				$id = get_the_id();
				$resumen = get_the_excerpt();
				?>

				<div class="metabox_input_data">
					<input type="checkbox" name="destino_id" value="<?php echo $id; ?>">
		            <label for="destino_id">
						<?php echo $nombre; ?>
					</label>
				</div>

			<?php endwhile; ?>

			</div>

		<?php else : ?>

			<p>
				<?php _e('No hay ningún destino cargado.', 'ukpartnerstheme' ); ?>
			</p>

		<?php endif; ?>
		
		</div>
		
		<?php

    }
}

if ( ! function_exists( 'uk_partners_theme_save_metabox_select_destinos' ) ) {
	/**
	 * Save meta data for a post.
	 *
	 * @param int     $post_id
	 * @param WP_Post $post
	 *
	 * @since 1.0
	 * @see uk_partners_add_metabox_select_destinos_callback()
	 */
    function uk_partners_theme_save_metabox_select_destinos( $post_id, WP_Post $post ) {
       		
        //si es un autosave salir de la funcion
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        	return;
        }

    	// Si no se aprueba el chequeo de seguridad, salir de la función.
	   if ( ! isset( $_POST['uk_partners_theme_select_destinos_nonce'] ) || ! wp_verify_nonce( $_POST['uk_partners_theme_select_destinos_nonce'], 'uk_partners_theme_select_destinos' ) ) {
		  return;
	   }

        $post_type = get_post_type_object( $post->post_type );

        // Si el usuario actual no tiene permisos para modificar el post, salir de la función.
        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
            return;
		}
		
        // Guardamos:
		$destinosToSave = array(
	        $_POST['destinos_id']
	    );

        update_post_meta( $post_id, '_uk_meta_select_destinos', $destinosToSave );

 	}
}

add_action( 'save_post', 'uk_partners_theme_save_metabox_select_destinos', 10, 2 );


/*------------------
* METABOX 8: HOME: Activar Sliders
-------------------*/

if ( ! function_exists( 'uk_partners_theme_add_metabox_home_sliders' ) ) {
	/**
	 * Register custom meta boxes for product. Section: header.
	 *
	 * @since 1.0
	 *
	 * @uses add_meta_box()
	 */
    function uk_partners_theme_add_metabox_home_sliders() {
		global $post;
		$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

		if( $pageTemplate == 'page-home.php' || $pageTemplate == 'admin/page-home.php' ) {
			add_meta_box(
				'home-slider:',
				__( 'Slider Home', 'ukpartnerstheme' ),
				'uk_partners_theme_add_metabox_home_sliders_callback',
				'page'
			);
			
			
		}
        
    }
}

add_action( 'add_meta_boxes', 'uk_partners_theme_add_metabox_home_sliders' );

if ( ! function_exists( 'uk_partners_theme_add_metabox_home_sliders_callback' ) ) {
	/**
	 * Print HTML for meta box.
	 *
	 * @since 1.0
	 *
	 * @param WP_Post $post
	 *
	 * @see uk_partners_theme_add_metabox_home_sliders()
	 */
    function uk_partners_theme_add_metabox_home_sliders_callback( WP_Post $post ) {
        wp_nonce_field( 'uk_partners_theme_home_sliders', 'uk_partners_theme_home_sliders_nonce' );

		$checkHomeSliders = get_post_meta( $post->ID, '_uk_home_sliders', true );
		
        ?>

        <div class="uk_partner_metabox_wrapper">
        	<p>
        		<?php _e('Mostrar el slider de la página de inicio' ); ?>
        	</p>

        	<div class="uk_partner_metabox_input_data_wrapper">
        		<div class="metabox_input_data">
					<label for="uk_home_sliders"><?php esc_html_e( 'Activar Slider', 'ukpartnerstheme' ); ?></label>
					<input type="checkbox" name="uk_home_sliders" id="uk_home_sliders" value="<?php echo isset($checkHomeSliders) ? esc_attr( $checkHomeSliders) : '' ?>" <?php if (isset($checkHomeSliders) && $checkHomeSliders == '1') {echo 'checked'; } ?>/>
				</div>
			</div>
        </div>
        <?php

    }
}

if ( ! function_exists( 'uk_partners_theme_save_metabox_home_sliders' ) ) {
	/**
	 * Save meta data for a post.
	 *
	 * @param int     $post_id
	 * @param WP_Post $post
	 *
	 * @since 1.0
	 * @see uk_partners_add_metabox_sliders()
	 */
    function uk_partners_theme_save_metabox_home_sliders( $post_id, WP_Post $post ) {
        // Si no se reciben los datos o no hay ninguno, salir de la función.
		
		
        //si es un autosave salir de la funcion
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        	return;
        }

    	// Si no se aprueba el chequeo de seguridad, salir de la función.
	   if ( ! isset( $_POST['uk_partners_theme_home_sliders_nonce'] ) || ! wp_verify_nonce( $_POST['uk_partners_theme_home_sliders_nonce'], 'uk_partners_theme_home_sliders' ) ) {
		  return;
	   }

        $post_type = get_post_type_object( $post->post_type );

        // Si el usuario actual no tiene permisos para modificar el post, salir de la función.
        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
            return;
		}
		
        // Guardamos:
		update_post_meta( $post_id, '_uk_home_sliders', esc_attr($_POST['uk_home_sliders'])  );
    
 	}   
}

add_action( 'save_post', 'uk_partners_theme_save_metabox_home_sliders', 10, 2 );


/*------------------
* METABOX 9: ACTIVAR OTROS DESTINOS
-------------------*/

if ( ! function_exists( 'uk_partners_theme_add_metabox_home_destinos' ) ) {
	/**
	 * Register custom meta boxes for product. Section: header.
	 *
	 * @since 1.0
	 *
	 * @uses add_meta_box()
	 */
    function uk_partners_theme_add_metabox_home_destinos() {
		global $post;
		$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

		if( $pageTemplate == 'page-home.php' || $pageTemplate == 'admin/page-home.php' ) {
			add_meta_box(
				'home-destinos:',
				__( 'Destinos Home', 'ukpartnerstheme' ),
				'uk_partners_theme_add_metabox_home_destinos_callback',
				'page'
			);	
		}
        
    }
}

add_action( 'add_meta_boxes', 'uk_partners_theme_add_metabox_home_destinos' );

if ( ! function_exists( 'uk_partners_theme_add_metabox_home_destinos_callback' ) ) {
	/**
	 * Print HTML for meta box.
	 *
	 * @since 1.0
	 *
	 * @param WP_Post $post
	 *
	 * @see uk_partners_theme_add_metabox_home_detinos()
	 */
    function uk_partners_theme_add_metabox_home_destinos_callback( WP_Post $post ) {
        wp_nonce_field( 'uk_partners_theme_home_destinos', 'uk_partners_theme_home_destinos_nonce' );

        $metaDestinos = get_post_meta( $post->ID, '_uk_home_destinos', true );
        ?>

        <div class="uk_partner_metabox_wrapper">
        	<p>
        		<?php _e('Mostrar últimos destinos cargados' ); ?>
        	</p>

        	<div class="uk_partner_metabox_input_data_wrapper">
				<div class="metabox_input_data">
					<label for="uk_home_destinos"><?php esc_html_e( 'Activar Destinos', 'ukpartnerstheme' ); ?></label>	
					<input type="checkbox" name="uk_home_destinos" id="uk_home_destinos" value="<?php echo isset($metaDestinos[0]) ? esc_attr( $metaDestinos[0]) : '' ?>" <?php if (isset($metaDestinos[0]) && $metaDestinos[0] == '1') {echo 'checked'; } ?>/>	
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_home_numeros_destinos">
						<?php esc_html_e( 'Número a mostrar', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="number" name="uk_home_numeros_destinos" id="uk_home_numeros_destinos" value="<?php echo isset($metaDestinos[1]) ? esc_attr( $metaDestinos[1]) : '5'; ?>"/>		
				</div>
				<div class="metabox_input_data">
					<label for="uk_home_destinos_ver_mas"><?php esc_html_e( 'Bloque Leer más', 'ukpartnerstheme' ); ?></label>	
					<input type="checkbox" name="uk_home_destinos_ver_mas" id="uk_home_destinos_ver_mas" value="<?php echo isset($metaDestinos[2]) ? esc_attr( $metaDestinos[2]) : '' ?>" <?php if (isset($metaDestinos[2]) && $metaDestinos[2] == '1') {echo 'checked'; } ?>/>	
				</div>
				<div class="metabox_input_data">
					<label for="uk_home_destinos_texto"><?php esc_html_e( 'Texto del bloque', 'ukpartnerstheme' ); ?></label>	
					<textarea name="uk_home_destinos_texto" id="uk_home_destinos_texto"><?php echo isset($metaDestinos[3]) ?  esc_textarea($metaDestinos[3]) : '' ?></textarea>
				</div>
            </div>
        </div>
        <?php

    }
}

if ( ! function_exists( 'uk_partners_theme_save_metabox_home_destinos' ) ) {
	/**
	 * Save meta data for a post.
	 *
	 * @param int     $post_id
	 * @param WP_Post $post
	 *
	 * @since 1.0
	 * @see uk_partners_add_metabox_sliders()
	 */
    function uk_partners_theme_save_metabox_home_destinos( $post_id, WP_Post $post ) {
        // Si no se reciben los datos o no hay ninguno, salir de la función.
		$dato1 = isset( $_POST['uk_home_destinos'] ) ? 1 : 0;
		$dato2 = isset( $_POST['uk_home_numeros_destinos'] ) ? 1 : 0;
		$dato3 = isset( $_POST['uk_home_destinos_ver_mas'] ) ? 1 : 0;
		$dato4 = isset( $_POST['uk_home_destinos_texto'] ) ? 1 : 0;
	
		
        //si es un autosave salir de la funcion
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        	return;
        }

    	// Si no se aprueba el chequeo de seguridad, salir de la función.
	   if ( ! isset( $_POST['uk_partners_theme_home_destinos_nonce'] ) || ! wp_verify_nonce( $_POST['uk_partners_theme_home_destinos_nonce'], 'uk_partners_theme_home_destinos' ) ) {
		  return;
	   }

        $post_type = get_post_type_object( $post->post_type );

        // Si el usuario actual no tiene permisos para modificar el post, salir de la función.
        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
            return;
		}
		
        // Guardamos:
		$dataDestinos = array();

		array_push($dataDestinos, esc_attr( $_POST['uk_home_destinos'] ) );
		array_push($dataDestinos, sanitize_text_field( $_POST['uk_home_numeros_destinos'] ) );
		array_push($dataDestinos, esc_attr( $_POST['uk_home_destinos_ver_mas'] ) );
		array_push($dataDestinos, sanitize_textarea_field( $_POST['uk_home_destinos_texto'] ) );
		
        if ( ! empty( $dataDestinos ) ) {
        	update_post_meta( $post_id, '_uk_home_destinos', $dataDestinos );
        }
    
 	}   
}

add_action( 'save_post', 'uk_partners_theme_save_metabox_home_destinos', 10, 2 );


/*------------------
* METABOX 10: Separador
-------------------*/

if ( ! function_exists( 'uk_partners_theme_add_metabox_home_separador' ) ) {
	/**
	 * Register custom meta boxes for product. Section: header.
	 *
	 * @since 1.0
	 *
	 * @uses add_meta_box()
	 */
    function uk_partners_theme_add_metabox_home_separador() {
		global $post;
		$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

		if( $pageTemplate == 'page-home.php' || $pageTemplate == 'admin/page-home.php' ) {
			add_meta_box(
				'home-separador:',
				__( 'Bloque Separador', 'ukpartnerstheme' ),
				'uk_partners_theme_add_metabox_home_separador_callback',
				'page'
			);	
		}
        
    }
}

add_action( 'add_meta_boxes', 'uk_partners_theme_add_metabox_home_separador' );

if ( ! function_exists( 'uk_partners_theme_add_metabox_home_separador_callback' ) ) {
	/**
	 * Print HTML for meta box.
	 *
	 * @since 1.0
	 *
	 * @param WP_Post $post
	 *
	 * @see uk_partners_theme_add_metabox_home_sliders()
	 */
    function uk_partners_theme_add_metabox_home_separador_callback( WP_Post $post ) {
        wp_nonce_field( 'uk_partners_theme_home_separador', 'uk_partners_theme_home_separador_nonce' );

        $separadorData = get_post_meta( $post->ID, '_uk_home_separador', true );
        ?>

        <div class="uk_partner_metabox_wrapper">
        	<p>
        		<?php _e('Activar bloque separador y definir los datos y las imágenes.', 'ukpartnerstheme' ); ?>
        	</p>

        	<div class="uk_partner_metabox_input_data_wrapper">
				<div class="metabox_input_data">
					<label for="uk_home_separador"><?php esc_html_e( 'Activar bloque separador', 'ukpartnerstheme' ); ?></label>	
					<input type="checkbox" name="uk_home_separador" id="uk_home_separador" value="<?php echo isset($separadorData[0]) ? esc_attr( $separadorData[0]) : '' ?>" <?php if (isset($separadorData[0]) && $separadorData[0] == '1') {echo 'checked'; } ?>/>	
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_home_titulo">
						<?php esc_html_e( 'Título sección', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="text" name="uk_home_titulo" id="uk_home_titulo" value="<?php echo isset($separadorData[1]) ? esc_attr( $separadorData[1]) : ''; ?>"/>
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_home_separador_texto_boton">
						<?php esc_html_e( 'Texto Boton', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="text" name="uk_home_separador_texto_boton" id="uk_home_separador_texto_boton" value="<?php echo isset($separadorData[2]) ? esc_attr( $separadorData[2]) : ''; ?>"/>		
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_home_separador_link_boton">
						<?php esc_html_e( 'Url Boton', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="text" name="uk_home_separador_link_boton" id="uk_home_separador_link_boton" value="<?php echo isset($separadorData[3]) ? esc_attr( $separadorData[3]) : ''; ?>"/>		
				</div>
				<div class="metabox_input_data">
					<label for="uk_home_separador_target_boton"><?php esc_html_e( 'Abrir en nueva pestaña', 'ukpartnerstheme' ); ?></label>	
					<input type="checkbox" name="uk_home_separador_target_boton" id="uk_home_separador_target_boton" value="<?php echo isset($separadorData[4]) ? esc_attr( $separadorData[4]) : '' ?>" <?php if (isset($separadorData[4]) && $separadorData[4] == '1') {echo 'checked'; } ?>/>	
				</div>
				<div class="metabox_input_data">
					<label for="uk_home_separador_texto_bloque"><?php esc_html_e( 'Texto del bloque', 'ukpartnerstheme' ); ?></label>	
					<textarea name="uk_home_separador_texto_bloque" id="uk_home_separador_texto_bloque"><?php echo isset($separadorData[5]) ?  esc_textarea($separadorData[5]) : '' ?></textarea>
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_home_separador_imagen">
						<?php esc_html_e( 'Imagen', 'ukpartnerstheme' ); ?>
					</label>
					<input type="text" name="uk_home_separador_imagen" id="uk_home_separador_imagen" value="<?php echo isset($separadorData[6]) ? esc_attr( $separadorData[6]) : ''; ?>"/>
					<button type="button" class="upload-images button-primary">Agregar imagen</button>		
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_home_separador_imagen_movil">
						<?php esc_html_e( 'Imagen', 'ukpartnerstheme' ); ?>
					</label>
					<input type="text" name="uk_home_separador_imagen_movil" id="uk_home_separador_imagen_movil" value="<?php echo isset($separadorData[7]) ? esc_attr( $separadorData[7]) : ''; ?>"/>
					<button type="button" class="upload-images button-primary">Agregar imagen</button>		
				</div>
            </div>
        </div>
        <?php

    }
}

if ( ! function_exists( 'uk_partners_theme_save_metabox_home_separador' ) ) {
	/**
	 * Save meta data for a post.
	 *
	 * @param int     $post_id
	 * @param WP_Post $post
	 *
	 * @since 1.0
	 * @see uk_partners_add_metabox_home_separador()
	 */
    function uk_partners_theme_save_metabox_home_separador( $post_id, WP_Post $post ) {
		
        //si es un autosave salir de la funcion
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        	return;
        }

    	// Si no se aprueba el chequeo de seguridad, salir de la función.
	   if ( ! isset( $_POST['uk_partners_theme_home_separador_nonce'] ) || ! wp_verify_nonce( $_POST['uk_partners_theme_home_separador_nonce'], 'uk_partners_theme_home_separador' ) ) {
		  return;
	   }

        $post_type = get_post_type_object( $post->post_type );

        // Si el usuario actual no tiene permisos para modificar el post, salir de la función.
        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
            return;
		}
		
        // Guardamos:
		$dataSeparador = array();
		
		array_push($dataSeparador, esc_attr( $_POST['uk_home_separador'] ) );
		array_push($dataSeparador, sanitize_text_field( $_POST['uk_home_titulo'] ) );
		array_push($dataSeparador, sanitize_text_field( $_POST['uk_home_separador_texto_boton'] ) );
		array_push($dataSeparador, esc_url( $_POST['uk_home_separador_link_boton'] ) );
		array_push($dataSeparador, esc_attr( $_POST['uk_home_separador_target_boton'] ) );
		array_push($dataSeparador, sanitize_textarea_field( $_POST['uk_home_separador_texto_bloque'] ) );
		array_push($dataSeparador, esc_url( $_POST['uk_home_separador_imagen'] ) );
		array_push($dataSeparador, esc_url( $_POST['uk_home_separador_imagen_movil'] ) );
		
        if ( ! empty( $dataSeparador ) ) {
        	update_post_meta( $post_id, '_uk_home_separador', $dataSeparador );
        }
    
 	}   
}

add_action( 'save_post', 'uk_partners_theme_save_metabox_home_separador', 10, 2 );


/*------------------
* METABOX 11: ACTIVAR CURSOS
-------------------*/

if ( ! function_exists( 'uk_partners_theme_add_metabox_home_cursos' ) ) {
	/**
	 * Register custom meta boxes for product. Section: header.
	 *
	 * @since 1.0
	 *
	 * @uses add_meta_box()
	 */
    function uk_partners_theme_add_metabox_home_cursos() {
		global $post;
		$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

		if( $pageTemplate == 'page-home.php' || $pageTemplate == 'admin/page-home.php' ) {
			add_meta_box(
				'home-cursos',
				__( 'Cursos Home', 'ukpartnerstheme' ),
				'uk_partners_theme_add_metabox_home_cursos_callback',
				'page'
			);	
		}
        
    }
}

add_action( 'add_meta_boxes', 'uk_partners_theme_add_metabox_home_cursos' );

if ( ! function_exists( 'uk_partners_theme_add_metabox_home_cursos_callback' ) ) {
	/**
	 * Print HTML for meta box.
	 *
	 * @since 1.0
	 *
	 * @param WP_Post $post
	 *
	 * @see uk_partners_theme_add_metabox_home_cursos()
	 */
    function uk_partners_theme_add_metabox_home_cursos_callback( WP_Post $post ) {
        wp_nonce_field( 'uk_partners_theme_home_cursos', 'uk_partners_theme_home_cursos_nonce' );

        $metaDestinos = get_post_meta( $post->ID, '_uk_home_cursos', true );
        ?>

        <div class="uk_partner_metabox_wrapper">
        	<p>
        		<?php _e('Mostrar últimos cursos cargados' ); ?>
        	</p>

        	<div class="uk_partner_metabox_input_data_wrapper">
				<div class="metabox_input_data">
					<label for="uk_home_cursos"><?php esc_html_e( 'Activar Cursos', 'ukpartnerstheme' ); ?></label>	
					<input type="checkbox" name="uk_home_cursos" id="uk_home_cursos" value="<?php echo isset($metaDestinos[0]) ? esc_attr( $metaDestinos[0]) : '' ?>" <?php if (isset($metaDestinos[0]) && $metaDestinos[0] == '1') {echo 'checked'; } ?>/>	
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_home_numeros_cursos">
						<?php esc_html_e( 'Número a mostrar', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="number" name="uk_home_numeros_cursos" id="uk_home_numeros_cursos" value="<?php echo isset($metaDestinos[1]) ? esc_attr( $metaDestinos[1]) : '10'; ?>"/>		
				</div>
				<div class="metabox_input_data">
					<label for="uk_home_cursos_ver_mas"><?php esc_html_e( 'Botón Leer más', 'ukpartnerstheme' ); ?></label>	
					<input type="checkbox" name="uk_home_cursos_ver_mas" id="uk_home_cursos_ver_mas" value="<?php echo isset($metaDestinos[2]) ? esc_attr( $metaDestinos[2]) : '' ?>" <?php if (isset($metaDestinos[2]) && $metaDestinos[2] == '1') {echo 'checked'; } ?>/>	
				</div>
				<div class="metabox_input_data">
					<label for="uk_home_cursos_texto"><?php esc_html_e( 'Texto del bloque', 'ukpartnerstheme' ); ?></label>	
					<textarea name="uk_home_cursos_texto" id="uk_home_cursos_texto"><?php echo isset($metaDestinos[3]) ?  esc_textarea($metaDestinos[3]) : '' ?></textarea>
				</div>
            </div>
        </div>
        <?php

    }
}

if ( ! function_exists( 'uk_partners_theme_save_metabox_home_cursos' ) ) {
	/**
	 * Save meta data for a post.
	 *
	 * @param int     $post_id
	 * @param WP_Post $post
	 *
	 * @since 1.0
	 * @see uk_partners_add_metabox_sliders()
	 */
    function uk_partners_theme_save_metabox_home_cursos( $post_id, WP_Post $post ) {
		
        //si es un autosave salir de la funcion
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        	return;
        }

    	// Si no se aprueba el chequeo de seguridad, salir de la función.
	   if ( ! isset( $_POST['uk_partners_theme_home_destinos_nonce'] ) || ! wp_verify_nonce( $_POST['uk_partners_theme_home_destinos_nonce'], 'uk_partners_theme_home_destinos' ) ) {
		  return;
	   }

        $post_type = get_post_type_object( $post->post_type );

        // Si el usuario actual no tiene permisos para modificar el post, salir de la función.
        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
            return;
		}
		
        // Guardamos:
		$dataDestinos = array();

		array_push($dataDestinos, esc_attr( $_POST['uk_home_cursos'] ) );
		array_push($dataDestinos, sanitize_text_field( $_POST['uk_home_numeros_cursos'] ) );
		array_push($dataDestinos, esc_attr( $_POST['uk_home_cursos_ver_mas'] ) );
		array_push($dataDestinos, sanitize_textarea_field( $_POST['uk_home_cursos_texto'] ) );
		
        if ( ! empty( $dataDestinos ) ) {
        	update_post_meta( $post_id, '_uk_home_cursos', $dataDestinos );
        }
 	}   
}

add_action( 'save_post', 'uk_partners_theme_save_metabox_home_cursos', 10, 2 );


/*------------------
* METABOX 12: ALOJAMIENTO
-------------------*/

if ( ! function_exists( 'uk_partners_theme_add_metabox_home_alojamientos' ) ) {
	/**
	 * Register custom meta boxes for product. Section: header.
	 *
	 * @since 1.0
	 *
	 * @uses add_meta_box()
	 */
    function uk_partners_theme_add_metabox_home_alojamientos() {
		global $post;
		$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

		if( $pageTemplate == 'page-home.php' || $pageTemplate == 'admin/page-home.php' ) {
			add_meta_box(
				'home-alojamiento',
				__( 'Bloque Alojamiento', 'ukpartnerstheme' ),
				'uk_partners_theme_add_metabox_home_alojamientos_callback',
				'page'
			);	
		}
        
    }
}

add_action( 'add_meta_boxes', 'uk_partners_theme_add_metabox_home_alojamientos' );

if ( ! function_exists( 'uk_partners_theme_add_metabox_home_alojamientos_callback' ) ) {
	/**
	 * Print HTML for meta box.
	 *
	 * @since 1.0
	 *
	 * @param WP_Post $post
	 *
	 * @see uk_partners_theme_add_metabox_home_sliders()
	 */
    function uk_partners_theme_add_metabox_home_alojamientos_callback( WP_Post $post ) {
        wp_nonce_field( 'uk_partners_theme_home_alojamientos', 'uk_partners_theme_home_alojamientos_nonce' );

        $alojamientoData = get_post_meta( $post->ID, '_uk_home_alojamientos', true );
        ?>

        <div class="uk_partner_metabox_wrapper">
        	<p>
        		<?php _e('Activar bloque de alojamiento y definir los datos y las imágenes.', 'ukpartnerstheme' ); ?>
        	</p>

        	<div class="uk_partner_metabox_input_data_wrapper">
				<div class="metabox_input_data">
					<label for="uk_home_alojamiento"><?php esc_html_e( 'Activar bloque alojamientos', 'ukpartnerstheme' ); ?></label>	
					<input type="checkbox" name="uk_home_alojamiento" id="uk_home_alojamiento" value="<?php echo isset($alojamientoData[0]) ? esc_attr( $alojamientoData[0]) : '' ?>" <?php if (isset($alojamientoData[0]) && $alojamientoData[0] == '1') {echo 'checked'; } ?>/>	
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_home_alojamiento_titulo">
						<?php esc_html_e( 'Título sección', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="text" name="uk_home_alojamiento_titulo" id="uk_home_alojamiento_titulo" value="<?php echo isset($alojamientoData[1]) ? esc_attr( $alojamientoData[1]) : ''; ?>"/>
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_home_alojamiento_mini_text">
						<?php esc_html_e( 'Mini texto', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="text" name="uk_home_alojamiento_mini_text" id="uk_home_alojamiento_mini_text" value="<?php echo isset($alojamientoData[2]) ? esc_attr( $alojamientoData[2]) : ''; ?>"/>
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_home_alojamiento_texto_boton">
						<?php esc_html_e( 'Texto Boton', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="text" name="uk_home_alojamiento_texto_boton" id="uk_home_alojamiento_texto_boton" value="<?php echo isset($alojamientoData[3]) ? esc_attr( $alojamientoData[3]) : ''; ?>"/>		
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_home_alojamiento_link_boton">
						<?php esc_html_e( 'Url Boton', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="text" name="uk_home_alojamiento_link_boton" id="uk_home_alojamiento_link_boton" value="<?php echo isset($alojamientoData[4]) ? esc_attr( $alojamientoData[4]) : ''; ?>"/>		
				</div>
				<div class="metabox_input_data">
					<label for="uk_home_alojamiento_target_boton"><?php esc_html_e( 'Abrir en nueva pestaña', 'ukpartnerstheme' ); ?></label>	
					<input type="checkbox" name="uk_home_alojamiento_target_boton" id="uk_home_alojamiento_target_boton" value="<?php echo isset($alojamientoData[5]) ? esc_attr( $alojamientoData[5]) : '' ?>" <?php if (isset($alojamientoData[5]) && $alojamientoData[5] == '1') {echo 'checked'; } ?>/>	
				</div>
				<div class="metabox_input_data">
					<label for="uk_home_alojamiento_texto_bloque"><?php esc_html_e( 'Texto del bloque', 'ukpartnerstheme' ); ?></label>	
					<textarea name="uk_home_alojamiento_texto_bloque" id="uk_home_alojamiento_texto_bloque"><?php echo isset($alojamientoData[6]) ?  esc_textarea($alojamientoData[6]) : '' ?></textarea>
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_home_alojamiento_imagen">
						<?php esc_html_e( 'Imagen', 'ukpartnerstheme' ); ?>
					</label>
					<input type="text" name="uk_home_alojamiento_imagen" id="uk_home_alojamiento_imagen" value="<?php echo isset($alojamientoData[7]) ? esc_attr( $alojamientoData[7]) : ''; ?>"/>
					<button type="button" class="upload-images button-primary">Agregar imagen</button>		
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_home_alojamiento_imagen_movil">
						<?php esc_html_e( 'Imagen', 'ukpartnerstheme' ); ?>
					</label>
					<input type="text" name="uk_home_alojamiento_imagen_movil" id="uk_home_alojamiento_imagen_movil" value="<?php echo isset($alojamientoData[8]) ? esc_attr( $alojamientoData[8]) : ''; ?>"/>
					<button type="button" class="upload-images button-primary">Agregar imagen</button>		
				</div>
            </div>
        </div>
        <?php

    }
}

if ( ! function_exists( 'uk_partners_theme_save_metabox_home_alojamientos' ) ) {
	/**
	 * Save meta data for a post.
	 *
	 * @param int     $post_id
	 * @param WP_Post $post
	 *
	 * @since 1.0
	 * @see uk_partners_add_metabox_home_alojamientos()
	 */
    function uk_partners_theme_save_metabox_home_alojamientos( $post_id, WP_Post $post ) {
		
        //si es un autosave salir de la funcion
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        	return;
        }

    	// Si no se aprueba el chequeo de seguridad, salir de la función.
	   if ( ! isset( $_POST['uk_partners_theme_home_alojamientos_nonce'] ) || ! wp_verify_nonce( $_POST['uk_partners_theme_home_alojamientos_nonce'], 'uk_partners_theme_home_alojamientos' ) ) {
		  return;
	   }

        $post_type = get_post_type_object( $post->post_type );

        // Si el usuario actual no tiene permisos para modificar el post, salir de la función.
        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
            return;
		}
		
        // Guardamos:
		$dataAlojamiento = array();
		
		array_push($dataAlojamiento, esc_attr( $_POST['uk_home_alojamiento'] ) );
		array_push($dataAlojamiento, sanitize_text_field( $_POST['uk_home_alojamiento_titulo'] ) );
		array_push($dataAlojamiento, sanitize_text_field( $_POST['uk_home_alojamiento_mini_text'] ) );
		array_push($dataAlojamiento, sanitize_text_field( $_POST['uk_home_alojamiento_texto_boton'] ) );
		array_push($dataAlojamiento, esc_url( $_POST['uk_home_alojamiento_link_boton'] ) );
		array_push($dataAlojamiento, esc_attr( $_POST['uk_home_alojamiento_target_boton'] ) );
		array_push($dataAlojamiento, sanitize_textarea_field( $_POST['uk_home_alojamiento_texto_bloque'] ) );
		array_push($dataAlojamiento, esc_url( $_POST['uk_home_alojamiento_imagen'] ) );
		array_push($dataAlojamiento, esc_url( $_POST['uk_home_alojamiento_imagen_movil'] ) );
		
        if ( ! empty( $dataAlojamiento ) ) {
        	update_post_meta( $post_id, '_uk_home_alojamientos', $dataAlojamiento );
        }
    
 	}   
}

add_action( 'save_post', 'uk_partners_theme_save_metabox_home_alojamientos', 10, 2 );


/*------------------
* METABOX 13: TESTIMONIO
-------------------*/

if ( ! function_exists( 'uk_partners_theme_add_metabox_home_testimonios' ) ) {
	/**
	 * Register custom meta boxes for product. Section: header.
	 *
	 * @since 1.0
	 *
	 * @uses add_meta_box()
	 */
    function uk_partners_theme_add_metabox_home_testimonios() {
		global $post;
		$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

		if( $pageTemplate == 'page-home.php' || $pageTemplate == 'admin/page-home.php' ) {
			add_meta_box(
				'home-testimonios',
				__( 'Testimonios Home', 'ukpartnerstheme' ),
				'uk_partners_theme_add_metabox_home_testimonios_callback',
				'page'
			);	
		}
        
    }
}

add_action( 'add_meta_boxes', 'uk_partners_theme_add_metabox_home_testimonios' );

if ( ! function_exists( 'uk_partners_theme_add_metabox_home_testimonios_callback' ) ) {
	/**
	 * Print HTML for meta box.
	 *
	 * @since 1.0
	 *
	 * @param WP_Post $post
	 *
	 * @see uk_partners_theme_add_metabox_home_cursos()
	 */
    function uk_partners_theme_add_metabox_home_testimonios_callback( WP_Post $post ) {
        wp_nonce_field( 'uk_partners_theme_home_testimonios', 'uk_partners_theme_home_testimonios_nonce' );

        $metaTestimonios = get_post_meta( $post->ID, '_uk_home_testimonios', true );
        ?>

        <div class="uk_partner_metabox_wrapper">
        	<p>
        		<?php _e('Mostrar últimos testimonios cargados' ); ?>
        	</p>

        	<div class="uk_partner_metabox_input_data_wrapper">
				<div class="metabox_input_data">
					<label for="uk_home_testimonios"><?php esc_html_e( 'Activar Cursos', 'ukpartnerstheme' ); ?></label>	
					<input type="checkbox" name="uk_home_testimonios" id="uk_home_testimonios" value="<?php echo isset($metaTestimonios[0]) ? esc_attr( $metaTestimonios[0]) : '' ?>" <?php if (isset($metaTestimonios[0]) && $metaTestimonios[0] == '1') {echo 'checked'; } ?>/>	
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_home_numeros_testimonios">
						<?php esc_html_e( 'Número a mostrar', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="number" name="uk_home_numeros_testimonios" id="uk_home_numeros_testimonios" value="<?php echo isset($metaTestimonios[1]) ? esc_attr( $metaTestimonios[1]) : '10'; ?>"/>		
				</div>
				<div class="metabox_input_data">
					<label for="uk_home_testimonios_texto"><?php esc_html_e( 'Texto del bloque', 'ukpartnerstheme' ); ?></label>	
					<textarea name="uk_home_testimonios_texto" id="uk_home_testimonios_texto"><?php echo isset($metaTestimonios[2]) ?  esc_textarea($metaTestimonios[2]) : '' ?></textarea>
				</div>
            </div>
        </div>
        <?php

    }
}

if ( ! function_exists( 'uk_partners_theme_save_metabox_home_testimonios' ) ) {
	/**
	 * Save meta data for a post.
	 *
	 * @param int     $post_id
	 * @param WP_Post $post
	 *
	 * @since 1.0
	 * @see uk_partners_add_metabox_sliders()
	 */
    function uk_partners_theme_save_metabox_home_testimonios( $post_id, WP_Post $post ) {
		
        //si es un autosave salir de la funcion
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        	return;
        }

    	// Si no se aprueba el chequeo de seguridad, salir de la función.
	   if ( ! isset( $_POST['uk_partners_theme_home_testimonios_nonce'] ) || ! wp_verify_nonce( $_POST['uk_partners_theme_home_testimonios_nonce'], 'uk_partners_theme_home_testimonios' ) ) {
		  return;
	   }

        $post_type = get_post_type_object( $post->post_type );

        // Si el usuario actual no tiene permisos para modificar el post, salir de la función.
        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
            return;
		}
		
        // Guardamos:
		$dataTestimonios = array();

		array_push($dataTestimonios, esc_attr( $_POST['uk_home_testimonios'] ) );
		array_push($dataTestimonios, sanitize_text_field( $_POST['uk_home_numeros_testimonios'] ) );
		array_push($dataTestimonios, sanitize_textarea_field( $_POST['uk_home_testimonios_texto'] ) );
		
        if ( ! empty( $dataTestimonios ) ) {
        	update_post_meta( $post_id, '_uk_home_testimonios', $dataTestimonios );
        }
 	}   
}

add_action( 'save_post', 'uk_partners_theme_save_metabox_home_testimonios', 10, 2 );


/*------------------
* METABOX 14: HOME CONTACTO
-------------------*/

if ( ! function_exists( 'uk_partners_theme_add_metabox_contact_form_code' ) ) {
	/**
	 * Register custom meta boxes for product. Section: header.
	 *
	 * @since 1.0
	 *
	 * @uses add_meta_box()
	 */
    function uk_partners_theme_add_metabox_contact_form_code() {

		global $post;
		$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);

		if( $pageTemplate == 'page-home.php' || $pageTemplate == 'admin/page-home.php' ) {
			add_meta_box(
				'contact-form-code',
				__( 'Formulario de contacto:', 'ukpartnerstheme' ),
				'uk_partners_theme_add_metabox_contact_form_code_callback',
				'page'
			);
		}

    }
}

add_action( 'add_meta_boxes', 'uk_partners_theme_add_metabox_contact_form_code' );

if ( ! function_exists( 'uk_partners_theme_add_metabox_contact_form_code_callback' ) ) {
	/**
	 * Print HTML for meta box.
	 *
	 * @since 1.0
	 *
	 * @param WP_Post $post
	 *
	 * @see uk_partners_theme_add_metabox_contact_form_code()
	 */
	function uk_partners_theme_add_metabox_contact_form_code_callback( WP_Post $post ) {
        wp_nonce_field( 'uk_partners_theme_contact_form_code', 'uk_partners_theme_contact_form_code_nonce' );

        $metaContactFormCode = get_post_meta( $post->ID, '_uk_home_contacto', true );
        ?>

        <div class="uk_partner_metabox_wrapper">
        	<p>
        		<?php _e('Agregar el código de Contact Form 7, título y texto.', 'ukpartnerstheme' ); ?>
        	</p>

        	<div class="uk_partner_metabox_input_data_wrapper">
				<div class="metabox_input_data">
					<label for="uk_contact_code"><?php esc_html_e( 'Activar bloque Contacto', 'ukpartnerstheme' ); ?></label>	
					<input type="checkbox" name="uk_contact_code" id="uk_contact_code" value="<?php echo isset($metaContactFormCode[0]) ? esc_attr( $metaContactFormCode[0]) : '' ?>" <?php if (isset($metaContactFormCode[0]) && $metaContactFormCode[0] == '1') {echo 'checked'; } ?>/>	
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_contact_code_titulo">
						<?php esc_html_e( 'Título', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="text" name="uk_contact_code_titulo" id="uk_contact_code_titulo" value="<?php echo isset($metaContactFormCode[1]) ? esc_attr( $metaContactFormCode[1]) : ''; ?>"/>		
				</div>
				<div class="metabox_input_data">
					<label for="uk_contact_code_titulo_texto"><?php esc_html_e( 'Texto del bloque', 'ukpartnerstheme' ); ?></label>	
					<!--<textarea name="uk_contact_code_titulo_texto" id="uk_contact_code_titulo_texto"><?php echo isset($metaContactFormCode[2]) ?  esc_textarea($metaContactFormCode[2]) : '' ?></textarea>-->
					<?php wp_editor( esc_textarea($metaContactFormCode[2]), 'uk_contact_code_titulo_texto', array('textarea_rows' => '5')); ?>
				</div>
				<div class="metabox_input_data">
	            	<label for="uk_contact_code_shortcode">
						<?php esc_html_e( 'Código Formulario', 'ukpartnerstheme' ); ?>
					</label>
            		<input type="text" name="uk_contact_code_shortcode" id="uk_contact_code_shortcode" value="<?php echo isset($metaContactFormCode[3]) ? esc_attr( $metaContactFormCode[3]) : ''; ?>"/>		
				</div>
			</div>
        </div>
		<?php
	

    }
}

if ( ! function_exists( 'uk_partners_theme_save_metabox_contact_form_code' ) ) {
	/**
	 * Save meta data for a post.
	 *
	 * @param int     $post_id
	 * @param WP_Post $post
	 *
	 * @since 1.0
	 * @see uk_partners_add_metabox_contact_form_code()
	 */
    function uk_partners_theme_save_metabox_contact_form_code( $post_id, WP_Post $post ) {
       		
        //si es un autosave salir de la funcion
        if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        	return;
        }

    	// Si no se aprueba el chequeo de seguridad, salir de la función.
	   if ( ! isset( $_POST['uk_partners_theme_contact_form_code_nonce'] ) || ! wp_verify_nonce( $_POST['uk_partners_theme_contact_form_code_nonce'], 'uk_partners_theme_contact_form_code' ) ) {
		  return;
	   }

        $post_type = get_post_type_object( $post->post_type );

        // Si el usuario actual no tiene permisos para modificar el post, salir de la función.
        if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
            return;
		}
		
        // Guardamos:
		$dataContacto = array();
		array_push($dataContacto, esc_attr( $_POST['uk_contact_code'] ) );
		array_push($dataContacto, sanitize_text_field( $_POST['uk_contact_code_titulo'] ) );
		array_push($dataContacto, sanitize_textarea_field( $_POST['uk_contact_code_titulo_texto'] ) );
		array_push($dataContacto, esc_html( $_POST['uk_contact_code_shortcode'] ) );
		
        if ( ! empty( $dataContacto ) ) {
        	update_post_meta( $post_id, '_uk_home_contacto', $dataContacto );
        }

 	}   
}

add_action( 'save_post', 'uk_partners_theme_save_metabox_contact_form_code', 10, 2 );