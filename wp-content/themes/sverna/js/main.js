// First section animations ( no scroll )
jQuery( document ).ready( function( ) {
    setTimeout( function(){ jQuery( ".animation-home" ).addClass( "animated fadeIn slower" ); }, 0 );
    setTimeout( function(){ jQuery( ".animation-home-2" ).addClass( "animated fadeIn slower" ); }, 1000 );
    setTimeout( function(){ jQuery( ".animation-home-3" ).addClass( "animated fadeIn slower" ); }, 2000 );
    setTimeout( function(){ jQuery( ".animation-home-4" ).addClass( "animated fadeIn slower" ); }, 3000 );
} );

// On load page resize required for few libraries
jQuery( document ).ready( function( $ ) {
    jQuery( window ).scroll();

    jQuery(window).trigger('resize');

    setTimeout( function(){
        jQuery(window).trigger('resize');
    }, 500 );

    setTimeout( function(){
        jQuery(window).trigger('resize');
    }, 1000 );
} );

// Main animation function
jQuery( window ).scroll( function( $ ) {
    var windowPosition = jQuery( window ).scrollTop();
    var windowHeight = jQuery( window ).height();

    jQuery( ".scrollView-animation-fade" ).each( function ( ) {
        var currentElement = jQuery( this );

        if( ( currentElement.offset().top - ( windowHeight / 2 ) ) < windowPosition + 300 ) {
            currentElement.addClass( "animated fadeIn slower" );
        }
    } );

    jQuery( ".scrollView-animation-right" ).each( function ( ) {
        var currentElement = jQuery( this );

        if( ( currentElement.offset().top - ( windowHeight / 2 ) ) < windowPosition + 300 ) {
            currentElement.addClass( "animated fadeInRight slower" );
        }
    } );

    jQuery( ".scrollView-animation-left" ).each( function ( ) {
        var currentElement = jQuery( this );

        if( ( currentElement.offset().top - ( windowHeight / 2 ) ) < windowPosition + 300 ) {
            currentElement.addClass( "animated fadeInLeft slower" );
        }
    } );

    jQuery( ".scrollView-animation-up" ).each( function ( ) {
        var currentElement = jQuery( this );

        if( ( currentElement.offset().top - ( windowHeight / 2 ) ) < windowPosition + 300 ) {
            currentElement.addClass( "animated fadeInUp slower" );
        }
    } );

    jQuery( ".scrollView-animation-down" ).each( function ( ) {
        var currentElement = jQuery( this );

        if( ( currentElement.offset().top - ( windowHeight / 2 ) ) < windowPosition + 300 ) {
            currentElement.addClass( "animated fadeInDown slower" );
        }
    } );
} );

// Main animation function ( ealier animation )
jQuery( window ).scroll( function( $ ) {
    var windowPosition = jQuery( window ).scrollTop();
    var windowHeight = jQuery( window ).height();

    jQuery( ".scrollView-animation-faster-fade" ).each( function ( ) {
        var currentElement = jQuery( this );

        if( ( currentElement.offset().top - ( windowHeight / 2 ) ) < windowPosition + 500 ) {
            currentElement.addClass( "animated fadeIn slower" );
        }
    } );

    jQuery( ".scrollView-animation-faster-right" ).each( function ( ) {
        var currentElement = jQuery( this );

        if( ( currentElement.offset().top - ( windowHeight / 2 ) ) < windowPosition + 500 ) {
            currentElement.addClass( "animated fadeInRight slower" );
        }
    } );

    jQuery( ".scrollView-animation-faster-left" ).each( function ( ) {
        var currentElement = jQuery( this );

        if( ( currentElement.offset().top - ( windowHeight / 2 ) ) < windowPosition + 500 ) {
            currentElement.addClass( "animated fadeInLeft slower" );
        }
    } );

    jQuery( ".scrollView-animation-faster-up" ).each( function ( ) {
        var currentElement = jQuery( this );

        if( ( currentElement.offset().top - ( windowHeight / 2 ) ) < windowPosition + 500 ) {
            currentElement.addClass( "animated fadeInUp slower" );
        }
    } );

    jQuery( ".scrollView-animation-faster-down" ).each( function ( ) {
        var currentElement = jQuery( this );

        if( ( currentElement.offset().top - ( windowHeight / 2 ) ) < windowPosition + 500 ) {
            currentElement.addClass( "animated fadeInDown slower" );
        }
    } );
} );

