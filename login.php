<?php
// login.php
$salt = 'XyZzy12*_';
$stored_hash = '$2y$10$eI0YyNx2d8XJRHk.QsAN1eR2ntrnB7q1Y2lS85T0ZhI4AsK7Tay0m'; // This should be a hashed password using password_hash() instead of MD5
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['who']) || empty($_POST['pass'])) {
        $error = 'User name and password are required';
    } else {
        // Use password_hash and password_verify for secure password handling
        $check = hash('md5', $salt . $_POST['pass']);
        if (password_verify($_POST['pass'], $stored_hash)) { // Check with password_verify instead of md5
            session_start();
            $_SESSION['name'] = $_POST['who'];
            header('Location: game.php?name=' . urlencode($_POST['who']));
            exit();
        } else {
            $error = 'Incorrect password';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - Rock Paper Scissors - 28efcdfa</title> <!-- Title tag -->
</head>
<body>
    <h1>Please Log In</h1>
    <?php
    if ($error !== '') {
        echo '<p style="color: red;">' . htmlentities($error) . '</p>';
    }
    ?>
    <form method="POST">
        <label for="who">Username:</label>
        <input type="text" name="who" id="who"><br>
        <label for="pass">Password:</label>
        <input type="password" name="pass" id="pass"><br>
        <input type="submit" value="Log In">
    </form>
    <p><a href="index.php">Go back</a></p>
    <p><a href="login.php">Please Log In</a></p> <!-- Correct anchor tag with exact text -->
</body>
</html>
