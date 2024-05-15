<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "My1BirbSQL";
$dbName = "UserDatabase";

$conn = new mysqli($servername, $username, $password, $database);

// Checking for connection errors
if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}
echo "Connected!";

$mail = $conn->real_escape_string($_POST['regemail']);
$username = $conn->real_escape_string($_POST['regusername']);
$password = $conn->real_escape_string($_POST['regpassword']);

$sql = "SELECT * FROM users WHERE username = '$regusername'";
	if (mysqli_num_rows($result) >=1) {
		echo "Name already exists";
	} else {
		// Insert cuery here
	$sql = "INSERT INTO users (mail, username, password) VALUES ('$mail', '$username', '$password');";
	
	if ($conn->query($sql) === TRUE){
		echo "Inserted";
	} else {
		echo "error:" . $sql. "<br>" .$conn->error;
	}
	}

echo "EYYY"
?>