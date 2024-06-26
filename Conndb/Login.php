
<?php

session_start();

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

// Saves input from logmain. Handles symbles as text(Protection from attacks) ($conn->real_escape_string)
$mail = $conn->real_escape_string($_POST['logmail']);
$username = $conn->real_escape_string($_POST['logusername']);
$password = $conn->real_escape_string($_POST['logpassword']);

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
	$stmt -> close();
	echo "Checked result rows(Found row/rows)";

	if (password_verify($password, $password_res) && $mail === $mail_res) {
		echo "Matched!";
		session_regenerate_id();
		$_SESSION['user_username'] = $username;
		$_SESSION['user_id'] = $id_res;
		
		header('Location: ../Pages/home.php');

	} else {
		echo "Not Matched..";
	}
} else{
	echo "User dose not exist";
}

echo "EYYY";
?>