// Smooth scroll
jQuery( document ).ready( function( $ ) {
    $( ".scroll-down" ).click( function( e ) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    } );
} );

// Page scroll progress bar
jQuery( window ).scroll( function( $ ) {
    var windowPosition = jQuery( window ).scrollTop();
    var pageHeight = jQuery( "body" ).height();
    var windowHeight = jQuery( window ).height();
    var pagePosition = ( windowPosition / ( pageHeight - windowHeight ) ) * 100;

    jQuery( ".subpage-nav .circle-nav-line").css( "height", pagePosition + "%" );
} );

jQuery( document ).ready( function( ) {
    jQuery( "#search-text" ).keyup( function( ) {
        var searchText = jQuery( this ).val();

        jQuery( '.publication-box' ).hide();

        jQuery( '.publication-box' ).each(function() {
            if( jQuery( this ).text().toLowerCase().indexOf(""+searchText+"") != -1 ) {
                jQuery( this ).show();
            }
        } );
    } );
} );

// Count animation
function xazAnimateCounters() {
    var windowPosition = jQuery( window ).scrollTop();
    var windowHeight = jQuery( window ).height();
    var triggerLine = windowPosition + ( windowHeight * 0.6666667 );

    jQuery( ".count" ).each( function() {
        var currentElement = jQuery( this );
        var counterValue = parseInt( currentElement.data( "counter" ), 10 );

        if( isNaN( counterValue ) ) {
            return;
        }

        if( currentElement.offset().top <= triggerLine ) {
            if( !currentElement.hasClass( "active" ) ) {
                currentElement.addClass( "active" );
                currentElement.prop( "Counter", 0 ).animate( {
                    Counter: counterValue
                }, {
                    duration: 3000,
                    easing: "swing",
                    step: function( now ) {
                        currentElement.text( Math.ceil( now ) );
                    }
                } );
            }
        }
    } );
}

jQuery( window ).scroll( function() {
    xazAnimateCounters();
} );

jQuery( document ).ready( function() {
    xazAnimateCounters();
} );

jQuery( document ).on( "click", ".accordion-header", function() {
    jQuery( this ).parent().toggleClass( "active" );
} );

jQuery( document ).on( "click", ".xaz-panelist-toggle", function() {
    jQuery( this ).closest( ".xaz-panelist-card" ).toggleClass( "active" );
} );

function xazUpdateHotelsList( $component ) {
    var ratingFilter = $component.find( ".xaz-hotels-list-filter-rating" ).val() || "all";
    var sortOrder = $component.find( ".xaz-hotels-list-sort" ).val() || "last_added";
    var $grid = $component.find( ".xaz-hotels-list-grid" );
    var items = $grid.children( ".xaz-hotels-list-item" ).get();

    items.sort( function( a, b ) {
        var $a = jQuery( a );
        var $b = jQuery( b );
        var titleA = String( $a.data( "title" ) || "" );
        var titleB = String( $b.data( "title" ) || "" );
        var priceA = parseFloat( $a.data( "price" ) || 0 );
        var priceB = parseFloat( $b.data( "price" ) || 0 );
        var ratingA = parseInt( $a.data( "rating" ) || 0, 10 );
        var ratingB = parseInt( $b.data( "rating" ) || 0, 10 );
        var orderA = parseInt( $a.data( "order" ) || 0, 10 );
        var orderB = parseInt( $b.data( "order" ) || 0, 10 );

        switch( sortOrder ) {
            case "title_asc":
                return titleA.localeCompare( titleB );
            case "title_desc":
                return titleB.localeCompare( titleA );
            case "price_asc":
                return priceA - priceB;
            case "price_desc":
                return priceB - priceA;
            case "rating_asc":
                return ratingA - ratingB;
            case "rating_desc":
                return ratingB - ratingA;
            default:
                return orderA - orderB;
        }
    } );

    jQuery.each( items, function( _, item ) {
        var $item = jQuery( item );
        var matchesRating = ratingFilter === "all" || String( $item.data( "rating-filter" ) ) === ratingFilter;

        $grid.append( item );
        $item.toggle( matchesRating );
    } );
}

