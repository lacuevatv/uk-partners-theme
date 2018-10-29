/**
 * File mains-script.js.
 *
 * @ver 1.0
 --------------------------------------------------------------
>>> TABLE OF CONTENTS:
1. READY: ejecuta lo más basico
2. LOAD: ejecuta lo que necesita que este cargado primero, carouseles, parallax, etc
3. Funciones varias
--------------------------------------------------------------*/
var is_alojamientos, is_home;


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

        //muestra el formulario en el movil, formulario que está en el sidebar
        toggleButonSingleContact();
        
    });//document-ready


    /*
    * window load
    */
	$(window).on('load', function(){
        //oculta el loader
        setTimeout(function(){
            loaderOff();
        },10);
        
        //carousel de logos en el footer se inicia siempre
        getCarouselFooter();

        //inicia parallax de los headers en las paginas
        initParallaxHeader();

        /*
         * pagina de inicio
        */
        if (is_home) {
            //todos los carouseles de pagina de inicio
            getCarouselInicio();    

            //carga las imagenes por ajax
            getLazyImages();

            //inicial los parallax
            initParallax();
        }

        //carousel de destinos o galería de imagen en single post
        getCarouselSinglePost(); 
        //acordeon de cursos en single post
        initTabs();
        

        /*
         * pagina de alojamientos
        */
        if (is_alojamientos) {
            //inicia la barra lateral fixed
            initSingleBarContactFixed();
        }


    });//window load
    

    /*
     * FUNCIONES
    */


     /*
    * scroll to id
    * se pasa con numeral #LINK
    */
    function scrollToID ( id ) {
        $('html, body').stop().animate({
            scrollTop: $(id).offset().top -90
        }, 'slow');
    }

   function loaderOff() {
       
        $('.loader').addClass('loader-off');
        $('.barra-principal').find('h1 img').removeClass('image-loader');
       
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


    function getCarouselSinglePost() {
        $('.carousel-lista').owlCarousel({
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:true,
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
                    items:3
                },
                1200:{
                    items:4
                }
            }
        });
    }//getCarouselSinglePost()

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
     *inicia los paralax del front page
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
     *inicia los paralax de los headers
    */
    function initParallaxHeader() {
        
        var userAgent = navigator.userAgent || navigator.vendor || window.opera;
        if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
            return true;
        }

        $(window).scroll(function(){
            //valor de barra que necesitan todos
            var barra = ($(window).scrollTop());
            var headerImg = $('.page-header').find('img');
            var mover = (barra * 1.9 / 100 )+50;

            $(headerImg).css('top',  mover + '%'); 
        });
    }//initParallaxHeader()
    
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

    function toggleButonSingleContact() {
        $(document).on('click', '.toggle-buton-single-contact', function(){
            var form = $('.wrapper-contact-form');

            if ( $(form).height() == 0 ) {
                var h = $(form).prop('scrollHeight')
                $(form).css('height', h + 'px');
            } else {
                $(form).css('height', 0);
            }
        });
    }
    
    function initTabs() {
        $(document).on('click', '.title-tab', function(){
            
            var article = $(this).closest('article')
            var tab = $(article).find('.contenido-tab');

            if ( $(tab).height() == 0 ) {
                var h = $(tab).prop('scrollHeight')
                $(tab).css('height', h + 'px');
            } else {
                $(tab).css('height', 0);
            }
        });
    }


    function initSingleBarContactFixed() {
        //debe funcionar si es mayor a 992, porque sino la barra no existe
        if (window.innerWidth > 992) {

            //el sidebar a mover
            var sidebar = $('.wrapper-contact-form');
            var sidebarWidth = $(sidebar).innerWidth();
            //el contenedor
            var contenedor = $('.site-main');
            var padding = 150;
            //el limite superior
            var siteHeader = $('.site-header');
            var header = $('.header-image');
            var alturaHeader = siteHeader.height() + header.height();
            
            //el limite inferior
            var footer = $('.site-footer');
            var footer_height = footer.outerHeight();
            var footer_top_position = footer.offset().top;
            var footer_bottom_position = (footer_top_position + footer_height);
            

            $(window).scroll(function(){
                //valor de barra que necesitan todos
                var barra = ($(window).scrollTop());
                var window_height = $(window).height();
                var window_top_position = barra;
                var window_bottom_position = (window_top_position + window_height);
                
                if ( ( barra > (alturaHeader-35) ) ) {   
                    //si cruza el limite superior se hace fixed:
                    $(sidebar).css('position', 'fixed')
                    $(sidebar).css('width', sidebarWidth + 'px')
                    if (window.innerHeight < 650) {
                        $(sidebar).css('top',  '5%'); 
                    } else {
                        $(sidebar).css('top',  '10%'); 
                    }
                    
                    
                    if ( ( footer_bottom_position >= window_top_position  && footer_top_position <= window_bottom_position ) ) {
                        $(sidebar).css('position', 'relative');
                        $(sidebar).css('top', contenedor.height() -sidebar.height()-alturaHeader + 'px');
                        $(sidebar).css('transition', 'initial');
                        
                    }

                } else {
                    //sino, se mantiene como esta
                    $(sidebar).css('position', 'relative')
                    $(sidebar).css('top',  '-2rem'); 
                    
                }

            });
        }
    }

} )( jQuery );