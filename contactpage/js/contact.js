$(function() {
  $( 'ul.parent > li' ).hover(
        function(){
            $(this).children('.child').slideDown(100);
        },
        function(){
            $(this).children('.child').slideUp(100);
        }
    );
});