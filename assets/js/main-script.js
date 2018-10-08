/**
 * File mains-script.js.
 *
 * @ver 1.0
 --------------------------------------------------------------
>>> TABLE OF CONTENTS:

--------------------------------------------------------------*/


//document ready
( function( $ ) {

    $(document).on('ready', function() {
        $(document).on('click', '.menu-toggle', function(){
            $(this).toggleClass('menu-toggle-open');

            var menu = $('.primary-menu-wrapper');

            if ( $(menu).height() == 0 ) {
                var h = $(menu).prop('scrollHeight')
                $(menu).css('height', h + 'px');
            } else {
                $(menu).css('height', 0);
            }
        });

    });//document-ready


    /*
    * scroll to id
    * se pasa con numeral #LINK
    */
    function scrollToID ( id ) {
        $('html, body').stop().animate({
            scrollTop: $(id).offset().top -90
        }, 'slow');
    }

} )( jQuery );

//8window load
( function( $ ) {

	$(window).on('load', function(){
        //carousel de logos en el footer
        $('#footer-logos').owlCarousel({
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
            loop:true,
            margin:10,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                500:{
                    items:2
                },
                760:{
                    items:3
                },
                992:{
                    items:5
                }

            }
        })
	});//window load
} )( jQuery );
