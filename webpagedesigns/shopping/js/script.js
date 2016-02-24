$(function() { 

		   /*---------------------------
		    State Search Using jQuery UI
		   ---------------------------*/
	var $searchList = $('#search') ;
	var $find = $('#find');

	var availableTags = ["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware",
	"District Of Columbia","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa",
	"Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota",
	"Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey",
	"New Mexico","New York","North Carolina","North Dakota","Ohio","Oklahoma","Oregon",
	"Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah",
	"Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"];

	$searchList.autocomplete({
		source: availableTags
	});

	$find.on('click', function() {
		var $searchValue = $searchList.val();
		var correct = $.inArray($searchValue, availableTags);
		if (correct >= 0) {
			alert('You just selected ' + $searchValue + '.');
		}
		else {
			alert('Opps! Please check your entry for errors, and try again.')
		}
	});


	$searchList.bind('keypress', function(e) {
		var code = e.keyCode || e.which
		if(code == 13) {
			var $searchValue2 = $searchList.val()
			var correct2 = $.inArray($searchValue2, availableTags);

			if (correct2 >= 0) {
				alert('You just selected ' + $searchValue2 + '.');
			}
			else {
			alert('Opps! Please check your entry for errors, and try again.')
			}
		}
	});

		   /*-----------------
		   Product Dropdowns
		   ----------------- */

	$('#cereal img, #cereal .product, #cerealLinks').click(function(){
		$('#title1').show(500);
	});

	$('#flower img, #flower .product, #flowerLinks').click(function(){
	$('#title2').show(500);
	});

	$('#machine img, #machine .product, #machineLinks').click(function(){
	$('#title3').show(500);
	});

	$('#candy img, #candy .product, #candyLinks').click(function(){
	$('#title4').show(500);
	});

		   /* ---------------------
		   Product Dropdowns Close
		   --------------------- */

   $('#title1 .close').click(function(){
		$('#title1').hide(500);
	});

    $('#title2 .close').click(function(){
		$('#title2').hide(500);
	});

	$('#title3 .close').click(function(){
		$('#title3').hide(500);
	});

  	$('#title4 .close').click(function(){
		$('#title4').hide(500);
	});


		   /* ---------------------
		   		Price Filter
		   --------------------- */

    $('#selectprice').change(function(){
		if($(this).val() == 1){
			$('li').hide();
		}

		if($(this).val() == 2){
			$('#flower').hide(500);
			$('#machine').hide(500);
			$('#cereal').show(500);
			$('#candy').show(500);
		}

		if($(this).val() == 3){
			$('#flower').show(500);
			$('#machine').hide(500);
			$('#cereal').hide(500);
			$('#candy').hide(500);
		}

		if($(this).val() == 4){
			$('#flower').hide(500);
			$('#machine').show(500);
			$('#cereal').hide(500);
			$('#candy').hide(500);
		}

		if($(this).val() == 'all'){
			$('#flower').show(500);
			$('#machine').show(500);
			$('#cereal').show(500);
			$('#candy').show(500);
		}
	});

		   /* ---------------------
		   		      Links
		   --------------------- */

    $('.links').click(function(){
    	alert('You just learned something')
	});

    $('.buybutton').click(function(){
    	alert('You just bought something!')
    });

    $('.productLinks').click(function(){
		$('#title1').show(500);
	});


});