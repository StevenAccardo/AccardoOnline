<html>
<head>
</head>
<body>




<form action = "form_script.php" method = "POST"><!Opens a form>

<p>Name: <input type = "text" name = "name" size = "30"/></p><!Creates a text box where the user can enter their name>

<p>Shirt Size: <!Creates an option box>
	<select name = "size">
	<option value = "small">Small</option>
	<option value = "medium">Medium</option>
	<option value = "large">Large</option>
	</select>
	</p>
	
<p>
Gender: <input type = "radio" name = "gender" value = "male"/> Male
<input type = "radio" name = "gender" value = "female" /> Female
</p>
	

<input type = "submit" name = "submit" value = "Submit"/>

</form>

</body>
</html>
