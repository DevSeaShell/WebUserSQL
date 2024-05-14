<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "My1BirbSQL";
$dbName = "UserDatabase";

$conn = new mysqli($servername, $username, $passworde, $database);



if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$mail = $conn->real_escape_string($_POST['$regmail']);
$username = $conn->real_escape_string($_POST['$regusername']);
$passworde = $conn->real_escape_string($_POST['$regpassword']);

$sql = "INSERT INTO User (mail, username, passworde) VALUES ('$mail', '$username', '$passworde');";

if ($conn->query($sql) === TRUE){
	echo "yay it inserted";
} else {
	echo "error:" . $sql. "<br>" .$conn->error;
}

echo "test";
$conn->close();
?>