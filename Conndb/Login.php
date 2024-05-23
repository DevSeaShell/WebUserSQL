
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
$sql_u = "SELECT * FROM users WHERE username = '$username'";
$result_u = $conn -> query($sql_u);
echo "Database Result";
//Code above works fine ------------

if (mysqli_num_rows($result_u) === 0){
	echo "user dose not exist";
} else { // Under this comment - Something that isnt right or just not working
	($stmt = $conn -> prepare ("SELECT id, mail, password FROM users WHERE username = ?")){
		$stmt -> bind_param("s", $username);
		$stmt -> execute();
		$stmt -> store_result();

		if ($stmt->num_rows > 0){
		$stmt -> bind_result($id, $mail, $password);
			
		if ($stmt -> fetch()){
			echo "Got user INFO!!";

			if ($_POST['logpassword'] === $password){
				echo "Correct password!";
			}
			if ($_POST['logmail'] === $mail){
				echo "Matching mail!";
			}
		}

		echo "Bind Result Check!";
		}
	}

}

echo "EYYY";
?>
