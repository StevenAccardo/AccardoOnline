<?php
	require ($_SERVER["Document_ROOT"]."/config/db_config.php");
	$connection =



?>




<html>
<head>
	<title>Guestbook</title>
</head>
<body>
<center>
<form action = "<?php echo $_SERVER[PHP_SELF]; ?>" method="POST">
	<font face="arial" size="1">
		Name: <input type="text" name="txt_name">&nbsp;
		Email: <input type="text" name="txt_email"><br><br>
		Comment: <br>
		<textarea style="width:75%" rows="10" name="txt_comment"></textarea>
		<center><input type="submit" value="Submit"></center>
	</font>
</form>
</center>
</body>
</html>
