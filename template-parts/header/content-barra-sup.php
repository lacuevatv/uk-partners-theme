<?php
global $datosThemes;
?>
<div class="barra-sup-wrapper">
    
    <div class="redes-w">
        <?php if ( ( isset($datosThemes['uk_partners_theme_redes_facebook']) && $datosThemes['uk_partners_theme_redes_facebook'] != '' ) || ( isset($datosThemes['uk_partners_theme_redes_instagram']) && $datosThemes['uk_partners_theme_redes_instagram'] != '' ) || ( isset($datosThemes['uk_partners_theme_redes_tel']) && $datosThemes['uk_partners_theme_redes_tel'] != '' ) ) : ?>

        Follow us
        
        <ul class="icons-sup-wrapper">
            <?php if ( isset($datosThemes['uk_partners_theme_redes_facebook']) && $datosThemes['uk_partners_theme_redes_facebook'] != '' ) : ?>
                <li>
                    <a href="<?php echo isset($datosThemes['uk_partners_theme_redes_facebook']) ? $datosThemes['uk_partners_theme_redes_facebook'] : '#' ?>" target="_blank">
                        <span class="screen-reader-text"><?php
                        _e( 'Facebook', 'ukpartnerstheme' );
                        ?></span>
                        
                            <picture>
                                <source srcset="<?php echo IMAGES_DIR ?>icon-face.svg" type="image/svg+xml">
                                <source srcset="<?php echo IMAGES_DIR ?>icon-face.png,<?php echo IMAGES_DIR ?>icon-face@2x.png 2x" media="(min-width: 315px)">
                                <img src="<?php echo IMAGES_DIR ?>icon-face.png" alt="icon-facebook" class="icons-sup">
                            </picture>
                        
                    </a>
                </li>
            <?php endif;
            
            if ( isset($datosThemes['uk_partners_theme_redes_instagram']) && $datosThemes['uk_partners_theme_redes_instagram'] != '' ) : ?>
                <li>
                    <a href="<?php echo isset($datosThemes['uk_partners_theme_redes_instagram']) ? $datosThemes['uk_partners_theme_redes_instagram'] : '#' ?>" target="_blank">
                        <span class="screen-reader-text"><?php
                        _e( 'Instagram', 'ukpartnerstheme' );
                        ?></span>
                        
                            <picture>
                                <source srcset="<?php echo IMAGES_DIR ?>icon-inst.svg" type="image/svg+xml">
                                <source srcset="<?php echo IMAGES_DIR ?>icon-inst.png,<?php echo IMAGES_DIR ?>icon-inst@2x.png 2x" media="(min-width: 315px)">
                                <img src="<?php echo IMAGES_DIR ?>icon-inst.png" alt="icon-instagram" class="icons-sup">
                            </picture>
                        
                    </a>
                </li>
            <?php endif;

            if ( isset($datosThemes['uk_partners_theme_redes_tel']) && $datosThemes['uk_partners_theme_redes_tel'] != '' ) : ?>

                <li>                        
                    <a href="<?php echo uk_clean_tel_to_link($datosThemes['uk_partners_theme_redes_tel']); ?>" target="_blank">
                        <span class="screen-reader-text"><?php
                        _e( 'Teléfono', 'ukpartnerstheme' );
                        ?></span>
                        
                            <picture>
                                <source srcset="<?php echo IMAGES_DIR ?>icon-tel.svg" type="image/svg+xml">
                                <source srcset="<?php echo IMAGES_DIR ?>icon-tel.png,<?php echo IMAGES_DIR ?>icon-tel@2x.png 2x" media="(min-width: 315px)">
                                <img src="<?php echo IMAGES_DIR ?>icon-tel.png" alt="Icon-telefono" class="icons-sup">
                            </picture>
                        
                        <span class="texto-iconos">
                            <?php echo $datosThemes['uk_partners_theme_redes_tel']; ?>
                        </span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>

        <?php endif; ?>
    </div>
    
    <?php
    wp_nav_menu( array(
        'theme_location' => 'menu-2',
        'menu_id'        => 'sup-menu',
        'menu_class'     => 'sup-menu',
        'container_class'=> 'sup-menu-wrapper',
    ) );
    ?>
    
</div>