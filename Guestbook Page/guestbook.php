<?php
	require ($_SERVER["DOCUMENT_ROOT"]."/config/db_config.php");
	$connection = mysql_connect($db_host, $db_user, $db_password)or die("Error Connecting to Database");
	mysql_select_db($db_name, $connection) or die("Did not select correct database.") ;
	
	$name = $_POST["test_name"];
	$len = strlen($name);
	//Only writes to database if there's a name entered in the field
	if ($len > 0)
	{
		$email = $_POST["txt_email"];
		$comment = $_POST["txt_comment"];
		$date = time();
		
		$query = "INSERT INTO guestbook (primaryid, name, email, comment, date_auto) VALUES (NULL, '$name', '$email', '$comment', '$date')";
		mysql_query ($query, $connection) or die(mysql_error());
	}
?>




<html>
<head>
	<title>Guestbook</title>
</head>
<body>
<center>
<form action = "<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
	<font face="arial" size="1">
		Name: <input type="text" name="test_name">&nbsp;
		Email: <input type="text" name="txt_email"><br><br>
		Comment: <br>
		<textarea style="width:75%" rows="10" name="txt_comment"></textarea>
		<center><input type="submit" value="Submit"></center>
	</font>
</form>
</center>
</body>
</html>
