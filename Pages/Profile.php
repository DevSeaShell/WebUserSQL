<?php
session_start();
if (!isset($_SESSION['user_id'])){
    header("Location: ./Conndb/Login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1> Your Profile <?php echo($_SESSION['user_username'])?></h1>
    <div id = HeaderPages>
        <a href = "home.php"> Home</a>
        <a href = "Profile.php"> Profile</a>
        <a href = "content.php"> Content</a>
        <a href = "home.php"> About us</a>
        <a href = "home.php"> Fun games</a>
        <span><a id="logout" href="../Conndb/Logout.php">Logout</a></span>
    </div>

    <form id = "ReNaForm" method = "post" action = "../Conndb/change.php">
        <h1>Change your Username here</h1>
        <label for="username">New Username:</label>
        <input type="text" name="newusername" required>
        <br>
        <button type="submit" id="SubNewuserN">Submit</button>
    </form>
</body>
</html>