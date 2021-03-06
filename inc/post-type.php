<?php
/**
 * Manage post type, taxonomies and metaboxes.
 *
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 */
 
 // If this file is called directly, abort.
 if ( ! defined( 'WPINC' ) ) {
 	die;
 }

/**
 * REGISTER POST TYPE
 * 
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 * 
 * 1.Partners: logos footer. Imagen, titulo
 * 2. Testimonios: Imagen, titulo (nombre), editor.
 * 3. Sliders
 * 4. Crew
 * 5. Destinos
 * 6. Cursos
 * 7. Alojamientos
 * 8. Programas
 * 
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
*/
if ( !function_exists( 'uk_partners_theme_create_post_type' ) ) :
    function uk_partners_theme_create_post_type () {
        /*
         * PARTNERS POST TYPE 
        */
        register_post_type ( 'partners', array (
            'labels'       => array(
                'name'          => __( 'partners', 'ukpartnerstheme' ),
                'singular_name' => __( 'partner', 'ukpartnerstheme' ),
            ),
            'supports'      => array (
                'title', 'excerpt', 'thumbnail'
            ),
            'public'      => true,
            'has_archive' => false,
            'register_meta_box_cb' => 'uk_partners_theme_meta_box_partners',
            'show_in_nav_menus' => false,
            'menu_icon'   => 'dashicons-groups'
            )
        );

        /*
         * TESTIMONIOS POST TYPE 
        */
        register_post_type ( 'testimonios', array (
            'labels'       => array(
                'name'          => __( 'testimonios', 'ukpartnerstheme' ),
                'singular_name' => __( 'testimonio', 'ukpartnerstheme' ),
            ),
            'supports'      => array (
                'title', 'editor'
            ),
            'public'      => true,
            'has_archive' => false,
            'show_in_nav_menus' => false,
            'menu_icon'   => 'dashicons-editor-quote'
            )
        );

        /*
         * SLIDERS POST TYPE 
        */
        register_post_type ( 'sliders', array (
            'labels'       => array(
                'name'          => __( 'sliders', 'ukpartnerstheme' ),
                'singular_name' => __( 'slider', 'ukpartnerstheme' ),
            ),
            'supports'      => array (
                'title', 'editor'
            ),
            'public'      => true,
            'has_archive' => false,
            'show_in_nav_menus' => false,
            'register_meta_box_cb' => 'uk_partners_theme_meta_box_sliders',
            'menu_icon'   => 'dashicons-desktop'
            )
        );

        /*
         * CREW POST TYPE 
        */
        register_post_type ( 'crew', array (
            'labels'       => array(
                'name'          => __( 'crew', 'ukpartnerstheme' ),
                'singular_name' => __( 'crew', 'ukpartnerstheme' ),
            ),
            'supports'      => array (
                'title', 'editor', 'thumbnail'
            ),
            'public'      => true,
            'has_archive' => false,
            'taxonomies' => array('catcrew'),
            'register_meta_box_cb' => 'uk_partners_theme_meta_box_crew',
            'menu_icon'   => 'dashicons-admin-users'
            )
        );


        /*
         * DESTINOS POST TYPE 
        */
        register_post_type ( 'destinos', array (
            'labels'       => array(
                'name'          => __( 'destinos', 'ukpartnerstheme' ),
                'singular_name' => __( 'destino', 'ukpartnerstheme' ),
            ),
            'supports'      => array (
                'title', 'excerpt', 'editor', 'thumbnail',
            ),
            'public'      => true,
            'has_archive' => false,
            'taxonomies' => array('catdestinos', 'post_tag'),
            'rewrite' => array('slug' => __( 'destinos', 'ukpartnerstheme' ),'with_front' => false),
            'menu_icon'   => 'dashicons-location-alt'
            )
        );

        /*
         * CURSOS POST TYPE 
        */
        register_post_type ( 'cursos', array (
            'labels'       => array(
                'name'          => __( 'cursos', 'ukpartnerstheme' ),
                'singular_name' => __( 'curso', 'ukpartnerstheme' ),
            ),
            'supports'      => array (
                'title', 'editor', 'thumbnail', 'excerpt'
            ),
            'public'      => true,
            'has_archive' => false,
            'taxonomies' => array('catcursos', 'post_tag'),
            'rewrite' => array('slug' => __( 'cursos', 'ukpartnerstheme' ),'with_front' => false),
            'menu_icon'   => 'dashicons-welcome-learn-more'
            )
        );

        /*
         * ALOJAMIENTOS POST TYPE 
        */
        register_post_type ( 'alojamientos', array (
            'labels'       => array(
                'name'          => __( 'Alojamientos', 'ukpartnerstheme' ),
                'singular_name' => __( 'Alojamiento', 'ukpartnerstheme' ),
            ),
            'supports'      => array (
                'title', 'editor', 'thumbnail'
            ),
            'public'      => true,
            'has_archive' => false,
            'taxonomies' => array('catalojamientos', 'post_tag'),
            'rewrite' => array('slug' => __( 'alojamientos', 'ukpartnerstheme' ),'with_front' => false),
            'menu_icon'   => 'dashicons-building'
            )
        );


        /*
         * PROGRAMAS POST TYPE 
        */
        register_post_type ( 'programas', array (
            'labels'       => array(
                'name'          => __( 'programas', 'ukpartnerstheme' ),
                'singular_name' => __( 'programa', 'ukpartnerstheme' ),
            ),
            'supports'      => array (
                'title', 'excerpt', 'editor', 'thumbnail',
            ),
            'public'      => true,
            'has_archive' => false,
            'taxonomies' => array('catprogramas', 'post_tag'),
            'rewrite' => array('slug' => __( 'programas', 'ukpartnerstheme' ),'with_front' => false),
            'menu_icon'   => 'dashicons-palmtree'
            )
        );

        


    }//uk_partners_theme_create_post_type()
    
