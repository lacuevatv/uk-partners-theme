<?php 
global $separadorData;
$titulo = $separadorData[1];
$texto_btn = $separadorData[2];
$url = $separadorData[3];
$target = $separadorData[4];
$texto = $separadorData[5];
$imagen = $separadorData[6];
$imagenMovil = $separadorData[7];

if ( $imagen == '' ) {
    $imagen = IMAGES_DIR . 'header-default.jpg';
}
if ( $imagenMovil == '' ) {
    if ( $imagen != '' ) {
        $imagenMovil = $imagen;
    } else {
        $imagenMovil = IMAGES_DIR . 'headermobile-default.jpg';
    }   
}

?>
<!-- **********ARMA VIAJE********* -->
<section class="uk-arma-viaje">
    <div class="background-section-wrapper load-images-ajax">
        <picture>
            <source srcset="<?php echo esc_url($imagen_movil); ?>" media="(max-width: 769px)">
            <img data-src="<?php echo esc_url($imagen); ?>; ?>" alt="<?php _e('Arma tu viaje', 'ukpartnerstheme'); ?>">
        </picture>
        <span class="shutter"></span>
    </div>

    <div class="section-content">

        <div class="wrap">
            <h2 class="title-section">
                <?php esc_html_e($titulo); ?>
            </h2>
            <p class="sub-line">
                <?php esc_html_e($texto); ?>
            </p>

            <a href="<?php echo esc_url($url); ?>" <?php if ($target == '1') {echo 'target="_blank"'; } ?> class="btn btn-verde">
                <?php esc_html_e($texto_btn); ?>
            </a>

        </div><!-- .wrap -->
    </div><!-- .section-content -->
</section>