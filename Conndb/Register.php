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

$sql_u = "SELECT * FROM users WHERE username = '$username'";
$sql_m = "SELECT * FROM users WHERE mail = '$mail'";

// Checks if it gets results from the database if it exists or not
$result_u = $conn -> query($sql_u);
$result_m = $conn -> query($sql_m);

if (mysqli_num_rows($result_u) >= 1){

	echo "Username taken";
	header("Location: ../Register.html")

} else if (mysqli_num_rows($result_m) >= 1){

	echo "Mail already in use";
	header("Location: ../Register.html")
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