<?php

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
echo "Connected!";


$username = $conn->real_escape_string($_POST['newusername']);

$sql = "UPDATE users SET username = '$username' WHERE username = ($_SESSION['user_username'])";

if ($conn -> query($sql)) === TRUE{
    echo"Successfully Updated";
} else {
    echo"Failed to Update";
}

$conn -> close();
?>