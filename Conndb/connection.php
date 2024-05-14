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

$sql = mysqli_query("SELECT FROM Users(username, passworde, mail) WHERE username = '$RegUsername'");
	if (mysqli_num_rows($sql)>=1){
		echo "Name already exists";
	} else {
		// Insert cuery here
		$sql = "INSERT INTO users (username, passworde, mail) VALUES ('$RegUsername','$RegPassord','$RegEmail')";
	}

if (!mysqli_query($conn,$sql))
	{
	die('Error: ' . mysqli_error($conn));
	}
mysqli_close($conn);


echo "EYYY"
?>