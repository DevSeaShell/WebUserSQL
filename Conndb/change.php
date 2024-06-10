<?php
echo"IM HERE";
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
echo "Connected!";

$CurrentUsername = $_SESSION['user_username'];

$username = $conn->real_escape_string($_POST['newusername']);

$sql = "SELECT * FROM users WHERE username = '$username'";
$result_u = $conn -> query($sql);
echo"Database results";

if (mysqli_num_rows($result_u) > 0){
    echo"Username Taken";

} else {

    $sql = "UPDATE users SET username = '$username' WHERE username = $CurrentUsername";

    if ($conn -> query($sql)) === TRUE{
        echo"Successfully Updated";
    } else {
        echo"Failed to Update";
    }
}
$conn -> close();

echo"EYY!";
?>