(function ($) {
"use strict";


	/* Preloader */
	var win = $(window);
	win.on('load',function() {
		$('.page-loader').delay(350).fadeOut('slow');
	});	
	
	/* menu last class added */
	$('ul.basic-menu>li').slice(-2).addClass('menu-p-right');
	
	
	/* TOP Menu Stick  */
	win.on('scroll',function() {
	if ($(this).scrollTop() > 1){  
		$('#sticky-header').addClass("sticky");
	  }
	  else{
		$('#sticky-header').removeClass("sticky");
	  }
	}); 
	
	/* meanmenu */
	 $('#mobile-nav').meanmenu({
		 meanMenuContainer: '.basic-mobile-menu',
		 meanScreenWidth: "767"
	 });
	 
	/* hamburgers menu option  */
    $('.hamburger').on('click', function() {
        $(this).toggleClass('is-active');
        $(this).next().toggleClass('nav-menu-show')
    }); 
	
	
	/*-- One Page Menu --*/
    var TopOffsetId = $('#sticky-header').height() - 25;
    $('.menu-area nav').onePageNav({
        currentClass: 'active',
        scrollThreshold: 0.2,
		changeHash: false,
        scrollSpeed: 1000,
        scrollOffset: TopOffsetId,
    });




	// $('.parent-container').magnificPopup({
	//   delegate: 'a', // child items selector, by clicking on it popup will open
	//   type: 'image'
	//   // other options
	// });

})(jQuery);	


$(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items: 4,
                    nav: true,
                    loop: false,
                    dots: false,
                    margin: 20
                  }
                }
              })
            })

new WOW().init();

             $(document).ready(function() {
              $('.galleryss').magnificPopup({
                type:'image',
                delegate: 'a',
                gallery:{
                    enabled: true
                }
              });
            });