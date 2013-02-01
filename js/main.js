 $(document).ready(function () {
     $(window).resize(function(){//Keeps the footer at the bottom of the page by setting the main-container's height to be the entire screen minus the header and footer.
         var hHeight = $(".header-container").height();
         var fHeight = $(".footer-container").height();
         var borders = 20;
         $(".main-container").height(($(window).height() - hHeight) - fHeight - borders);
     });
     $(window).trigger("resize");
});