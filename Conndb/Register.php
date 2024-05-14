
<?php
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "My1BirbSQL";
$dbName = "UserDatabase";

$conn = mysqli_connect( $dbServername , $dbUsername , $dbPassword , $dbName );

// Checking for connection errors
if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}

$regusername = $_POST['username'];
$regmail = $_POST['mail'];
$regpassword = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = '$regusername'";
	if (mysqli_num_rows($result) >=1) {
		echo "Name already exists";
	} else {
		// Insert cuery here
		$sql = "INSERT INTO users (username, passworde, mail) VALUES ('$regusername','$regpassord','$regemail')";
	
		if (!mysqli_query($conn,$sql))
		{
			die('Error: ' . mysqli_error($conn));
		}
	}

mysqli_close($conn);

echo "EYYY"
?>