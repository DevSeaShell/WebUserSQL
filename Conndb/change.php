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

$conn -> close();

echo"EYY! <br>";
?>