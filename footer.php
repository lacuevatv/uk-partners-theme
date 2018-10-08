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
							<?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
						</div>

						<div class="footer-column-wrapper">
							<?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
						</div>

						<div class="footer-column-wrapper">
							<?php dynamic_sidebar( 'footer-sidebar-3' ); ?>
						</div>
					</div>
					
					<div class="footer-logos">
						<ul id="footer-logos" class="owl-carousel">
							<li>
								<a href="#" alt="logo-partners">
									<img src="<?php echo IMAGES_DIR ?>temp/logo1.png">
								</a>
							</li>
							<li>
								<a href="#" alt="logo-partners">
									<img src="<?php echo IMAGES_DIR ?>temp/logo2.png">
								</a>
							</li>
							
						</ul>
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