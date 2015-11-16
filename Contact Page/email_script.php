

<?PHP
$from = "test@accardoonline.com";
$email = "accardo.steven@gmail.com";
$subject = $_POST['subject'];
$message = $_POST['message'];

mail($email, $subject, $message, "From: ".$from);

print "Your message has been sent:</br>$email</br>$subject</br>$message";

?>