jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var loader                  = $('#loader');
    var loader_container        = $('#preloader');
    var scroll                  = $(window).scrollTop();  
    var scrollup                = $('.backtotop');
    var menu_toggle             = $('.menu-toggle');
    var dropdown_toggle         = $('.main-navigation button.dropdown-toggle');
    var nav_menu                = $('.main-navigation ul.nav-menu');
    var featured_slider         = $('#featured-slider');
    var testimonial_slider      = $('.testimonial-slider');

/*------------------------------------------------
            PRELOADER
------------------------------------------------*/

    loader_container.delay(1000).fadeOut();
    loader.delay(1000).fadeOut("slow");
    
/*------------------------------------------------
            BACK TO TOP
------------------------------------------------*/

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"25px"});
        } 
        else {
            scrollup.css({bottom:"-100px"});
        }
    });

    scrollup.click(function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
            MAIN NAVIGATION
------------------------------------------------*/

    $('#top-bar').click(function(){
        $('#top-bar .wrapper').slideToggle();
        $('#top-bar').toggleClass('top-menu-active');
    });

    menu_toggle.click(function(){
        nav_menu.slideToggle();
       $('.main-navigation').toggleClass('menu-open');
       $('.menu-overlay').toggleClass('active');
    });

    dropdown_toggle.click(function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
       $('#primary-menu > li:last-child button.active').unbind('keydown');
    });

    $('.main-navigation ul li.search-menu a').click(function(event) {
        event.preventDefault();
        $(this).toggleClass('search-active');
        $('.main-navigation #search').fadeToggle();
        $('.main-navigation .search-field').focus();
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('.menu-sticky #masthead').addClass('nav-shrink');
        }
        else {
            $('.menu-sticky #masthead').removeClass('nav-shrink');
        }
    });

    $(document).click(function (e) {
        var container = $("#masthead");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('#site-navigation').removeClass('menu-open');
            $('#primary-menu').slideUp();
            $('.menu-overlay').removeClass('active');
            $('.main-navigation ul li.search-menu a').removeClass('search-active');
            $('.main-navigation #search').fadeOut();
        }
    });

    


/*------------------------------------------------
            PACKERY
------------------------------------------------*/
$('.grid').packery({
    itemSelector: '.grid-item'
});


/*------------------------------------------------
            Sliders
------------------------------------------------*/

featured_slider.slick();
testimonial_slider.slick();


/*------------------------------------------------
                PHOTO GALLERY
------------------------------------------------*/
    $('.grid').packery({
        itemSelector: '.grid-item',
        gutter: 0
    });

    var $container = $('.grid');
                
    $('nav.portfolio-filter ul a').on('click', function() {
        var selector = $(this).attr('data-filter');
        $container.isotope({ filter: selector });
        $('nav.portfolio-filter ul li').removeClass('active');
        $(this).parent().addClass('active');
        return false;
    });

    packery = function () {
        $container.isotope({
            resizable: true,
            itemSelector: '.grid-item',
            layoutMode : 'masonry',
            gutter: 0
        });
    };
    packery();


/*--------------------------------------------------------------
 Keyboard Navigation
----------------------------------------------------------------*/
if( $(window).width() < 1024 ) {
    $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });

    $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#masthead').find('.menu-toggle').focus();
        }
    });
}
else {
    $('#primary-menu').find("li").unbind('keydown');
}

$(window).resize(function() {
    if( $(window).width() < 1024 ) {
        $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });

        $('#primary-menu > li:last-child button:not(.active)').bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });
    }
    else {
        $('#primary-menu').find("li").unbind('keydown');
    }
});

if( $(window).width() < 1024 ) {
    $('#top-bar').find("li").last().bind( 'keydown', function(e) {
        if( e.which === 9 ) {
            e.preventDefault();
            $('#top-bar').find('button.top-menu-toggle').focus();
        }
    });
}
else {
    $('#top-bar li').last().unbind('keydown');
}

$(window).resize(function() {
    if( $(window).width() < 1024 ) {
        $('#top-bar').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#top-bar').find('button.top-menu-toggle').focus();
            }
        });
    }
    else {
        $('#top-bar li').last().unbind('keydown');
    }
});



/*------------------------------------------------
                CUSTOM 
------------------------------------------------*/
    var isSecondDesign = document.getElementsByTagName('body')[0].classList.contains('second-design');
    if(isSecondDesign){
        document.getElementById("our-services").classList.remove('no-padding-bottom');
        document.getElementById("cta").classList.remove('no-padding-top');
        document.getElementById("call-us").classList.add('page-section')
        $("#cta article").removeClass("has-post-thumbnail");
    }

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});