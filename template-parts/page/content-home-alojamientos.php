<?php 
global $alojamientoData;
$titulo = $alojamientoData[1];
$mini_text = $alojamientoData[2];
$texto_btn = $alojamientoData[3];
$url = $alojamientoData[4];
$target = $alojamientoData[5];
$texto = $alojamientoData[6];
$imagen = $alojamientoData[7];
$imagenMovil = $alojamientoData[8];

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
<!-- **********ALOJAMIENTOS********* -->
<section class="uk-alojamiento">
    <div class="background-section-wrapper load-images-ajax">
        <picture>
            <source srcset="<?php echo esc_url($imagenMovil); ?>" media="(max-width: 769px)">
            <img data-src="<?php echo esc_url($imagen); ?>" alt="<?php esc_html_e($titulo); ?>">
        </picture>
        <span class="shutter"></span>
    </div>

    <div class="section-content">
        <div class="wrap">
            <h2 class="title-section">
                <?php esc_html_e($titulo); ?>
            </h2>
            <h5 class="subtitle-section">
                <?php esc_html_e($mini_text); ?>
            </h5>
            <p class="sub-line">
                <?php esc_html_e($texto); ?>
            </p>

            <a href="<?php echo esc_url($url); ?>" <?php if ($target == '1') {echo 'target="_blank"'; } ?> class="btn btn-naranja">
                <?php esc_html_e($texto_btn); ?>
            </a>
        </div><!-- .wrap -->
    </div><!-- .section-content -->

</section>