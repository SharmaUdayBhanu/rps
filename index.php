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
    <title>Rock Paper Scissors</title> <!-- Title tag -->
</head>
<body>
    <h1>Welcome to Rock Paper Scissors</h1>
    <p>Please <a href="login.php">Log In</a> to play.</p> <!-- Login link only -->
</body>
</html>