endif;

add_action( 'init', 'uk_partners_theme_create_post_type', 20 );

/**
 * Register privates taxonomies for post type abobe
 *
 * @see register_post_type() for registering post types.
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 * 
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 */
if ( !function_exists( 'uk_partners_theme_register_private_taxonomy' ) ) :
    function uk_partners_theme_register_private_taxonomy () {
         
        /**
         * CATEGORIA ALOJAMIENTOS
        */
        register_taxonomy( 'catalojamientos', 'alojamientos', array(
            'label'        => __( 'Categorías de Alojamientos', 'ukpartnerstheme' ),
            'public'       => true,
            'rewrite'      => false,
            'hierarchical' => true,
            'show_in_nav_menus' => false,
            )
        );

        /**
         * CATEGORIA CURSOS
        */
        register_taxonomy( 'catcursos', 'cursos', array(
            'label'        => __( 'Categorías de Cursos', 'ukpartnerstheme' ),
            'public'       => true,
            'rewrite'      => false,
            'hierarchical' => true,
            'show_in_nav_menus' => false,
            )
        );

        /**
         * CATEGORIA DESTINOS
        */
        register_taxonomy( 'catdestinos', 'destinos', array(
            'label'        => __( 'Categorías de Destinos', 'ukpartnerstheme' ),
            'public'       => true,
            'rewrite'      => false,
            'hierarchical' => true,
            'show_in_nav_menus' => false,
            )
        );

        /**
         * CATEGORIA CREW
        */
        register_taxonomy( 'catcrew', 'crew', array(
            'label'        => __( 'Categorías de Crew', 'ukpartnerstheme' ),
            'public'       => true,
            'rewrite'      => false,
            'hierarchical' => true,
            'show_in_nav_menus' => false,
            )
        );

        /**
         * CATEGORIA PROGRAMAS
        */
        register_taxonomy( 'catprogramas', 'programas', array(
            'label'        => __( 'Categorías de programas', 'ukpartnerstheme' ),
            'public'       => true,
            'rewrite'      => false,
            'hierarchical' => true,
            'show_in_nav_menus' => false,
            )
        );
        
    }
endif;

add_action( 'init', 'uk_partners_theme_register_private_taxonomy' );

// funciones generales //

/**
 * Reset rewrite rules for reentrly added post type and taxonomies.
 *
 * @since 1.0
 */
if ( ! function_exists( 'uk_partners_theme_flush_rewrite_rules' ) ) :
    add_action( 'init', 'uk_partners_theme_flush_rewrite_rules', 90 );

function uk_partners_theme_flush_rewrite_rules() {
	if ( ! get_option( 'uk_partners_theme_flushed_rewrite_rules' ) ) {
		flush_rewrite_rules();
		add_option( 'uk_partners_theme_flushed_rewrite_rules', true );
	}
}
endif;