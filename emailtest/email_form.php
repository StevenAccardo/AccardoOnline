<html>
<head>
</head>
<body>

	<form class="form" action = "email_script.php" method = "POST">
	
		<p class="name">
			<input type="text" name="name" id="name" placeholder="John Doe"/>
			<label for="name">Name</label>
		</p>
		
		<p class="email">
			<input type="text" name="email" id="email" placeholder="mail@example.com"/>
			<label for="email">Email</label>
		</p>
		
		<p class="subject">
			<input type="text" name="subject" id="subject" placeholder="Title"/>
			<label for="subject">Subject</label>
		</p>
		
		<p class="message">
			<textarea name = "message" placeholder="Write.."/></textarea>
		</p>
		
		<p class="submit">
		<input type="submit" name = "submit" value="Send"/>
		</p>
	</form>

</body>
</html>