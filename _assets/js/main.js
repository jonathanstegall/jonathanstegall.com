function navToggle() {
  $('.main-navigation').before('<a href="#" class="nav-toggle"><strong>Menu</strong> <span class="fa fa-bars fa-lg"></span></a>');
  $('.main-navigation').hide();

  $('a.nav-toggle').click(function() {
      //$(this).parent().children('.main-navigation').slideDown();
      $('.main-navigation', $(this).parent()).toggle();
      return false;
  });
}

// on load
$(function() {
  //navToggle();
});