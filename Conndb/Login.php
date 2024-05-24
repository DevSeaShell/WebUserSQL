
<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "My1BirbSQL";
$dbDatabase = "UserDatabase";

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
$sql_get = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND mail = '$mail'";
$result = $conn -> query($sql_get);
echo "Database Result";
//Code above works fine ------------

$sql = "SELECT id, mail, password FROM users WHERE username = ?"
$stmt = $conn -> Prepare($sql);
$stmt = -> bind_param('s', $username);
$stmt -> execute();
$stmt -> store_result();

if ($stmt mysqli_num_rows >= 1){
	$stmt -> bind_result($id, $mail, $password);
	$stmt -> fetch();
	echo "Checked result rows(Found row/rows)";

	if ($row['username'] === $username && $row['password'] === $password && $row['mail'] === $mail) {
		echo "Matched!";
		$_SESSION['username'] = $row['username'];
		$_SESSION['mail'] = $row['mail'];
		$_SESSION['id'] = $row['id'];

} else{
	echo "User dose not exist";
}
}

echo "EYYY";
?>
