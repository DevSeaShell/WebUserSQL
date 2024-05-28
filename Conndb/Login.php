
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

// Saves input from logmain. Handles symbles as text(Protection from some attempted attacks) ($conn->real_escape_string)
$mail = $conn->real_escape_string($_POST['logmail']);
$username = $conn->real_escape_string($_POST['logusername']);
$password = ($_POST['logpassword']);

print_r($mail);
print_r('logpassword');
// Checks if input exists in the database.
$sql_get = "SELECT * FROM users WHERE username = '$username'";
$result = $conn -> query($sql_get);
echo "Database Result";
//Code above works fine ------------

if ($sql = "SELECT id, mail, password FROM users WHERE username = ?") {
$stmt = $conn -> Prepare($sql);
$stmt -> bind_param('s', $username);
$stmt -> execute();
$stmt -> store_result();
echo "RESULTS!!";
}

// all above works --------
if ($stmt -> num_rows > 0){
	$stmt -> bind_result($id_res, $mail_res, $password_res);
	$stmt -> fetch();
	echo "Checked result rows(Found row/rows)";

	print_r($id_res);
	print_r($mail_res);
	print_r($password_res);

	print_r($mail);
	print_r($password);

	if ($password === $password_res && $mail === $mail_res) {
		echo "Matched!";
		$_SESSION['username'] = [$username];
		$_SESSION['mail'] = [$mail];
		$_SESSION['id'] = [$id];

	} else {
		echo "Not Matched..";
	}
} else{
	echo "User dose not exist";
}

echo "EYYY";
?>
