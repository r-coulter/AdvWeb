 $(document).ready(function () {
     $(window).resize(function(){//Keeps the footer at the bottom of the page by setting the main-container's height to be the entire screen minus the header and footer.
         var hHeight = $(".header-container").height();
         var fHeight = $(".footer-container").height();
         var borders = 20;
         if($(window).width()<768)return; //Mobile check, The resize code isn't designed for our mobile layout.
         $(".main-container").height(($(document).height() - hHeight) - fHeight - borders);
     });
     
     try{
     $('#coin-slider').coinslider(); // Enables the image slider
     }
     catch(e)
     {}
     $(window).trigger("resize");
});