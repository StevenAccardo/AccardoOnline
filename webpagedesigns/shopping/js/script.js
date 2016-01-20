$(function() { 

		   /* -----------------
		   Product Dropdowns
		   ----------------- */


	$('#cereal img').click(function(){
		$('#title1').show(500);
	});

	$('#cereal .product').click(function(){
		$('#title1').show(500);
	});

	$('#flower img').click(function(){
		$('#title2').show(500);
	});

	$('#flower .product').click(function(){
		$('#title2').show(500);
	});

	$('#machine img').click(function(){
		$('#title3').show(500);
	});

	$('#machine .product').click(function(){
		$('#title3').show(500);
	});

	$('#candy img').click(function(){
		$('#title4').show(500);
	});

	$('#candy .product').click(function(){
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
});