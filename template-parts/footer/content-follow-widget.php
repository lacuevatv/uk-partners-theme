<?php
global $datosThemes;
?>
<section class="widget">
    <h2 class="widget-title">
        <?php _e('Seguinos', 'ukpartnerstheme'); ?>
    </h2>
    
    <ul class="follow-us-widget">
    
        <?php if ( isset($datosThemes['uk_partners_theme_redes_facebook']) && $datosThemes['uk_partners_theme_redes_facebook'] != '' ) : ?>

        <li>
            <a href="<?php echo isset($datosThemes['uk_partners_theme_redes_facebook']) ? $datosThemes['uk_partners_theme_redes_facebook'] : '#' ?>" target="_blank" class="icon-follow-us icon-follow-facebook">
                <span class="screen-reader-text screen-reader-text-hidden" aria-hidden="true">
                    Facebook
                </span>
            </a>
        </li>
        <?php endif;
        
        if ( isset($datosThemes['uk_partners_theme_redes_instagram']) && $datosThemes['uk_partners_theme_redes_instagram'] != '' ) : ?>
        
        <li>
            <a href="<?php echo isset($datosThemes['uk_partners_theme_redes_instagram']) ? $datosThemes['uk_partners_theme_redes_instagram'] : '#' ?>" target="_blank" class="icon-follow-us icon-follow-instagram">
                <span class="screen-reader-text screen-reader-text-hidden" aria-hidden="true">
                    <?php _e( 'Instagram', 'ukpartnerstheme' ); ?>
                </span>
            </a>
        </li>
        
        <?php endif; ?>

    </ul>
</section>