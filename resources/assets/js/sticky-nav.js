// https://codepen.io/renduh/pen/oBBGbK

var yourNavigation = $(".nav");
        stickyDiv = "sticky";
        yourHeader = 100;

    $(window).on('scroll', function() {
      if( $(this).scrollTop() > yourHeader ) {
        yourNavigation.addClass(stickyDiv);
      } else {
        yourNavigation.removeClass(stickyDiv);
    }
});