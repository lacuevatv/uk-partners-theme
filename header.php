<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Directo al contenido', 'ukpartnerstheme' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Menú superior', 'ukpartnerstheme' ); ?>">
			
			<?php
			global $datosThemes;
			$datosThemes = get_option('uk_partners_theme_settings');
			get_template_part( 'template-parts/header/content', 'barra-sup' ); ?>
			
			<div class="wrap">
				<div class="barra-principal">
					<div class="loader">
						<p>
							<?php _e( 'Bienvenidos', 'ukpartnerstheme' ); ?>
							<span>.</span>
							<span class="animation-blink">.</span>
							<span class="animation-blink-2">.</span>
						</p>
					</div>

					<h1>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<span class="screen-reader-text screen-reader-text-hidden" aria-hidden="true"><?php bloginfo( 'name' ); ?></span>
							<picture>

							<?php 
							$logoSVG = isset($datosThemes['uk_partners_theme_logo_svg']) ? $datosThemes['uk_partners_theme_logo_svg'] : '';
							$logo = isset($datosThemes['uk_partners_theme_logo']) ? $datosThemes['uk_partners_theme_logo'] : '';

							if ( $logoSVG == '' || $logo == '') { ?>
								
									<source srcset="<?php echo IMAGES_DIR ?>logo-uk.svg" type="image/svg+xml">
									<source srcset="<?php echo IMAGES_DIR ?>logo-uk.png,<?php echo IMAGES_DIR ?>logo-uk@2x.png 2x" media="(min-width: 315px)">
									<img class="image-loader" src="<?php echo IMAGES_DIR ?>logo-uk.png" alt="Logo sitio">
							<?php } else { ?>
								<?php if ($logoSVG != ' ') : ?>
								<source srcset="<?php echo $logoSVG; ?>" type="image/svg+xml">
								<?php endif; ?> 
								<?php if ($logo != '') : ?>
								<source srcset="<?php echo $logo; ?>" media="(min-width: 315px)">
								<?php endif; ?> 
								<img class="image-loader" src="<?php echo isset($logo) ? $logo : IMAGES_DIR . 'logo-uk.png'; ?>" alt="Logo sitio <?php bloginfo( 'name' ); ?>">
							<?php } ?>

							</picture>
						</a>
					</h1>

					<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
						<span class="screen-reader-text"><?php
						_e( 'Menú', 'ukpartnerstheme' );
						?></span>
						<span class="tog1"></span>
						<span class="tog2"></span>
						<span class="tog3"></span>
					</button>

					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'primary-menu',
							'container_class'=> 'primary-menu-wrapper',
						) );
					?>
				</div>
			</div><!-- //.wrap -->
		</nav>
	</header><!-- #masthead -->

	<div class="site-content-contain">
		<div id="content" class="site-content">
