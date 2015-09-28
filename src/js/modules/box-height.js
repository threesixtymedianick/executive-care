$(function() {
   $('.equalHeight').matchHeight();

   $('.heightMatch').matchHeight({
    byRow: false
   });

   $('.tab').css('height', $('.sidebar').height() - 10);
});