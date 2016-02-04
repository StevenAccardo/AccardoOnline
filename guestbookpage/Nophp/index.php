<!DOCTYPE html>
<html lang="en">
<head>
	<title>Guestbook</title>
	<meta charset = "utf-8">
	<link rel = "stylesheet" type = "text/css" href = "guestbook.css">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
	<script>
	function duplicateAlert(msg)
	{
		alert(msg);
	}
	
	function noNameAlert(msg)
	{
		alert(msg);
	}
	
	function waitAlert(msg)
	{
		alert(msg);
	}
	</script>
</head>





<body>

	<header class = "mainheader">
		<nav>
			<ul class="parent">
				<li><a href="/">Home</a></li>
				<li><a href="#">Webpage Designs<a/>
					<ul class="child">
						<li>
							<a href="/webpagedesigns/shopping">Shopping</a>
						</li>
						<li>
							<a href="/webpagedesigns/firststeps">First Steps</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="selected" href="#">Guestbook</a>
				</li>
				<li>
					<a href="/contact">Contact</a>
				</li>
			</ul>
		</nav>
		<center>
		<h1 class = "title">Please leave a comment or your name to let me know that you were here!</h1>
		<p class = "languages"><b>This Guestbook was created using HTML5, CSS3, JavaScript, jQuery, PHP, and SQL.</b></p>
		</center>
	</header>
<center>
<form action = "<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST"> <!--Returns back to the original page after clicking the submit button, instead of loading the .php script -->
	<label for="txt_name">Name: </label>
	<input type="text" name="txt_name" placeholder = "John Doe">
	<label for="txt-email">Email: </label>
	<input type="text" name="txt_email" placeholder = "name@email.com"><br><br>
	<label for="txt-email">Comment: </label><br>
	<textarea rows="10" name="txt_comment" placeholder = "Type here..."></textarea><br><br>
	<center>
		<p class = "submit">
			<input type="submit" name = "submit" value="Submit">
		</p>
	</center>
	
</form>
<div class = "instructions">
	<center>
		<p>The table below will be updated everytime that someone signs the Guestbook. If an e-mail is entered then the names will be highlighted, 
		and clicking on the hyperlink will launch my e-mail application and create a new message to that individual. If an e-mail was not entered 
		then the name will not be highlighted.</p>
	</center>
</div>


<table class = "table" cellspacing="1" cellpadding="2">


</table>

</center>

	<!--Loading the scripts at the bottom, so the page will load without waiting for the scripts to load-->
	<!--Load JQuery from the CDN first-->
	<!--Loading the production version-->
	<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>

	<!--If CDN fails to load, serve up the local version-->
	<script>window.jQuery || document.write('<script src="js/jquery-2.1.4.min.js"><\/script>');</script>
	<!--The JS file that I create, which holds my JQuery code-->
	<script src = "js/guestbook.js"></script>
</body>
<footer class ="mainfooter">
	<p>Copyright &copy; 2015 <a href = "www.StevenAccardo.com" title ="website1">www.StevenAccardo.com</a></p>
</footer>
</html>
