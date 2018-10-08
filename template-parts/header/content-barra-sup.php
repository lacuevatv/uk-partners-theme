<div class="barra-sup-wrapper">
    
        <div class="redes-w">
            Follow us
            <ul class="icons-sup-wrapper">
                <li>
                    <a href="#" target="_blank">
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
                <li>
                    <a href="#" target="_blank">
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
                <li>
                    <a href="tel:+5491111111111" target="_blank">
                        <span class="screen-reader-text"><?php
                        _e( 'Teléfono', 'ukpartnerstheme' );
                        ?></span>
                        
                            <picture>
                                <source srcset="<?php echo IMAGES_DIR ?>icon-tel.svg" type="image/svg+xml">
                                <source srcset="<?php echo IMAGES_DIR ?>icon-tel.png,<?php echo IMAGES_DIR ?>icon-tel@2x.png 2x" media="(min-width: 315px)">
                                <img src="<?php echo IMAGES_DIR ?>icon-tel.png" alt="Icon-telefono" class="icons-sup">
                            </picture>
                        
                        <span class="texto-iconos">
                            +54 11 4901 8869
                        </span>
                    </a>
                </li>
            </ul>
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