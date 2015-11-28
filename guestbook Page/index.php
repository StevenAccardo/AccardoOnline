<?php
//Connects to the server and database using a stored config file; NOTE that new versions of PHP use mysqli to handle this operation and more
	require ($_SERVER["DOCUMENT_ROOT"]."/config/db_config.php");
	$connection = mysql_connect($db_host, $db_user, $db_password)or die("Error Connecting to Database");
	mysql_select_db($db_name, $connection) or die("Did not select correct database.");
	
	/*Stops PHP from throwing an E_notice when it comes accros a variable that hasn't been initilaized. Pretty much, it won't look at this code 
	until the user clicks the submit button. Before the submit button is clicked, the variable isn't initialized and PHP throws the notice.*/
	if (isset($_POST['submit']))
	{
		$name = $_POST["txt_name"];
		$len = strlen($name);
	
		//Only writes to database if there's a name entered in the field
		if ($len > 0)
		{
			$email = $_POST["txt_email"];
			$comment = $_POST["txt_comment"];
			$date = time(); //Returns the current time, measured in seconds since the Unix Epoch
		
			//Stores MySQL command into variable and then creates the query or throws an error i fquery requet was unsuccesful
			$query = "INSERT INTO guestbook (primaryid, name, email, comment, date_auto) VALUES (NULL, '$name', '$email', '$comment', '$date')";
			mysql_query ($query, $connection) or die(mysql_error());
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Guestbook</title>
	<meta charset = "utf-8">
	<link rel = "stylesheet" type = "text/css" href = "guestbook.css">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
</head>

<body>

	<header class = "header">
		<nav>
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="#">Guestbook</a></li>
				<li><a href="/contact">Contact</a></li>
			</ul>
		</nav>
		<center>
		<h2 class = "title">This guestbook page is not complete yet, and is more than likely being worked on as you view it. However, the Guestbook functionality 
		is working. So please, leave a comment or your name to let me know that you were here!</h2>
		<p class = "languages">This Guestbook was created using HTML5, CSS3, PHP, and SQL.</p>
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
			<td width="100%" bgcolor="'.$bg_color.'">
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
			<td width="1%" valign="top" nowrap bgcolor="'.$bg_color.'">
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
</body>
<footer class ="mainfooter">
	<p>Copyright &copy; 2015 <a href = "www.StevenACcardo.com" title ="website1">www.StevenAccardo.com</a></p>
</footer>
</html>
