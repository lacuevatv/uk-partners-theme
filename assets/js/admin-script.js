jQuery(function($){
    
    $(document).on( 'click', '.upload-logo-uk', function( event ){

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

    $(document).on( 'click', '.upload-images', function( event ){

        event.preventDefault();
        //variables:
        var contenedor = this.closest('.metabox_input_data');
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

    //metaboxes: checkbox
    $('input[type=checkbox]').click(function(){
        if ( $(this).attr('checked') == 'checked' ) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });


    //SUBE MUCHAS IMAGENES PARA LA GALERÍA
    $(document).on( 'click', '.upload-imagenes', function( event ){

        event.preventDefault();
        //variables:
        var contenedor = this.closest('.metabox_input_data');
        var input = $(contenedor).find('input');

        var frame;
        
        // Create a new media frame
        frame = wp.media({
            title: 'Seleccionar o subir medio',
            button: {
            text: 'Usar éste medio'
            },
            multiple: true  // Set to true to allow multiple files to be selected
        });

        // When an image is selected in the media frame...
        frame.on( 'select', function() {
            var selecionados;
            //toma los detalles de la imagen seleccionada
            //var attachment = frame.state().get('selection').first().toJSON();
            var selection = frame.state().get('selection');
            selection.map( function( attachment ) {
            attachment = attachment.toJSON();
            
            input.val( input.val()+attachment.id+',');
            
            });
            
        });

        // Finally, open the modal on click
        frame.open();
    });


    //guarda los cursos en un input al ser seleccionados
    $(document).on('click', '.input_cursos', function(e) {
        var idCurso = $(this).attr('data-id');
        var inputCursos = $('#cursos_id');
        var cursosValores = $(inputCursos).val();
        if ( $(this).attr('checked') ) {
            //si es chequeado se agrega al inputCursos

            //busca a ver si ya esta agregado y si esta no hace nada
            if ( cursosValores.indexOf(idCurso) == '-1' ) {
                cursosValores = cursosValores + idCurso + ',';
            }

        } else {
            //Si se desmarca hay que borrarlo
            
            if ( cursosValores.indexOf(idCurso) != '-1' ) {
                cursosValores = cursosValores.replace( idCurso+',' , '' );
            }

        }

        $(inputCursos).val(cursosValores);
    });


    //guarda los destinos en un input al ser seleccionados
    $(document).on('click', '.input_destinos', function(e) {
        var idDestino = $(this).attr('data-id');
        var inputDestinos = $('#destinos_id');
        var destinosValores = $(inputDestinos).val();
        if ( $(this).attr('checked') ) {
            //si es chequeado se agrega al inputCursos

            //busca a ver si ya esta agregado y si esta no hace nada
            if ( destinosValores.indexOf(idDestino) == '-1' ) {
                destinosValores = destinosValores + idDestino + ',';
            }

        } else {
            //Si se desmarca hay que borrarlo
            
            if ( destinosValores.indexOf(idDestino) != '-1' ) {
                destinosValores = destinosValores.replace( idDestino+',' , '' );
            }

        }

        $(inputDestinos).val(destinosValores);
    });

    

});