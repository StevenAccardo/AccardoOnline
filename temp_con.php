<?php

	require($_SERVER["DOCUMENT_ROOT"]."/config/db_config.php"); //require will throw an error if the argument isn't true; $_server fills in the path of the file that the script is currently in
	
	$CONNECTION = @mysql_connect("$db_host", "$db_user", "$db_password") or die("Error Connecting to Database"); //The @ symbol is used to silence any error responses that may be thrown, this provides for a cleaner output to the customer
	
	echo "Connected to Database";

?>