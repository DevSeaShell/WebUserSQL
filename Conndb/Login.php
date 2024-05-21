
<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "My1BirbSQL";
$dbName = "UserDatabase";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbDatabase);

// Checking for connection errors
if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}
echo "Connected!";

// Saves input from logmain, logusername, logpassword to $mail, $username and $password. While also making sure there are no weird symbols with the ($conn->real_escape_string)
$mail = $conn->real_escape_string($_POST['logmail']);
$username = $conn->real_escape_string($_POST['logusername']);
$password = $conn->real_escape_string($_POST['logpassword']);

// Checks if username that was written in input exists in the database.
$sql_u = "SELECT * FROM users WHERE username = '$username'";
$sql_p = "SELECT * FROM users WHERE 'password' = '$password'";
$result_u = $conn -> query($sql_u);
$result_p = $conn -> query($sql_p);

echo "Database Result";

if mysqli_num_rows($result_u) === 0{
	echo "user dose not exist";
} else if mysql_num_rows($result_p) === 0{
	echo "Wrong Password";
} else if {
	$sql = "SELECT id, password FROM users WHERE username = '$username'";
	$result_IdPas = $conn -> queiy($sql);
}

echo "EYYY";
?>