jQuery( document ).ready( function() {
    jQuery( ".xaz-hotels-list" ).each( function() {
        xazUpdateHotelsList( jQuery( this ) );
    } );
} );

jQuery( document ).on( "change", ".xaz-hotels-list-filter-rating, .xaz-hotels-list-sort", function() {
    xazUpdateHotelsList( jQuery( this ).closest( ".xaz-hotels-list" ) );
} );

function xazInitHistorySlider( $slider ) {
    var $slides = $slider.find( "[data-history-slide]" );
    var $dots = $slider.find( "[data-history-dot]" );
    var $orbit = $slider.find( ".xaz-history-slider-orbit" );
    var $dotsTrack = $slider.find( "[data-history-dots-track]" );
    var $stage = $slider.find( "[data-history-stage]" );
    var $prev = $slider.find( "[data-history-prev]" );
    var $next = $slider.find( "[data-history-next]" );
    var activeIndex = 0;
    var isAnimating = false;
    var dotSlots = 10;

    if ( $slides.length === 0 || $dots.length === 0 ) {
        return;
    }

    function xazPositionHistoryDots() {
        var orbitSize = $orbit.outerWidth() || 520;
        var radius = orbitSize / 2;
        var spacingAngle = 360 / dotSlots;
        var startAngle = -spacingAngle;

        $dots.each( function( index ) {
            var angle = ( ( startAngle + ( spacingAngle * index ) ) * Math.PI ) / 180;
            var x = Math.cos( angle ) * radius;
            var y = Math.sin( angle ) * radius;

            jQuery( this ).css( "transform", "translate(" + x + "px, " + y + "px)" );
            jQuery( this ).toggleClass( "is-active", index === activeIndex );
        } );

        $dotsTrack.css( "transform", "rotate(" + ( -spacingAngle * activeIndex ) + "deg)" );
    }

    function xazUpdateHistoryControls() {
        var isFirst = activeIndex === 0;
        var isLast = activeIndex === $slides.length - 1;

        $prev.prop( "disabled", isFirst ).toggleClass( "disabled", isFirst );
        $next.prop( "disabled", isLast ).toggleClass( "disabled", isLast );
    }

    function xazSetHistoryStageHeight() {
        var $activeSlide = $slides.filter( ".is-active" );

        if ( $activeSlide.length ) {
            $stage.height( $activeSlide.outerHeight() );
        }
    }

    function xazShowHistorySlide( nextIndex ) {
        var $currentSlide;
        var $nextSlide;
        var nextHeight;

        if ( isAnimating || nextIndex === activeIndex || nextIndex < 0 || nextIndex >= $slides.length ) {
            return;
        }

        isAnimating = true;
        $currentSlide = $slides.eq( activeIndex );
        $nextSlide = $slides.eq( nextIndex );
        nextHeight = $nextSlide.outerHeight();

        $stage.height( $currentSlide.outerHeight() );
        $nextSlide.addClass( "is-active" );
        $stage.height( nextHeight );
        activeIndex = nextIndex;
        xazPositionHistoryDots();
        xazUpdateHistoryControls();

        window.requestAnimationFrame( function() {
            $currentSlide.addClass( "is-leaving" ).removeClass( "is-active" );

            window.setTimeout( function() {
                $currentSlide.removeClass( "is-leaving" );
                xazSetHistoryStageHeight();
                isAnimating = false;
            }, 420 );
        } );
    }

    $slides.first().addClass( "is-active" );
    xazPositionHistoryDots();
    xazSetHistoryStageHeight();
    xazUpdateHistoryControls();

    $prev.on( "click", function() {
        if ( activeIndex > 0 ) {
            xazShowHistorySlide( activeIndex - 1 );
        }
    } );

    $next.on( "click", function() {
        if ( activeIndex < $slides.length - 1 ) {
            xazShowHistorySlide( activeIndex + 1 );
        }
    } );

    jQuery( window ).on( "resize", function() {
        xazPositionHistoryDots();
        xazSetHistoryStageHeight();
    } );
}

jQuery( document ).ready( function() {
    jQuery( "[data-history-slider]" ).each( function() {
        xazInitHistorySlider( jQuery( this ) );
    } );
} );



