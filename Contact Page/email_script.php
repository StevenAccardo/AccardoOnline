

<?PHP
$from = "test@accardoonline.com";
$to = "accardo.steven@gmail.com";
$name = $_POST['name'];
$email = $_POST['email'];
$priority = $_POST['priority'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$formContent = "Name: $name\nPriority: $priority\nMessage:\n\n$message";
$mailHeader = "From: $email \r\n";

mail($to, $subject, $formContent, $mailHeader)or die("Error!");

echo "Thank you! Your message has been sent." . " -" . "<a href='index.html'> Return Home</a>";

?>