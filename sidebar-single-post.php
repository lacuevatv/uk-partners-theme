<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 * @version 1.0
 */

if ( ! is_active_sidebar( 'single-post' ) ) {
	return;
}
?>
<aside id="single-sidebar" class="single-sidebar widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Barra lateral', 'ukpartnerstheme' ); ?>">
	<?php dynamic_sidebar( 'single-post' ); ?>
</aside><!-- #single-sidebar -->