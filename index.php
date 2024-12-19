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
    <p>Attempt to go to <a href="game.php">game.php</a> without logging in - it should fail with An error message</p>
</body>
</html>
