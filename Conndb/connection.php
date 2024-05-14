<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "My1BirbSQL";
$dbName = "UserDatabase";

$conn = new mysqli($servername, $username, $password, $database);



if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

echo "EYY";
$conn->close();
?>