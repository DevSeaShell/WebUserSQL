
<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "My1BirbSQL";
$dbName = "UserDatabase";

$conn = mysqli_connect( $dbServername , $dbUsername , $dbPassword , $dbName );

// Checking for connection errors
if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}
// Saves input from logmain, logusername, logpassword to $mail, $username and $password. While also making sure there are no weird symbols with the ($conn->real_escape_string)
$mail = $conn->real_escape_string($_POST['logmail']);
$username = $conn->real_escape_string($_POST['logusername']);
$password = $conn->real_escape_string($_POST['logpassword']);

// Checks if username, mail and password that was written in input exists in the database.
$sql_u = "SELECT * FROM users WHERE username = '$username'";
$sql_m = "SELECT * FROM users WHERE mail = '$mail'";
$sql_p = "SELECT * FROM users WHERE password = '$password'";
$result_u = $conn -> query($sql_u);
$result_m = $conn -> query($sql_m);
$result_p = $conn -> query($sql_p);




echo "EYYY"
?>
