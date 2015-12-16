$(function() {
	$('ul.parent > li').hover(function() {
		$(this).find('ul.child').show(300);
	}, function() {
		$(this).find('ul.child').hide(300);
	});

	
	
$('ul.parent li').mouseover(function() {
	$(this).css({"color": "#357ad9"});
});

$('ul.parent li').mouseout(function() {
	$(this).css({"color": "white"});
});




$('ul.parent a').mouseover(function() {
	$(this).css({"color": "#357ad9"});
});

$('ul.parent a').mouseout(function() {
	$(this).css({"color": "white"});
});
});