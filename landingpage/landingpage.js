$(function(){
	
	$('#title1, #title2, #title3').hover(function(){
		$(this).css('font-size', '+=8px');		
		}, function(){
		$(this).css('font-size', '-=8px');
		});
});