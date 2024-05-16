<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "My1BirbSQL";
$dbDatabase = "UserDatabase";

//  create a new MySQLi object ($conn) to establish a connection to your MySQL database using the server name ($dbServername), username ($dbUsername), password ($dbPassword), and database name ($dbDatabase)
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbDatabase);

// Checking for connection errors
if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}
echo "Connected!";

// ($conn->real_escape_string) used in PHP to escape special characters in the input
$mail = $conn->real_escape_string($_POST['regmail']);
$username = $conn->real_escape_string($_POST['regusername']);
$password = $conn->real_escape_string($_POST['regpassword']);

$sql = "SELECT * FROM users WHERE username = '$username'";

$result = $conn -> query($sql);

	// Checking if it already exists on the database
	// result is greater than or equal to 1
	// ($result) typically holds the result set returned by a SELECT query 
if (mysqli_num_rows($result) >=1) {
	echo "Name already exists";
} else {
	// Insert new record if username doesn't exist     To hide/hash the password in that database use '.md5($password).' instead of only '$password'
	$sql = "INSERT INTO users (mail, username, password) VALUES ('$mail', '$username', '$password')";
	// to check if a SQL query executed successfully and executes the SQL query on the database
	// query is a request for data or information from a database
	if ($conn->query($sql) === TRUE) {
		echo "Inserted";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
} // Says that an error has occurred ^
  // ($sql) SQL query that was attempted to be executed
  // the MySQLi connection object ($conn) holds the error message

  // closes connecting
$conn->close();
// prints out EYYY
echo "EYYY"
?>