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
 * Twenty Seventeen only works in WordPress 4.7 or later.
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


add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * ADITIONALS
*/
//habilita los svg

function ukpartners_upload_mimes($mimes = array()) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'ukpartners_upload_mimes');


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

//require_once get_template_directory() . '/admin/ajax.php';


/**
 * DATA QUE REMPLAZA LA BD POR AHORA
*/

global $sliders_databd;
$sliders_databd = array(
    array(
		'titulo' => 'Viajes de estudio a Londres.',
		'texto-boton' => 'Más información',
		'target' => '_self',
		'texto' => 'Todo lo que siempre imaginaste... y más.',
		'image' => IMAGES_DIR . 'temp/header1.jpg',
        'image-mobile' => IMAGES_DIR . 'temp/header1-mobile.jpg',
        'url' => '#',
        
        
	),
	array(
        'titulo' => 'Arma tu viaje',
        'image' => IMAGES_DIR . 'temp/header2.jpg',
        'image-mobile' => IMAGES_DIR . 'temp/header2-mobile.jpg',
        'texto' => 'Podés viajar solo en cualquier momento del año y por el tiempo que quieras y al destino que quieras',
        'url' => '#',
        'target' => '_self',
        'texto-boton' => 'Más información',
    ),
);

global $testimonios_databd;
$testimonios_databd = array(
    array(
        'nombre' => 'Pili Candria',
        'image' => IMAGES_DIR . 'temp/persona.png',
        'texto' => 'El viaje fue increíble. No paramos un minuto, los coordinadores no querían que nos perdiéramos nada de lo que había para contarnos y mostrarnos. Hicimos mil actividades distintas, siempre había algo más para ver. Además, como estábamos yendo a las clases, podíamos disfrutar más las salidas. La profesora organizaba las clases según las actividades que teníamos en el día, y hacía que entendiéramos lo que íbamos a ver a la tarde. Fue genial haber conocido Inglaterra así.',
	),
	array(
        'nombre' => 'Nati Apellido',
        'image' => IMAGES_DIR . 'default_persona.png',
        'texto' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.',
    ),
);

global $destinos_databd;
$destinos_databd = array(
    array(
        'titulo' => 'Edimburgo',
        'image' => IMAGES_DIR . 'temp/edinburgo.jpg',
		'texto' => '',
		'url' => '#',
		'destacado' => false,
	),
	
	array(
        'titulo' => 'Oxford',
        'image' => IMAGES_DIR . 'temp/oxford.jpg',
		'texto' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.',
		'url' => '#',
		'destacado' => true,
	),
	
	array(
        'titulo' => 'Torquay',
        'image' => IMAGES_DIR . 'temp/torquay.jpg',
		'texto' => '',
		'url' => '#',
		'destacado' => false,
	),

	array(
        'titulo' => 'Dublin',
        'image' => IMAGES_DIR . 'temp/dublin.jpg',
		'texto' => '',
		'url' => '#',
		'destacado' => false,
	),

	array(
        'titulo' => 'New York',
        'image' => IMAGES_DIR . 'temp/newyork.jpg',
		'texto' => '',
		'url' => '#',
		'destacado' => false,
	),

	array(
        'titulo' => 'Más Lugares',
        'image' => IMAGES_DIR . 'default_destinos.png',
		'texto' => '',
		'url' => '#',
		'destacado' => false,
	),
);

global $cursos_databd;
$cursos_databd = array(
    array(
        'titulo' => 'General English',
        'image' => IMAGES_DIR . 'temp/curso2.jpg',
		'texto' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.',
		'url' => '#',
		'destacado' => false,
	),
	array(
        'titulo' => 'Teachers training',
        'image' => IMAGES_DIR . 'temp/curso1.jpg',
		'texto' => '',
		'url' => '#',
		'destacado' => true,
	),
	array(
        'titulo' => 'Family English',
        'image' => IMAGES_DIR . 'default_cursos.png',
		'texto' => '',
		'url' => '#',
		'destacado' => false,
	),
	array(
        'titulo' => 'University Fundation Programme',
        'image' => IMAGES_DIR . 'default_cursos.png',
		'texto' => '',
		'url' => '#',
		'destacado' => false,
	),
	array(
        'titulo' => 'Kids Choice English',
        'image' => IMAGES_DIR . 'default_cursos.png',
		'texto' => '',
		'url' => '#',
		'destacado' => false,
    ),
);

global $crewJefes_databd;
$crewJefes_databd = array(
    array(
		'titulo' => 'Hernan Piazzo.',
		'charge' => '',
		'image' => IMAGES_DIR . 'temp/crew1.png',
        'texto' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.',
	),
	array(
		'titulo' => 'Hernan Piazzo.',
		'charge' => '',
		'image' => IMAGES_DIR . 'temp/crew1.png',
        'texto' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.',
	),
);

global $crew_databd;
$crew_databd = array(
    array(
		'titulo' => 'Mariel Gonzalez',
		'charge' => 'Operation Manager',
		'image' => IMAGES_DIR . 'temp/crew2.png',
        'texto' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.',
	),
	array(
		'titulo' => 'Mariana U',
		'charge' => '',
		'image' => IMAGES_DIR . 'default_persona.png',
        'texto' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.',
	),
	array(
		'titulo' => 'Hernan Piazzo',
		'charge' => '',
		'image' => IMAGES_DIR . 'temp/crew3.png',
        'texto' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.',
	),
	array(
		'titulo' => 'Mariana U',
		'charge' => '',
		'image' => IMAGES_DIR . 'default_persona.png',
        'texto' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.',
	),
	array(
		'titulo' => 'Mariel Gonzalez',
		'charge' => 'Operation Manager',
		'image' => IMAGES_DIR . 'temp/crew2.png',
        'texto' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.',
	),
	array(
		'titulo' => 'Mariana U',
		'charge' => '',
		'image' => IMAGES_DIR . 'default_persona.png',
        'texto' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.',
	),
	array(
		'titulo' => 'Hernan Piazzo',
		'charge' => '',
		'image' => IMAGES_DIR . 'temp/crew3.png',
        'texto' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.',
	),
	array(
		'titulo' => 'Mariana U',
		'charge' => '',
		'image' => IMAGES_DIR . 'default_persona.png',
        'texto' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut minim veniam.',
	),
);