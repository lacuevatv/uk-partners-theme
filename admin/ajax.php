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


/*
    add_action( 'wp_ajax_thonet_load_products_menu', 'thonet_load_products_menu_callback' );
    add_action( 'wp_ajax_nopriv_thonet_load_products_menu', 'thonet_load_products_menu_callback' );

    if ( ! function_exists( 'thonet_load_products_menu_callback' ) ) :

        function thonet_load_products_menu_callback() {
            
            //el id de la categoría
            $cat_Id = $_POST['cat'];
            //query que busca los productos
            $product_query = new WP_Query( array(
                    'post_type'      => 'product',
                    'post_status'  => 'publish',
                    'posts_per_page' => -1,//todos los productos
                    'tax_query' => array(
                    'relation' => 'OR',
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'id',
                            'terms'    => array( $_POST['cat'] ),
                        ),
                     ),
                )
            );

            $thumbnail_id = get_woocommerce_term_meta( $cat_Id, 'thumbnail_id', true );
            $image = wp_get_attachment_url( $thumbnail_id );

            // The Loop
            if ( $product_query->have_posts() ) : ?>
                
                <div class="sub-menu-productos-ajax-wrapper" id="<?php echo 'CatID-'.$cat_Id; ?>">
                    <div class="sub-menu-left-ajax">
                        <?php if ( $image ) { ?> 
                        <img src="<?php echo esc_url($image); ?>" alt="Thonet & Vander">
                        <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/menu-ajax.jpg" alt="Thonet & Vander">
                        <?php } ?>
                    </div>
                    <div class="sub-menu-right-ajax">

                <?php
                while ( $product_query->have_posts() ) : $product_query->the_post();
                    ?>
                    
                        <div class="sub-menu-producto-ajax">
                    
                    <?php
                        //titulo del producto + url                    
                        the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><span>', '</span>');
                    
                        //imagen del producto
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail('full', array( 'class' => 'entri-img') ); 
                        } else {
                            echo '<img src="' .get_template_directory_uri(). '/assets/images/placeholder.png">';
                        }
                        $textoHover = get_post_meta( get_the_ID(), '_thonet_menu_hover_product', true );
                        $conectores = get_post_meta( get_the_ID(), '_thonet_conectores_checkbox_product', true );
                        $bluetooth = $conectores[0];
                        ?>
                            <div class="hover-menu-content-wrapper">
                                <?php if ( $textoHover[0] != '' || $textoHover[1] != '' ) { ?>
                                <div class="hover-menu-content-text">
                                    <strong>
                                        <?php echo $textoHover[0]; ?>
                                    </strong>
                                    <em>
                                        <?php echo $textoHover[1]; ?>
                                    </em>
                                </div>
                                <?php } ?>
                                
                                <?php if ( $bluetooth == 'on' ) { ?>
                                <div class="hover-menu-content-bluetooth">
                                    <i class="fa fa-bluetooth-b" aria-hidden="true"></i>
                                </div>
                                <?php } ?>

                            </div>
                            </a>
                        </div>
                    <?php
                endwhile; ?>

                    </div>

                <?php wp_reset_postdata();

            else : 
                ?>
                <div class="sub-menu-productos-ajax-wrapper" id="<?php echo 'CatID-'.$cat_Id; ?>">
                    <?php _e( '<p>No hay ningún producto cargado</p>', 'thonet' ); ?>
                </div>
                <?php
            endif;

            exit();
            
        }

    endif;//thonet_load_products_menu_callback()
    */

endif; //doing ajax