<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 */

/**
 * Only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

//CONSTANTES //
define('IMAGES_DIR' , get_template_directory_uri() . '/assets/images/');
define('TEMPLATES' , get_template_directory_uri() . '/template-parts/');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

if ( ! function_exists( ' uk_partners_theme_setup' ) ) {
    function uk_partners_theme_setup() {
        /*
        * Make theme available for translation.
        * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
        * If you're building a theme based on Twenty Seventeen, use a find and replace
        * to change 'twentyseventeen' to the name of your theme in all the template files.
        */

        load_theme_textdomain( 'ukpartnerstheme', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support( 'title-tag' );
        
        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'medium', 768, 768 );
		set_post_thumbnail_size( 550, 768, true );
		
        // This theme uses wp_nav_menu() in three location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Principal', 'ukpartnerstheme' ),
			'menu-2' => esc_html__( 'Superior', 'ukpartnerstheme' ),
        ) );
        
        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
        ) );
        
        // Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'thonet_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
        
        /**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 500,
			'width'       => 500,
			'flex-width'  => true,
			'flex-height' => true,
		) );


		//habilita los excerpt en las paginas
		add_post_type_support( 'page', 'excerpt' );

		//QUITA LOS ESTILOS DE LA GALERÍA POR DEFECTO
		add_filter( 'use_default_gallery_style', '__return_false' );

    }
}

add_action( 'after_setup_theme', 'uk_partners_theme_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function uk_partners_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Barra lateral', 'ukpartnerstheme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Agregar widgets aquí.', 'ukpartnerstheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'ukpartnerstheme' ),
		'id'            => 'footer-sidebar-1',
		'description'   => esc_html__( 'Agregar widgets aquí.', 'ukpartnerstheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'ukpartnerstheme' ),
		'id'            => 'footer-sidebar-2',
		'description'   => esc_html__( 'Agregar widgets aquí.', 'ukpartnerstheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
    ) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'ukpartnerstheme' ),
		'id'            => 'footer-sidebar-3',
		'description'   => esc_html__( 'Agregar widgets aquí.', 'ukpartnerstheme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Single Contacto', 'ukpartnerstheme' ),
		'id'            => 'contact-sidebar',
		'description'   => esc_html__( 'Agregar widgets aquí.', 'ukpartnerstheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}

add_action( 'widgets_init', 'uk_partners_theme_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function uk_partners_theme_scripts() {
	//owlcarousel
	wp_enqueue_style( 'owlcarousel', get_template_directory_uri() . '/assets/css/owl-styles/owl.carousel.min.css', array(), '2.2.1', 'all' );
	//estilo principal del sitio
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );

	//agregar js de owlcarousel
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '1.0', true );

	//agregar js específico del theme
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/assets/js/main-script.js', array('jquery'), '1.0', true );

	wp_localize_script( 'main-script', 'UKPartnersScriptsData', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
	) );

}

add_action( 'wp_enqueue_scripts', 'uk_partners_theme_scripts' );

/**
 * Enqueue scripts and styles for admin.
 */

if ( ! function_exists( 'uk_partners_theme_wp_admin_style_scripts' ) ) {
	/**
	 * enqueue admin style
	 *
	 * @since 1.0
	 *
	 * @uses wp_enqueue_style()
	 */
	function uk_partners_theme_wp_admin_style_scripts() {
        wp_enqueue_style( 'uk_partners_theme-style-admin', get_template_directory_uri() . '/assets/css/admin-style.css', array(), '1.0', 'all' );
		
		//agregar el paquete de media para usar la api
		wp_enqueue_media();

        wp_enqueue_script( 'uk_partners_theme-admin-script', get_template_directory_uri() . '/assets/js/admin-script.js', array('jquery'), '1.0', true );
		
	}
}

add_action( 'admin_enqueue_scripts', 'uk_partners_theme_wp_admin_style_scripts' );


if ( ! function_exists( 'ukpartners_upload_mimes' ) ) {
	/**
	 * HABILITA EL UPLOAD DE SVG
	*/
	function ukpartners_upload_mimes($mimes = array()) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
}
add_filter('upload_mimes', 'ukpartners_upload_mimes');



if ( ! function_exists( 'remove_editor_en_template_home' ) ) {
	/**
	 * quita el editor de wordpress en el template de la pagina de inicio para que no haya errores
	 *
	 * @since 1.0
	 *
	 * @uses get_post_meta()
	 */
	add_action('init', 'remove_editor_en_template_home');

	function remove_editor_en_template_home() {
		if (isset($_GET['post'])) {
			$id = $_GET['post'];
			$pageTemplate = get_post_meta( $id, '_wp_page_template', true );

			if( $pageTemplate == 'page-home.php' || $pageTemplate == 'admin/page-home.php' ) {
				remove_post_type_support('page', 'editor');
			}
		}
	}
}



//Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

//Customizer additions.
//require get_template_directory() . '/inc/customizer.php';

//Custon Posty Types
require get_template_directory() . '/inc/post-type.php';
//meta boxes
require get_template_directory() . '/admin/meta-boxes.php';

//Load settings files.
require get_template_directory() . '/admin/settings.php';

require_once get_template_directory() . '/admin/ajax.php';

require_once  get_template_directory() . '/inc/lib/mobile-detect/Mobile_Detect.php';

/*
 * FUNCIONES DEL TEMA
 */


if ( ! function_exists( 'uk_get_meta_info_resumen' ) ) {
	/**
	 * muestra los meta info resumenes de destinos, cursos y alojamientos
	 *
	 * @since 1.0
	 *
	 * @uses get_post_meta()
	 */
	function uk_get_meta_info_resumen($id) {
		
		$metaInfoResumen = get_post_meta( $id, '_uk_meta_info_resumen', true );
		if ( ( is_array($metaInfoResumen) && !empty($metaInfoResumen) ) || $metaInfoResumen != '' ) :
			ob_start();
			?>
			<div class="meta-resumen-single-post-wrapper">
				<ul class="meta-resumen-list">
					<?php 
					if ( ! is_array($metaInfoResumen) ) {

						echo '<li>'.$metaInfoResumen.'</li>';

					} else {

						foreach ($metaInfoResumen as $info) {
							if ($info != '') {
								echo '<li>'.$info.'</li>';
							}	
						}
					}
					?>
				</ul>
			</div>
			
			<?php
			$metaInfoHtml = ob_get_contents();
			ob_clean();
			return $metaInfoHtml;
		endif; 
	}
}

if ( ! function_exists( 'uk_get_meta_cursos' ) ) {
	/**
	 * muestra los cursos seleccionados que se pueden hacer en ese destino
	 *
	 * @since 1.0
	 *
	 * @uses get_post_meta()
	 */
	function uk_get_meta_cursos($id) {
		$metaCursos = get_post_meta( $id, '_uk_meta_select_cursos', true );

		if (  ! is_array($metaCursos) && $metaCursos != '' ) :
			
			$cursos = explode( ',', $metaCursos );
			ob_start();
			?>
			<h2 class="title-section">
				<?php _e('Cursos', 'ukpartnerstheme'); ?>
			</h2>

			<div class="tabs-wrapper">
				<ul class="tabs-lista">
					<?php
					foreach ($cursos as $curso) {
						if ( $curso != '' ) : 
						$curso = get_post($curso);
						?>

						<li>
							<article class="tab">
								<h1 class="title-tab">
									<?php echo $curso->post_title; ?>
								</h1>
								<div class="contenido-tab">
									<p>
										<?php echo $curso->post_excerpt; ?>
									</p>
									<a href="<?php echo get_permalink($curso->ID); ?>" class="btn btn-borde">
										<?php _e('Leer más', 'ukpartnerstheme'); ?>
									</a>
								</div>
							</article>
						</li>

					<?php endif;
					} ?>
				</ul>
			</div>
			
			<?php
			$metaInfoHtml = ob_get_contents();
			ob_clean();
			return $metaInfoHtml;
		endif; 
	}
}


if ( ! function_exists( 'uk_get_meta_galeria' ) ) {
	/**
	 * muestra la galería de fotos armada
	 *
	 * @since 1.0
	 *
	 * @uses get_post_meta()
	 */
	function uk_get_meta_galeria($id) {
		
		$galeria = get_post_meta( $id, '_uk_galeria_imagenes', true );

		if (  ! is_array($galeria) && $galeria != '' ) :

			$imagenes = explode( ',', $galeria );
			ob_start();
			?>
			<h2 class="title-section">
				<?php _e('Galería de fotos', 'ukpartnerstheme'); ?>
			</h2>

			<div class="carousel-wrapper galeria-fotos">
				<ul class="carousel-lista owl-carousel">
					<?php 
					foreach ($imagenes as $imagen) {
						if ( $imagen != '' ) :
						$urlImagen = wp_get_attachment_image_src($imagen, 'medium');
						?>
						
						<li>
							<article class="item item-imagen-galeria" data-id="<?php echo  $imagen; ?>">
								<div class="item-imagen load-images-ajax">
									<img data-src="<?php echo $urlImagen[0]; ?>">
									<!--<span class="shutter"></span>-->
								</div>

								<!--<div class="item-contenido">
									<h1>
										<?php //echo $destino['titulo']; ?>
									</h1>
									<p class="item-resumen">
										<?php //echo $destino['texto']; ?>
									</p>
								</div>-->
								
							</article>
						</li>

					<?php 
						endif;
					} ?>
					
				</ul>
			</div>
			
			<?php
			$metaInfoHtml = ob_get_contents();
			ob_clean();
			return $metaInfoHtml;
		endif; 
	}
}


