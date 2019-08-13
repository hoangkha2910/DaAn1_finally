/*
	This js file is added for the dynamic use of js value
*/

jQuery(document).ready(function($){

	$('#ticker').ticker({
        speed: 0.10,           // The speed of the reveal
        ajaxFeed: false,       // Populate jQuery News Ticker via a feed
        feedUrl: false,        // The URL of the feed
        //feedType: 'xml',       // Currently only XML
        htmlFeed: true,        // Populate jQuery News Ticker via HTML
        debugMode: true,       // Show some helpful errors in the console or as alerts
        controls: true,        // Whether or not to show the jQuery News Ticker controls
        titleText: nora_dynamic_script.nora_ticker_title,   // To remove the title set this to an empty String
        displayType: 'reveal', // Animation type - current options are 'reveal' or 'fade'
        direction: 'ltr',       // Ticker direction - current options are 'ltr' or 'rtl'
        fadeInSpeed: 900,      // Speed of fade in animation
        fadeOutSpeed: 300,   
        pauseOnItems: 3000,    // The pause on a news item before being replaced  
    });

    if( nora_dynamic_script.nora_show_slider == 1 ) {

	   $('#main-slider .bx-slider').slick({
				dots: true,
				arrows: true,
				speed: nora_dynamic_script.nora_slider_speed,
				fade: false,
				cssEase: 'linear',
				autoplaySpeed:5000,
				autoplay:true,
				adaptiveHeight:true,
				infinite:true,
                draggable: true,
			});

		if( nora_dynamic_script.nora_slider_transition == 'true' ) { 

			$('#main-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide) {
				
			    $('#main-slider .slick-slide .caption-title').removeClass('fadeInDown animated displayNone');
			    $('#main-slider .slick-slide[data-slick-index='+nextSlide+'] .caption-title').addClass('fadeInDown animated');
			    $('#main-slider .slick-slide[data-slick-index='+currentSlide+'] .caption-title').addClass('displayNone');
			    
			    $('#main-slider .slick-slide .caption-content').removeClass('fadeInUp animated displayNone'); 
			    $('#main-slider .slick-slide[data-slick-index='+nextSlide+'] .caption-content').addClass('fadeInUp animated');
			    $('#main-slider .slick-slide[data-slick-index='+currentSlide+'] .caption-content').addClass('displayNone');
			    
			    $('#main-slider .slick-slide .caption-read-more1').removeClass('zoomIn animated displayNone'); 
			    $('#main-slider .slick-slide[data-slick-index='+nextSlide+'] .caption-read-more1').addClass('zoomIn animated');
			    $('#main-slider .slick-slide[data-slick-index='+currentSlide+'] .caption-read-more1').addClass('displayNone');
			}); 
		}
	}
}); //end of jquery ready fuction

			