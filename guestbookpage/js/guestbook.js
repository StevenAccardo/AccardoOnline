$(function() {
  $( 'ul.parent > li' ).hover(
        function(){
            $(this).children('.child').slideDown(200);
        },
        function(){
            $(this).children('.child').slideUp(200);
        }
    );
});
