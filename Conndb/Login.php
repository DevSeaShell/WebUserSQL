
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
<br>
<form id = "LoForm" method = "post" action = "Conndb/connection.php">
    <label for="username">Username:</label>
    <input type="text" name="LogUsername" required>
    <label for="email">Email:</label>
    <input type="text" name="LogEmail" required>
    <label for="password">Password:</label>
    <input type="password" name="LogPassord" required>
    <button type="submit">Login</button>
</form>
</body>
</html>

<?php

?>
