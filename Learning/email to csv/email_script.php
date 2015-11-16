
<?PHP

$email = $_POST['email'];
$name = $_POST['name'];
$data = $name . "," . $email;

$file = "file.csv"; 

//Unless the server has special security, the file will be created if it hasn't been created prior to running this script

file_put_contents($file, $data . PHP_EOL, FILE_APPEND);


print "Thank you for submitting your e-mail address!";











?>