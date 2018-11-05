<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 * @version 1.0
 */

?>

		</div><!-- #content -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<div class="first-footer">
				<div class="wrap">
					<div class="footer-columns">
						<div class="footer-column-wrapper">
							<?php
							global $datosThemes;
							
								if ( isset($datosThemes['uk_partners_theme_footer_seguinos']) && $datosThemes['uk_partners_theme_footer_seguinos'] == 1 ) {
									get_template_part( 'template-parts/footer/content', 'follow-widget' );
								} else {
									dynamic_sidebar( 'footer-sidebar-1' );
								}
							?>
						</div>

						<div class="footer-column-wrapper">
							<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
						</div>

						<div class="footer-column-wrapper">
							<?php
								if (  isset($datosThemes['uk_partners_theme_footer_instagram']) && $datosThemes['uk_partners_theme_footer_instagram'] == 1 && $datosThemes['uk_partners_theme_footer_instagram_script'] != '') {
									get_template_part( 'template-parts/footer/content', 'instagram-loop' );
								} else {
									dynamic_sidebar( 'footer-sidebar-3' );
								}
							?>
						</div>
					</div>
					
					<div class="footer-logos">
					
					<?php $partners = new WP_Query( array('post_type' => 'partners') );
						if ( $partners->have_posts() ) : ?>
							<ul id="footer-logos" class="owl-carousel">
								<?php 
								while ( $partners->have_posts() ) : $partners->the_post();
									//si no hay imagen destacada no lo muestra porque no tiene sentido
									if ( has_post_thumbnail()) :
									$url = get_post_meta( $post->ID, '_url_partner', true );
									$imagen = get_the_post_thumbnail_url();
									?>
									
									<li>
										<a href="<?php echo isseT($url) ? $url : ''; ?>" alt="Uk Partners - "<?php echo get_the_title(); ?>>
											<img src="<?php echo $imagen; ?>">
										</a>
									</li>

									<?php endif;
								
								endwhile; ?>
								
							</ul>
						
						<?php endif; ?>
					
					</div>
				</div><!-- .wrap -->
			</div><!-- .first-footer -->
				
			
			<div class="second-footer">
				<div class="wrap">
					<p class="legales-sitio">
						<?php _e('Desarrollo por', 'ukpartnerstheme'); ?> <a href="#">Natalia Costanzo</a>
					</p>
				</div><!-- .wrap -->
			</div><!-- .second-footer -->

			
		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>