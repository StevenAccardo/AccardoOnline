<!--This is a template script for interacting with a database using PHP and MySql.-->



<!--Connecting to the database server using PHP-->
<?php

mysql_connect('localhost', 'username', 'password'); //This connects to the server
mysql_select_db('databasename'); //Selects the database under the username 

?>


<!--Executing Queries using PHP and MySql-->
<?php

$query="SELECT * FROM student"; //Assigning the command to a variable,
$result=mysql_query($query); /*the variable is passed into the function, if the command is SELECT then the function will return the result, 
but if any other command is passed, then it will return true if the query executed. If the function returns false, then there was an error.*/


//Allows to check whether or not the Query is working or not.

if(!$result)

print(mysql_error());

else

print("Query OK");

?>