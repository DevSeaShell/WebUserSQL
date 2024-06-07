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

// ($conn->real_escape_string) for input to be seen as only text (for security)
$mail = $conn->real_escape_string($_POST['regmail']);
$username = $conn->real_escape_string($_POST['regusername']);
$password = $conn->real_escape_string($_POST['regpassword']);

$sql_u = "SELECT * FROM users WHERE username = '$username'";
$sql_m = "SELECT * FROM users WHERE mail = '$mail'";

// Gets results from query and saves in result.
$result_u = $conn -> query($sql_u);
$result_m = $conn -> query($sql_m);

if (mysqli_num_rows($result_u) >= 1){

	echo "Username taken";

} else if (mysqli_num_rows($result_m) >= 1){

	echo "Mail already in use";
} else if (isset($_POST['Regcheckbox'])){

	echo "Checked!";
	// Hashes Password, function password_hased
	$passwordhashed = password_hash($password, PASSWORD_BCRYPT);

	echo"Hashed password";
	print_r($passwordhashed);

	// Inserts user info if username and mail doesn't exist.
	$sql = "INSERT INTO users (mail, username, password) VALUES ('$mail', '$username', '$passwordhashed')";
	
	// if SQL query executed successfully -> executes the SQL query on the database
	if ($conn->query($sql) === TRUE) {
		echo "Inserted";
		header('Location: /Login.html');
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
  // ($sql) SQL query attempted to be executed
  // ($conn) holds the error message
} else {
 echo "Not Checked! D:";
}

  // closes connecting
$conn->close();

echo "EYYY";
?>