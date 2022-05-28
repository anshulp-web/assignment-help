(function($) {
    "use strict";

    var tpj = jQuery;
    var revapi24;
	// Preloader 
    jQuery(window).on('load', function() {
        jQuery("#status").fadeOut();
        jQuery("#preloader").delay(350).fadeOut("slow");
    });
	
	// on ready function
    jQuery(document).ready(function($) {
	
	
	// Menu js for Position fixed
	$(window).scroll(function(){
		var window_top = $(window).scrollTop() + 1; 
		if (window_top > 730) {
			$('.erp_navigation_sticky').addClass('menu_fixed animated fadeInDown');
		} else {
			$('.erp_navigation_sticky').removeClass('menu_fixed animated fadeInDown');
		}
	});
	
	
	
	//----------- Main Slider js -------------//

        (function($) {

            //Function to animate slider captions 
            function doAnimations(elems) {
                //Cache the animationend event in a variable
                var animEndEv = 'webkitAnimationEnd animationend';

                elems.each(function() {
                    var $this = $(this),
                        $animationType = $this.data('animation');
                    $this.addClass($animationType).one(animEndEv, function() {
                        $this.removeClass($animationType);
                    });
                });
            }

            //Variables on page load 
            var $myCarousel = $('#carousel-example-generic'),
                $firstAnimatingElems = $myCarousel.find('.carousel-item:first').find("[data-animation ^= 'animated']");

            //Initialize carousel 
            $myCarousel.carousel();

            //Animate captions in first slide on page load 
            doAnimations($firstAnimatingElems);

            //Pause carousel  
            $myCarousel.carousel('pause');


            //Other slides to be animated on carousel slide event 
            $myCarousel.on('click slide.bs.carousel', function(e) {
                var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
                doAnimations($animatingElems);
            });


        })(jQuery);
		
		
		$(document).ready(function() {
            $('.erp_product_slider_main .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
				loop: true,
                responsiveClass: true,
                smartSpeed: 1200,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
					500: {
                        items: 2,
                        nav: true
                    },
                    700: {
                        items: 2,
                        nav: true
                    },
                    1000: {
                        items: 3,
                        nav: true,
                        loop: true,
                        margin: 20
                    }
                }
            })
        })


		$(document).ready(function() {
            $('.product_slider .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
				loop: true,
                responsiveClass: true,
                smartSpeed: 1200,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
					500: {
                        items: 2,
                        nav: true
                    },
                    700: {
                        items: 2,
                        nav: true
                    },
                    1000: {
                        items: 1,
                        nav: true,
                        loop: true,
                        margin: 1
                    }
                }
            })
        })

		$(document).ready(function() {
            $('.erp_testi_slider_main .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
				loop: true,
                responsiveClass: true,
                smartSpeed: 1200,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
					500: {
                        items: 1,
                        nav: true
                    },
                    700: {
                        items: 1,
                        nav: true
                    },
                    1000: {
                        items: 1,
                        nav: true,
                        loop: true,
                        margin: 20
                    }
                }
            })
        })
		
		$(document).ready(function() {
            $('.erp_company_slider_main .owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                autoplay: true,
				loop: true,
                responsiveClass: true,
                smartSpeed: 1200,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 2,
                        nav: true
                    },
					500: {
                        items: 3,
                        nav: true
                    },
                    700: {
                        items: 4,
                        nav: true
                    },
                    1000: {
                        items: 6,
                        nav: true,
                        loop: true,
                        margin: 20
                    }
                }
            })
        })
		
		
		// Magnific popup-video

		$('.test-popup-link').magnificPopup({ 
		type: 'iframe',
		iframe: {
			markup: '<div class="mfp-iframe-scaler">'+
				'<div class="mfp-close"></div>'+
				'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
				'<div class="mfp-title">Some caption</div>'+
				'</div>',
			patterns: {
				youtube: {
					index: 'youtube.com/', 
					id: 'v=',
					src: 'https://www.youtube.com/embed/ryzOXAO0Ss0'
				}
			}
		}
		// other options
	});
	
	
	//-------------------------------------------------------
    // counter-section
    //-------------------------------------------------------
    $('.counter-section').on('inview', function(event, visible, visiblePartX, visiblePartY) {
        if (visible) {
            $(this).find('.timer').each(function () {
                var $this = $(this);
                $({ Counter: 0 }).animate({ Counter: $this.text() }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.ceil(this.Counter));
                    }
                });
            });
            $(this).off('inview');
        }
    });
	
	
	
 });

})(jQuery);	

