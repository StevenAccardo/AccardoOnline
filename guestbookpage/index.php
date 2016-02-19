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

<?php
	//Connects to the server and database using a stored config file; NOTE that new versions of PHP use mysqli to handle this operation and more
	require ($_SERVER["DOCUMENT_ROOT"]."/config/db_config.php");
	$connection = mysql_connect($db_host, $db_user, $db_password)or die("Error Connecting to Database");
	mysql_select_db($db_name, $connection) or die("Did not select correct database.");
	
	
	/*Stops PHP from throwing an E_notice when it comes across a variable that hasn't been initilaized. Pretty much, it won't look at this code 
	until the user clicks the submit button. Before the submit button is clicked, the variable isn't initialized and PHP throws the notice.*/
	if (isset($_POST['submit']))
	{
		$name = $_POST["txt_name"];
		$len = strlen($name);
		$email = $_POST["txt_email"];
		$comment = $_POST["txt_comment"];
		$date = time(); //Returns the current time, measured in seconds since the Unix Epoch
		
		//Retrieves the last entered timestamp in the table
		$query2 = "SELECT date_auto FROM guestbook ORDER BY date_auto DESC LIMIT 1";
		$storedtime = mysql_query ($query2, $connection) or die(mysql_error());
		$checktime = mysql_fetch_assoc($storedtime);
		
		if ($date > ($checktime['date_auto'] + 180))
		{
		
			//Checks the name and comment columns in the table to see if the new user input matches what is already stored
			$query1 = "SELECT * FROM guestbook WHERE name = '$name' AND comment = '$comment'";
			$result = mysql_query ($query1, $connection) or die(mysql_error());
			$rows = mysql_num_rows($result);//stores the number of rows that the query returned that have matching names and comments
		
			//Only writes to database if there's a name entered in the field and there were zero rows returned by the query, which means that there are no copies of the new user input already stored in the database
			if ($len > 0 and $rows == 0)
			{
				//Stores MySQL command into variable and then creates the query or throws an error if query request was unsuccesful
				$query3 = "INSERT INTO guestbook (primaryid, name, email, comment, date_auto) VALUES (NULL, '$name', '$email', '$comment', '$date')";
				mysql_query ($query3, $connection) or die(mysql_error());
			}
			
			elseif($len == 0)
			{
				echo '<script> noNameAlert("I need your name if I\'m going to know who stopped by. Please make sure to fill in the \"Name:\" field.");</script>';
			}
			else
			{
				echo '<script> duplicateAlert("Oops! You have entered in a duplicate name and comment. Please modify your entries, and try again.");</script>';
			}
		}
		else
		{
			echo '<script> waitAlert("You just entered a comment. You have to cool down and wait before you can enter another one.");</script>';
		}
	}
?>



<body>

	<header class = "mainheader">
		<nav>
			<ul class="parent">
				<li><a href="/">Home</a></li>
				<li><a href="#">Web Apps<a/>
					<ul class="child">
						<li>
							<a href="/apps/moonRisingApp">Moon Rising App</a>
						</li>
						<li>
							<a href="/apps/drinkorderapp">Drink Order App</a>
						</li>
						<li>
							<a href="/apps/chatHelpApp">Chat Help App</a>
						</li>
					</ul>
				</li>
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

<?php
//Retrieves stored data, orders it by date, and then stores that into $result
$query = "SELECT * FROM guestbook ORDER BY date_auto"; 
$result = mysql_query($query, $connection);

//for loop that iterates through each row of data
for ($i=0; $i < mysql_num_rows($result); $i++)
{
	//In $result, from the ith element, take a vairable and store into another variable
	$name = mysql_result($result, $i, "name");
	$email = mysql_result($result, $i, "email");
	$email_len = strlen($email); //Stores length of e-mail for later use
	$comment = mysql_result($result, $i, "comment");
	$comment = nl2br($comment); //Used to turn new lines entered by the user into html readable breaks, or <br>
	$date = mysql_result($result, $i, "date_auto");
	$show_date = date("H:i:s m/d/Y", $date); //Uses php's date function to output the date in a human readable form
	
	//Use of modulus to change the background color for each entry
	if ($i % 2)
	{
		$bg_color = "#EEEEEE";
	}
	else
	{
		$bg_color = "#E0E0E0";
	}
	
	//echos the table elements, makes the right cell as little as possible and the left cell as large as possible
	echo '
		<tr> 
			<td id="comments" width="100%" bgcolor="'.$bg_color.'">
				<font face="arial" size = "2">';
					if ($email_len > 0)
					{
						echo '<b>Name:</b> <a href="mailto:'.$email.'">'.$name.'</a>';
					}
					else
					{
						echo '<b>Name:</b> '.$name;
					}
					echo '
					<br>
					<b>Comment:</b> '.$comment.'
				</font>
			</td>
			<td id="datetime" width="1%" valign="top" nowrap bgcolor="'.$bg_color.'">
				<font face="arial" size="2">
					<b>Date:</b> '.$show_date.'
				</font>
			</td>
		</tr>
		';
	
}

?>
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
