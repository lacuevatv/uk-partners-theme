<?php
/**
 * Back compat functionality
 *
 * Prevents the theme from running on WordPress versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 */

/**
 * Prevent switching to uk_partners_theme on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since 1.0
 */
function uk_partners_theme_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'uk_partners_theme_upgrade_notice' );
}
add_action( 'after_switch_theme', 'uk_partners_theme_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * uk_partners_theme on WordPress versions prior to 4.7.
 *
 * @since 1.0
 *
 * @global string $wp_version WordPress version.
 */
function uk_partners_theme_upgrade_notice() {
	$message = sprintf( __( 'Se necesita una version mayor a 4.7. Su actual version es %s. Actualize e intente nuevamente.', 'ukpartnerstheme' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.7.
 *
 * @since 1.0
 *
 * @global string $wp_version WordPress version.
 */
function uk_partners_theme_customize() {
	wp_die( sprintf( __( 'Se necesita una version mayor a 4.7. Su actual version es %s. Actualize e intente nuevamente.', 'ukpartnerstheme' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'uk_partners_theme_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.7.
 *
 * @since 1.0
 *
 * @global string $wp_version WordPress version.
 */
function uk_partners_theme_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Se necesita una version mayor a 4.7. Su actual version es %s. Actualize e intente nuevamente.', 'ukpartnerstheme' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'uk_partners_theme_preview' );