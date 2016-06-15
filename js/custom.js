jQuery(document).ready(function($) {
    $('.browsemenu').dropit();
});

jQuery(document).ready( function($) {
	$('#navigation').slicknav ({
		label: 'Site sections and pages',
		prependTo:'#primary'
	});	
	$('.menu-name-menu-topmenu').slicknav ({
		label: 'Site sections and pages',
		prependTo:'#header_mobilenav'
	});		
});



jQuery(document).ready( function($) {
  $(window).on('scroll',function() {
    var scrolltop = $(this).scrollTop();

    if(scrolltop >= 215) {
      $('#fixedbar').fadeIn(250);
    }
    
    else if(scrolltop <= 210) {
      $('#fixedbar').fadeOut(250);
    }
  });

});

jQuery(document).ready( function($) {
    $('.slideout-menu-toggle').on('click', function(event){
    	event.preventDefault();
    	// create menu variables
    	var slideoutMenu = $('.slideout-menu');
    	var slideoutMenuWidth = $('.slideout-menu').width();
    	
    	// toggle open class
    	slideoutMenu.toggleClass("open");
    	
    	// slide menu
    	if (slideoutMenu.hasClass("open")) {
	    	slideoutMenu.animate({
		    	left: "0px"
	    	});	
    	} else {
	    	slideoutMenu.animate({
		    	left: -slideoutMenuWidth
	    	}, 250);	
    	}
    });
});


jQuery(window).load(function() {
    
  /* Navigation */

	// jQuery('#block-menu-menu-browse > ul').superfish({ 
	// 	delay:       500,								// 0.1 second delay on mouseout 
	// 	animation:   { opacity:'show',height:'show'},	// fade-in and slide-down animation 
	// 	dropShadows: true								// disable drop shadows 
	// });	  

	jQuery('#main-menu > ul').mobileMenu({
		prependTo:'.mobilenavi'
	});
    jQuery(".header_title_region").click(function(){
        window.location.href = "http://"+window.location.hostname;
         
    });     
});

// $(function(){
//   $(".primary1").scroll(function(){
//     $(".content-area.col-sm-8").scrollLeft($(".primary1").scrollLeft());
//   });
//   $(".content-area.col-sm-8").scroll(function(){
//     $(".primary1").scrollLeft($(".content-area.col-sm-8").scrollLeft());
//   });
// });

( function() {
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && 'undefined' !== typeof( document.getElementById ) ) {
		var eventMethod = ( window.addEventListener ) ? 'addEventListener' : 'attachEvent';
		window[ eventMethod ]( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
					element.tabIndex = -1;

				element.focus();
			}
		}, false );
	}
})();