if ( ! function_exists( 'uk_get_meta_destinos' ) ) {
	/**
	 * muestra los destinos en los cuales se puede cursar el curso en cuestion
	 *
	 * @since 1.0
	 *
	 * @uses get_post_meta()
	 */
	function uk_get_meta_destinos($id) {
		$destinos = get_post_meta( $id, '_uk_meta_select_destinos', true );

		if ( ! is_array($destinos) && $destinos != '' ) :

			$destinos = explode( ',', $destinos );

			ob_start();
			?>
			<h2 class="title-section">
				<?php _e('Dónde estudiar', 'ukpartnerstheme'); ?>
			</h2>

			<div class="carousel-wrapper">
				<ul class="carousel-lista owl-carousel">
					<?php 
					foreach ($destinos as $destino) {
						if ( $destino != '' ) :
							$destino = get_post($destino);
						?>
							<li>
								<article class="item">
									<span class="tag-destacado">
										<?php 
											echo get_the_tag_list('',' ', '', $destino->ID);
										?>
									</span>

									<a href="<?php echo get_permalink($destino->ID); ?>">
										<div class="item-imagen load-images-ajax">
											<img data-src="<?php echo get_the_post_thumbnail_url($destino->ID, 'medium'); ?>">
											<span class="shutter"></span>
										</div>

										<div class="item-contenido">
											<h1>
												<?php echo $destino->post_title; ?>
											</h1>
											<p class="item-resumen">
												<?php echo $destino->post_excerpt; ?>
											</p>
										</div>
									</a>
								</article>
							</li>
						<?php endif;
					
					} ?>
					
				</ul>
			</div>
			
			<?php
			$metaInfoHtml = ob_get_contents();
			ob_clean();
			return $metaInfoHtml;
		endif; 
	}
}

if ( ! function_exists( 'uk_clean_tel_to_link' ) ) {
	/**
	 * muestra los cursos seleccionados que se pueden hacer en ese destino
	 *
	 * @since 1.0
	 *
	 * @uses get_post_meta()
	 */
	function uk_clean_tel_to_link($tel) {
		if ( strrpos($tel, '+') === false ) {
			$tel = '+' . $tel;

		}

		$tel = trim($tel);
		$tel =  str_replace(' ','',$tel);
		return 'tel:' . $tel;
	}
}


if ( ! function_exists( 'acortaTexto' ) ) {
	/**
	 * Recorta el texto por palabras
	 *
	 * @since 1.0
	 */
	function acortaTexto( $texto, $cantPalabras = 50, $final = null ) {
		if ( null === $final ) {
		$final = '&hellip;';
		}	
		$textoOriginal = $texto;
		
		//quitar html
		$texto = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $texto );
		$texto = strip_tags($texto);
		
		//reducir texto y agregar el final
		$words_array = preg_split( "/[\n\r\t ]+/", $texto, $cantPalabras + 1, PREG_SPLIT_NO_EMPTY );
		$sep = ' ';
		
		//devolver texto reducido
		if ( count( $words_array ) > $cantPalabras ) {
			array_pop( $words_array );
			$texto = implode( $sep, $words_array );
			$texto = $texto . $final;
		} else {
			$texto = implode( $sep, $words_array );
		}
		return $texto;
	}
}


if ( ! function_exists( 'dispositivo' ) ) {
	/**
	 * detecta dispositivo
	 *
	 * @since 1.0
	 */
	function dispositivo() {

		$dispositivo = 'pc';
		$detect = new Mobile_Detect;
		if ( $detect->isMobile() ) {
			$dispositivo = 'movil';
		}
			
		// Any tablet device.
		if( $detect->isTablet() ){
			$dispositivo = 'tablet';
		}

		return $dispositivo;

	}
}

function whatsapp_wp_footer() {
	?>
	<script type="text/javascript">
		var waPhone = '541167395443';
		var href = 'https://wa.me/'+waPhone;
		var wa = document.createElement('a');
			wa.setAttribute('href', href);
			wa.setAttribute('target', '_blank');
			wa.classList.add('btn-wap');
			
			wa.innerHTML='<span class="text">Estamos<br>Online!</span><img src="<?php echo get_template_directory_uri(); ?>/whatsapp-brands.svg">';
		
		document.body.appendChild(wa);
	</script>
	<?php 
}

add_action( 'wp_footer', 'whatsapp_wp_footer' );