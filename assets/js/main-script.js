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

/*
* window load
*/
( function( $ ) {

	$(window).on('load', function(){
        //oculta el loader
        loaderOff();
        //carousel de logos en el footer se inicia siempre
        getCarouselFooter();

        //carousel de pagina de inicio
        getCarouselInicio();
        

        //carga las imagenes por ajax
        getLazyImages();

        //inicial los parallax
        initParallax();


    });//window load
    

    /*
     * FUNCIONES
    */
   function loaderOff() {
       $('.loader').fadeOut();
   }//loaderOff()

    function getCarouselFooter() {
        
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
        });
    }//getCarouselFooter()


    function getCarouselInicio() {
        $('#header-inicio-slider').owlCarousel({
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
            loop:true,
            margin:0,
            nav:true,
            navText : ['<span class="icon-arrow icon-arrow-left"></span>','<span class="icon-arrow icon-arrow-right"></span>'],
            responsive:{
                0:{
                    items:1
                },
            }
        });

        $('#testimonio-slider').owlCarousel({
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
            autoHeight: true,
            loop:true,
            margin:10,
            lazyLoad:true,
            nav:true,
            navText : ['<span class="icon-arrow icon-arrow-left-d"></span>','<span class="icon-arrow icon-arrow-right-d"></span>'],
            responsive:{
                0:{
                    items:1
                },
            }
        });
        
        $('#cursos-slider').owlCarousel({
            loop:true,
            margin:0,
            nav:true,
            lazyLoad:true,
            navText : ['<span class="icon-arrow icon-arrow-left-d"></span>','<span class="icon-arrow icon-arrow-right-d"></span>'],
            responsive:{
                0:{
                    items:1
                },
                760:{
                    items:2
                },
                992:{
                    items:4
                }

            }
        });
    }//getCarouselInicio()

    /*
     * carga las imagenes por ajax
    */
    function getLazyImages() {
        $('.load-images-ajax').each(function(){
            var img = $(this).find('img');
        
            $(img).attr('src', $(img).attr('data-src') );
            if ( $(img).attr('src') != '') {
                $(this).fadeIn();
            }
        });
    }


    /*
     *inicia los paralax
    */
    function initParallax() {
        //detiene el parallax en sistemas apple mobiles
        var userAgent = navigator.userAgent || navigator.vendor || window.opera;
        if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            return true;
        }

        $(window).scroll(function(){
            //valor de barra que necesitan todos
            var barra = ($(window).scrollTop());
            
            //arma tu viaje
            var viaje = $('section.uk-arma-viaje').find('.background-section-wrapper img');
            var mover1 = (barra * 1.9 / 100 )+10;

            if (innerWidth<960 && innerWidth>550) {
                mover1 = (barra * 1.9 / 100 )+90;
            }

            if (innerWidth>960) {
                mover1 = (barra * 1.9 / 100 )+50;
            }

            if (innerWidth>1500) {
                mover1 = (barra * 1.9 / 100 )+80;
            }

            $(viaje).css('top',  mover1 + '%'); 

            //alojamiento
            var alojamiento = $('section.uk-alojamiento').find('.background-section-wrapper img');
            var mover2 = (barra * 1.9 / 100 );

            if (innerWidth<500) {
                mover2 = (barra * 1.9 / 100 )-10;
            }

            $(alojamiento).css('top',  mover2 + '%'); 

            //header slider
            var headerBanners = $('header.front-page-header').find('.slider-image img');
            var mover3 = (barra * 1.9 / 100 )+50;
            
            headerBanners.each(function(){
                $(this).css('top',  mover3 + '%'); 
            });
            
        });//scroll
    }//initParallax()

    
    /*
    * IN VIEW ANIMATION
    * loop se usa como true o false, si es true, la animacion se ejecuta siempre, es decir el elemento entra y sale del view y cada vez se ejecuta la animación, en cambio en false solo se ejecuta una vez y luego queda fija
    */
    function startAnimations( clase, loop ) {
        var $animation_elements = $(clase);
        var $window = $(window);

        function check_if_in_view() {
            var window_height = $window.height();
            var window_top_position = $window.scrollTop();
            var window_bottom_position = (window_top_position + window_height);

            $.each($animation_elements, function() {
                var $element = $(this);
                var element_height = $element.outerHeight();
                var element_top_position = $element.offset().top;
                var element_bottom_position = (element_top_position + element_height);

                if ( loop ) {
                    //check to see if this current container is within viewport
                    if ((element_bottom_position >= window_top_position) && (element_top_position <= window_bottom_position)) {
                    $element.addClass('in-view');
                    } else {
                        $element.removeClass('in-view');
                    }
                } else {
                    //check to see if this current container is within viewport
                    if ((element_bottom_position >= window_top_position) && (element_top_position <= window_bottom_position)) {
                        $element.addClass('in-view');
                    }
                }
                
            });

        }//check_if_in_view

        $window.on('scroll resize', check_if_in_view);
        $window.trigger('scroll');
    }//startAnimations()


} )( jQuery );
