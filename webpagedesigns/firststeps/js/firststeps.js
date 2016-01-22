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


function newPicture() {
	
	document.getElementById("image").src="../../Images/applyOnline2.png";
	
}

function oldPicture() {
	
	document.getElementById("image").src="../../Images/applyonline.png";
	
}