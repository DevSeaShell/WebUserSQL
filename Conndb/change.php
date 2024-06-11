<?php
echo"IM HERE<br>";
session_start();
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "My1BirbSQL";
$dbDatabase = "UserDatabase";

//  create a new MySQLi object ($conn) for a connection to your MySQL database.
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbDatabase);

// Checking for connection errors
if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}
echo "Connected! <br>";

$CurrentUsername = $_SESSION['user_username'];
$username = $conn->real_escape_string($_POST['newusername']);

// Update usernamee
$sql = "SELECT * FROM users WHERE username = '$username'";
$result_u = $conn -> query($sql);

if (mysqli_num_rows($result_u) > 0){
	echo"username taken";
} else {
	$sql_new = "UPDATE users SET username = '$username' WHERE username ='$CurrentUsername'";

	if ($conn -> query($sql_new) === TRUE){
		$_SESSION['user_username'] = $username;
		header("Location: ../Pages/Profile.php")
	} else {
		echo"Not succsessfull";
	}
}

$conn -> close();

echo"EYY! <br>";
?>