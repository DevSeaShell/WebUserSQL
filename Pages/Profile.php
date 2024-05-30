<?php
session_start();
if (!isset($_SESSION['user_username'])){
    header("Location: ./Conndb/Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1> Your Profile <?=htmlspecialchars($_SESSION['user_username'], ENT_QUOTES)?></h1>
    <div id = HeaderPages>
        <a href = "home.php"> Home</a>
        <a href = "Profile.php"> Profile</a>
        <a href = "home.php"> Content</a>
        <a href = "home.php"> About us</a>
        <a href = "home.php"> Fun games</a>
    </div>
</body>
</html>