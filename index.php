<?php
session_start();
if (isset($_SESSION['name'])) {
    header('Location: game.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>28efcdfa</title> <!-- Title tag -->
</head>
<body>
    <h1>Welcome to Rock Paper Scissors</h1>
    <a href="login.php">Please Log In</a>
</body>
</html>
