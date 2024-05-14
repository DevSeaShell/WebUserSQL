<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Register</h1>
<br>
<form id = "reForm" method = "post" action = "Conndb/connection.php">
    <label for="username">Username:</label>
    <input type="text" name="RegUsername" required>
    <label for="email">Email:</label>
    <input type="text" name="RegEmail" required>
    <label for="password">Password:</label>
    <input type="password" name="RegPassord" required>
    <button type="submit">Register</button>
</form>
</body>
</html>


<?php
$sql = mysqli_query("SELECT FROM users (username, passworde, mail) WHERE username = '$RegUsername'");
	if (mysqli_num_rows($sql)>=1){
		echo "Name already exists";
	} else {
		// Insert cuery here
		$sql = "INSERT INTO users (username, passworde, mail) VALUES ('$RegUsername','$RegPassord','$RegEmail');";
	}

if (!mysqli_query($conn,$sql))
	{
	die('Error: ' . mysqli_error($conn));
	}
mysqli_close($conn);
?>