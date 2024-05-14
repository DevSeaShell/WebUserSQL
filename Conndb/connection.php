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

if ($result = mysqli_query($conn, "SELECT * FROM Users")){
	echo "Returned rows are: " . mysqli_num_rows($result);
	mysqli_free_result($result);
}

echo "EYYY"
?>