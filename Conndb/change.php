<?php
echo"IM HERE<br>";
session_start();
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
echo "Connected! <br>";

$CurrentUsername = $_SESSION['user_username'];
$username = $conn->real_escape_string($_POST['newusername']);

$sql = "SELECT * FROM users WHERE username = '$username'";
$result_u = $conn -> query($sql);
echo"Database results <br>".$CurrentUsername;

//printf("%c".$CurrentUsername. "<br>");    

if (mysqli_num_rows($result_u) > 0){
    echo"Username Taken<br>";

} else {

    print_r($username. "<br>");
    print_r($CurrentUsername. "<br>");
    $sql_new = "UPDATE users SET username = '$username' WHERE username like '$CurrentUsername'";

    if ($conn -> query($sql_new) === TRUE){
        echo"Successfully Updated <br>";
		header("Location: ./Pages/Profile.php");

    } else {
        echo"Failed to Update<br>";
    }
}
$conn -> close();

echo"EYY! <br>";
?>