// Dropdown Menu Fade    
//jQuery(document).ready(function(){
//    $(".dropdown").hover(
//        function() { $('.dropdown-menu', this).fadeIn("fast");
//        },
//        function() { $('.dropdown-menu', this).fadeOut("fast");
//    });
//});


jQuery(document).ready(function(){
  $(".dropdown").hover(
  function(e) {
    if ($(window).width() > 943) {
      $(this).children(".dropdown-menu").stop(true,false).fadeIn(1);
      e.preventDefault();
    }
  },
  function(e) {
    if ($(window).width() > 943) {
      $(this).children(".dropdown-menu").stop(true,false).fadeOut(1);
      e.preventDefault();
    }
  }
);
});