jQuery(window).load(function() {

  jQuery('#slidebox').flexslider({
    animation: "slide",
    direction: "horizontal",
    directionNav:true,
    slideshowSpeed: 3500,
    animationDuration: 3000,
    controlNav:false
  });
   jQuery('.flexslider').flexslider({
     animation: "slide",
   /* direction: "horizontal",   */
    controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
    directionNav: false 
  }); 

});