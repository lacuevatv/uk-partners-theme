<?php
/**
 * options file.
 * @link https://codex.wordpress.org/Function_Reference/add_options_page
 * 
 * @package WordPress
 * @subpackage uk_partners_theme
 * @since 1.0
 * @version 1.0
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
if ( ! function_exists( 'uk_partners_theme_settings_page' ) ) :
    function uk_partners_theme_settings_page () {
        add_options_page(
		    //título que aparece en la página de opciones
			__('Opcionando el tema','ukpartnerstheme'),
		    //texto que aparece en el link principal del menú
			__('UkPartners-settings','ukpartnerstheme'),
		    //permisos del usuario
			'manage_options',
		    //string que identifica el menu internamente
			'uk_partners_theme_settings',
		    //funcion que imprime html
			'uk_partners_theme_settings_page_html'
		);
    }
endif;

add_action( 'admin_menu', 'uk_partners_theme_settings_page' );

function uk_partners_theme_settings_page_html() {
    ?>
    <div class="uk-settings-page">
		<h1><?php _e('UK Partners Theme - configuración', 'ukpartnerstheme'); ?></h1>

		<form action="options.php" method="POST">
			<?php
			//imprime html necesario para las validaciones
				settings_fields( 'uk_partners_theme_settings_group' );
			?>
			<?php
			//imprime la seccion html del plugin y los campos asociados
				do_settings_sections('uk_partners_theme_settings');
			?>
			<?php
			//imprime el botón de confirmacion
				submit_button();
			?>
		</form>
	</div>

	<?php
}
function uk_partners_theme_settings_api_init() {
	//registramos la seccion
	add_settings_section(
        //tag 'id' de la seccion
        'uk-settings-admin-options',
        //título de la seccion
        __('UK Partners Theme opciones', 'ukpartnerstheme'),
        //funcion que imprime el html de la seccion
        'uk_partners_theme_settings_section_callback_html',
        //slug del menu donde aparece la seccion
        'uk_partners_theme_settings'
    );
    
    //campo para agregar redes
	add_settings_field (
        //texto del tag 'id' del campo
        'uk-settings-admin-options-redes',
        //título del campo
        __('Datos de Contacto', 'ukpartnerstheme'),
        //funcion que imprime el html del input
        'uk_partners_theme_settings_admin_html_redes',
        //slug del menu donde debe aparecer
        'uk_partners_theme_settings',
        //id de la seccion que pertenece
        'uk-settings-admin-options'
    );
    
    //campo para agregar imagen y texto superior
	add_settings_field (
        //texto del tag 'id' del campo
        'uk-settings-admin-options-head',
        //título del campo
        __('Logo', 'ukpartnerstheme'),
        //funcion que imprime el html del input
        'uk_partners_theme_settings_admin_html_head',
        //slug del menu donde debe aparecer
        'uk_partners_theme_settings',
        //id de la seccion que pertenece
        'uk-settings-admin-options'
    );
    
	register_setting(
        //palabra clave igual que se uso en setting fields
        'uk_partners_theme_settings_group',
        //nombre de nuestra opcion dentro de la options API
        'uk_partners_theme_settings'
        //funcion que sanitiza las entradas
        //'minimal_settings_sanitize'
    );
}
add_action( 'admin_init', 'uk_partners_theme_settings_api_init' );
//callback para la seccion
function uk_partners_theme_settings_section_callback_html () {
    _e('Configurar los datos básicos aquí', 'ukpartnerstheme');
}
//funciones que imprimen html de los campos de descripcion superior
function uk_partners_theme_settings_admin_html_head() {
    $UKSettings = get_option('uk_partners_theme_settings');
    $imagenLogoSVG = $UKSettings['uk_partners_theme_logo_svg'];
    $imagenLogo = $UKSettings['uk_partners_theme_logo'];
    
    ?>

    <!-- seccion header -->
    <div class="uk-settings-page-inputs">
        <label for="logo-uk-svg"><?php _e('Logo SVG', 'ukpartnerstheme'); ?></label>
        <input id="logo-uk-svg" name="uk_partners_theme_settings[uk_partners_theme_logo_svg]" type="text" value="<?php echo isset($imagenLogoSVG) ? $imagenLogoSVG : ''; ?>">
        <button type="button" class="button-primary upload-logo-uk">Agregar imagen</button>
    </div>
    <div class="uk-settings-page-inputs">
        <label for="logo-uk"><?php _e('Logo', 'ukpartnerstheme'); ?></label>
        <input id="logo-uk" name="uk_partners_theme_settings[uk_partners_theme_logo]" type="text" value="<?php echo isset($imagenLogo) ? $imagenLogo : ''; ?>">
        <button type="button" class="button-primary upload-logo-uk">Agregar imagen</button>
    </div>
<?php
}
//funciones que imprimen html de los campos de redes sociales
function uk_partners_theme_settings_admin_html_redes() {
    $UKSettings = get_option('uk_partners_theme_settings');
    $telContact = $UKSettings['uk_partners_theme_redes_tel'];
    $emailContact = $UKSettings['uk_partners_theme_redes_email'];
    $facebookSB = $UKSettings['uk_partners_theme_redes_facebook'];
    $instagramSB = $UKSettings['uk_partners_theme_redes_instagram'];
	//$skypeSB = $UKSettings['uk_partners_theme_redes_skype'];
	//$twitterSB = $UKSettings['uk_partners_theme_redes_twitter'];
	//$googlePlusSB = $UKSettings['uk_partners_theme_redes_googleplus'];
	//$linkedinSB = $UKSettings['uk_partners_theme_redes_linkedin'];
	//$githubSB = $UKSettings['uk_partners_theme_redes_github'];
	//$pinterestSB = $UKSettings['uk_partners_theme_redes_pinterest'];
	//$behanceSB = $UKSettings['uk_partners_theme_redes_behance'];
	//$snapchatSB = $UKSettings['uk_partners_theme_redes_snapchat'];
	
	?>

    <!-- redes sociales -->
    <div class="uk-settings-page-inputs">
        <label for="telefono-redes-uk"><?php _e('Teléfono', 'ukpartnerstheme'); ?></label>
        <input id="telefono-redes-uk" name="uk_partners_theme_settings[uk_partners_theme_redes_tel]" type="text" value="<?php echo $telContact; ?>">
    </div>

    <div class="uk-settings-page-inputs">
        <label for="email-redes-uk"><?php _e('Email', 'ukpartnerstheme'); ?></label>
        <input id="email-redes-uk" name="uk_partners_theme_settings[uk_partners_theme_redes_email]" type="email" value="<?php echo $emailContact; ?>">
    </div>

    <div class="uk-settings-page-inputs">
        <label for="facebook-redes-uk"><?php _e('Facebook', 'ukpartnerstheme'); ?></label>
        <input id="facebook-redes-uk" name="uk_partners_theme_settings[uk_partners_theme_redes_facebook]" type="url" value="<?php echo $facebookSB; ?>">
    </div>
    
    <div class="uk-settings-page-inputs">
        <label for="instagram-redes-uk"><?php _e('Instagram', 'ukpartnerstheme'); ?></label>
        <input id="instagram-redes-uk" name="uk_partners_theme_settings[uk_partners_theme_redes_instagram]" type="url" value="<?php echo $instagramSB; ?>">
    </div>
    
    <div class="uk-settings-page-inputs">
        <!--<label for="skype-redes-uk"><?php //_e('Skype', 'ukpartnerstheme'); ?></label>
        <input id="skype-redes-uk" name="uk_partners_theme_settings[uk_partners_theme_redes_skype]" type="text" value="<?php //echo $skypeSB; ?>">
    </div>
    
    <div class="uk-settings-page-inputs">
        <label for="twitter-redes-uk"><?php //_e('Twitter', 'ukpartnerstheme'); ?></label>
        <input id="twitter-redes-uk" name="uk_partners_theme_settings[uk_partners_theme_redes_twitter]" type="url" value="<?php //echo $twitterSB; ?>">
    </div>
    
    <div class="uk-settings-page-inputs">
        <label for="googleplus-redes-uk"><?php //_e('Google Plus', 'ukpartnerstheme'); ?></label>
        <input id="googleplus-redes-uk" name="uk_partners_theme_settings[uk_partners_theme_redes_googleplus]" type="url" value="<?php //echo $googlePlusSB; ?>">
    </div>
    
    <div class="uk-settings-page-inputs">
        <label for="linkedin-redes-uk"><?php //_e('Linkedin', 'ukpartnerstheme'); ?></label>
        <input id="linkedin-redes-uk" name="uk_partners_theme_settings[uk_partners_theme_redes_linkedin]" type="url" value="<?php //echo $linkedinSB; ?>">
    </div>
    
    <div class="uk-settings-page-inputs">
        <label for="github-redes-uk"><?php //_e('GitHub', 'ukpartnerstheme'); ?></label>
        <input id="github-redes-uk" name="uk_partners_theme_settings[uk_partners_theme_redes_github]" type="url" value="<?php //echo $githubSB ; ?>">
    </div>
    
    <div class="uk-settings-page-inputs">
        <label for="pinterest-redes-uk"><?php //_e('Pinterest', 'ukpartnerstheme'); ?></label>
        <input id="pinterest-redes-uk" name="uk_partners_theme_settings[uk_partners_theme_redes_pinterest]" type="url" value="<?php //echo $pinterestSB; ?>">
    </div>
    
    <div class="uk-settings-page-inputs">
        <label for="behance-redes-uk"><?php //_e('Behance', 'ukpartnerstheme'); ?></label>
        <input id="behance-redes-uk" name="uk_partners_theme_settings[uk_partners_theme_redes_behance]" type="url" value="<?php //echo $behanceSB; ?>">
    </div>
    
    <div class="uk-settings-page-inputs">
        <label for="snapchat-redes-uk"><?php //_e('Snapchat', 'ukpartnerstheme'); ?></label>
        <input id="snapchat-redes-uk" name="uk_partners_theme_settings[uk_partners_theme_redes_snapchat]" type="url" value="<?php //echo $snapchatSB; ?>">
    </div>-->
        
<?php
}