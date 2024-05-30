<?php // Sørger for at brukeren må være logget in.
session_start();
if (!isset($_SESSION['id'])){
    header('Location: /Login.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Welcome! <?php echo $_SESSION['user_username'];?> You are logged in!</h1>

    <div id = HeaderPages>
        <a href = "home.php"> Home</a>
        <a href = "home.php"> Profile</a>
        <a href = "home.php"> Content</a>
        <a href = "home.php"> About us</a>
        <a href = "home.php"> Fun games</a>
    </div>
</body>
</html>