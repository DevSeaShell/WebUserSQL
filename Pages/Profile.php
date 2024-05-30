<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1> Your Profile <?php htmlspecialchars($_SESSION['user_username'], ENT_QUOTES)?> </h1>
</body>
</html>