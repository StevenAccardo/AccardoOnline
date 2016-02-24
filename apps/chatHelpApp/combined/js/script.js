$(function() {

	//Swithces to Pre-chat Survey
	$('#mobileoptions li:first-child a').click(function() {

		$('#routingguide').hide();
		$('#container').css('height', '625px');
		$('#prechatsurvey').show();
	})

	//Alerts for other button clicks
	$('#mobileoptions li:nth-child(2), #mobileoptions li:nth-child(3), #mobileoptions li:nth-child(4)').click(function() {
		alert('Click the "Billing and Payments" button please.')
	})

	$('#mobileoptions li:last-child').click(function(){
		alert('This doesn\'t go anywhere since this is just an example. Click the "Billing and Payments" button please.')
	})

	//Input Focus
	$('#fullname').focus(function(){
		$(this).css('background-color', 'rgb(237, 251, 218)');
	})

	$('#phone').focus(function(){
		$(this).css('background-color', 'rgb(237, 251, 218)');
	})
	//Input Blur
	$('#fullname').blur(function(){
		$(this).css('background-color', 'white');
		$(this).css('border-color', 'rgb(152, 152, 152)');
		$('#namewarning').hide();
	})

	$('#phone').blur(function(){
		$(this).css('background-color', 'white');
		$(this).css('border-color', 'rgb(152, 152, 152)');
		$('#nonumwarning').hide();
		$('#badnumwarning').hide();
	})

	//Pop-up Question
 	$('#stateselect').change(function(){

		if($(this).val() == 'california')
		{
			$('.pop').show();
		}
	})

 	$('#popQ').focus(function(){
		$(this).css('background-color', 'rgb(237, 251, 218)');
	})

	$('#popQ').blur(function(){
		$(this).css('background-color', 'white');
	})

	//Checks if fields are empty
	$('#submitbtn').click(function(){

		if (!$('#fullname').val() || !$('#phone').val())
		{
			$('#fullname, #phone').css('background-color', 'rgb(255, 204, 203)');
			$('#fullname, #phone').css('border-color', 'red');
			$('#namewarning').show();
			$('#nonumwarning').show();
		}

		if ($('#fullname').val() && $('#phone').val())
		{
			var inputVal = $('#phone').val();
			var characterReg = /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/;

			if (!characterReg.test(inputVal))
			{
				$('#phone').css('background-color', 'rgb(255, 204, 203)');
				$('#phone').css('border-color', 'red');
				$('#badnumwarning').show();
				$('#nonumwarning').hide();

			}

			else {
				$('#prechatsurvey').hide();
				$('#congrats').show();
			}
		}
	})



});
