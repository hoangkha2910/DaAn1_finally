jQuery(document).ready(function($) {

	"use strict";

	// Drawer Sidebar
	var sidebar = document.getElementById( 'sidebar-drawer' );
	var button = document.getElementById( 'toggle' );
	var body = document.body;
    if( button != null ) { 
    	button.onclick = function() {
    		classie.toggle( this, 'active' );
    		classie.toggle( body, 'push' );
    		classie.toggle( sidebar, 'open' );
    		disable( 'toggle' );
    	};


    	function disable( button ) {
    		if ( button !== 'toggle' ) {
    			classie.toggle( button, 'disabled' );
    		}
    	}
    }

	//Google Maps scrolling - Contact Page 
	$('.maps').click(function () {
	    $('.maps iframe').css("pointer-events", "auto");
	});

	// Mobile Menu
    $('#nav').slicknav({
    	prependTo: 'body',
    	label: '',
    	allowParentLinks: 'true',
		closedSymbol: '<i class="fa fa-caret-down"></i>',
		openedSymbol: '<i class="fa fa-caret-up"></i>'
    });


	// FlexSlider
	$('.flexslider').imagesLoaded( function() {
	  $('.flexslider').flexslider({
		slideshow: false,
		controlNav: false,
	    animation: "slide",
		animationSpeed: 250,
		smoothHeight: true,
		prevText: '<i class="fa fa-angle-left"></i>',
		nextText: '<i class="fa fa-angle-right"></i>'
	  });
	});


	// Make Videos Responsive
	$('.entry-image').fitVids();
	$('.wp-post-image').fitVids();
	$('.poster').fitVids();
	$('.vid').fitVids();

	//Contact form input style 
	$('.wpcf7-form-control').removeClass('wpcf7-form-control').addClass('nora-form-control');
	$('.wpcf7-submit').removeClass('nora-form-control');

});

// jQuery('.nora_wc_product').hover(
//    function(){ jQuery(this).addClass('onhover'); },
//    function(){ jQuery(this).removeClass('onhover'); }
// )

jQuery('.shop-menu li.nora_woocommerce_mini_cart').hover(
   function(){ jQuery(this).addClass('cartonhover'); },
   function(){ jQuery(this).removeClass('cartonhover'); }
)

jQuery(function ($) {

    //Navigation toggle
    $("#toggle").click(function () {
        $(this).toggleClass("on");
        $("#menu").slideToggle();
    });
         

    $('.search-icon a').click(function () {
        $('.search-box').addClass('active');
    });

    $('.search-box .close').click(function () {
        $('.search-box').removeClass('active');
    });

    

// end

    $('.new-prod-slide').slick({
        infinite: true,
        centerMode: false,
        useCss: false,
        easing: 'linear',
        edgeFriction: '0.15',
        lazyLoad: 'ondemand',
        speed: 500,
        slidesToShow: 5,
        slidesToScroll: 1,
        cssEase: 'ease',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    $('.feature-cat-product').slick({
        infinite: true,
        centerMode: false,
        useCss: false,
        easing: 'linear',
        edgeFriction: '0.15',
        lazyLoad: 'ondemand',
        speed: 500,
        slidesToShow: 3,
        slidesToScroll: 1,
        cssEase: 'ease',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    $('#ak-top').css('right', -65);
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('#ak-top').css('right', 20);
        } else {
            $('#ak-top').css('right', -65);
        }
    });

    $("#ak-top").click(function () {
        $('html,body').animate({scrollTop: 0}, 600);
    });

    $('.ticker-wrapper').show();

$('.navigation').addClass("clearfix");

});//doc close
