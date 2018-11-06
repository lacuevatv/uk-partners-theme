<?php
/**
 * Template Name: About Page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 * @version 1.0
 */

get_header();

if ( have_posts() ) :  the_post() ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header page-header">
				<div class="header-image">
					<?php 
                    if ( has_post_thumbnail()) {
                        the_post_thumbnail(); 
                    } else {
                        echo '<picture>';
                            echo '<source srcset="' . IMAGES_DIR . 'headermobile-default.jpg" media="(max-width: 769px)">';
                            echo '<img src="' . IMAGES_DIR . 'header-default.jpg" alt="'. get_the_title() . ' - ' .get_bloginfo('name').'">';
                        echo '</picture>';
                    }
                    ?> 
                    <span class="shutter"></span> 
				</div>
				
				<div class="wrap">
					<?php the_title( '<h1 class="entry-title page-title-header">', '</h1>' ); ?>
				</div>
				
			</header><!-- .entry-header -->
			<div class="entry-content page-content-wrapper">
				<div class="wrap">
					<div class="main-content-editor">
					
						<?php the_content(); ?>

					</div>
				</div>
				
				<section class="crew-section">
					<div class="wrap">
					
					<!--destacados -->
						<?php
						$crewDestacado = new WP_Query( array(
								'post_type' => 'crew',
								'tax_query' => array(
									array(
										'taxonomy' => 'catcrew',
										'field'    => 'category_name',
										'terms'    => 'destacado',
										),
									),
								)
							);
							
						if ( $crewDestacado->have_posts() ) : ?>
				
						<ul class="crew-list jefes">
						
							<?php while ( $crewDestacado->have_posts() ) : $crewDestacado->the_post();
							$nombre = get_the_title();
							$parrafo = get_the_content();
							$cargo = get_post_meta( $post->ID, '_crew', true );
							
							if ( has_post_thumbnail()) {
								$imagen = get_the_post_thumbnail(); 
							} else {
								$imagen = IMAGES_DIR . 'default_persona.png';
							}

							?>
							
							<li>
								<article class="crew-item" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="image-crew load-images-ajax">
											<img data-src="<?php echo $imagen; ?>" alt="Sobre Uk Partners">
										</picture>
									</div>
									<h1>
										<?php echo $nombre; ?>
									</h1>
									<h2>
										<?php echo $cargo; ?>
									</h2>
									
									<?php echo $parrafo; ?>
									
								</article>
							</li>
						
							<?php endwhile; ?>
						
						</ul>

						<?php endif; ?>
						<?php wp_reset_postdata(); ?>

						<!--otros -->
						<?php
							$crew = new WP_Query( array(
									'post_type' => 'crew',
									'tax_query' => array(
										array(
											'taxonomy' => 'catcrew',
											'field'    => 'category_name',
											'operator' => 'NOT IN',
											'terms'    => 'destacado',
											),
										),
									)
								);
								
						if ( $crew->have_posts() ) : ?>
						
						<h3 class="title-section">
							Nuestro equipo
						</h3>
						<ul class="crew-list">
						
							<?php while ( $crew->have_posts() ) :$crew->the_post();
							$nombre = get_the_title();
							$parrafo = get_the_content();
							$cargo = get_post_meta( $post->ID, '_crew', true );
							if ( has_post_thumbnail()) {
								$imagen = get_the_post_thumbnail(); 
							} else {
								$imagen = IMAGES_DIR . 'default_persona.png';
							}
							?>
								
							<li>
								<article class="crew-item" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="image-crew load-images-ajax">
											<img data-src="<?php echo $imagen; ?>" alt="Sobre Uk Partners">
										</picture>
									</div>
									<h1>
										<?php echo $nombre; ?>
									</h1>
									<h2>
										<?php echo $cargo; ?>
									</h2>
									
									<?php echo $parrafo; ?>
									
								</article>
							</li>
						
							<?php endwhile; ?>
						
						</ul>

						<?php endif; ?>
					
					</div>

				</section>
			</div><!-- .entry-content -->
		</div><!-- #post-## -->
	</div>
</main>

<?php endif;
get_footer();