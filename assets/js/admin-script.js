jQuery(function($){
    console.log('admin')
    $(document).on( 'click', '#upload-logo-uk', function( event ){

        event.preventDefault();
        //variables:
        var contenedor = this.closest('.uk-settings-page-inputs');
        var input = $(contenedor).find('input');

        var frame;

        // Create a new media frame
        frame = wp.media({
            title: 'Seleccionar o subir medio',
            button: {
            text: 'Usar éste medio'
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });

        // When an image is selected in the media frame...
        frame.on( 'select', function() {
            //toma los detalles de la imagen seleccionada
            var attachment = frame.state().get('selection').first().toJSON();
            input.val(attachment.url);   
        });

        // Finally, open the modal on click
        frame.open();
    });


});