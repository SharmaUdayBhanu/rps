<?php
$salt = 'XyZzy12*_';
$stored_hash = '$2y$10$eI0YyNx2d8XJRHk.QsAN1eR2ntrnB7q1Y2lS85T0ZhI4AsK7Tay0m'; // Secure password hash
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['who']) || empty($_POST['pass'])) {
        $error = 'User name and password are required';
    } else {
        // Check if the entered password matches the hashed password
        if (password_verify($_POST['pass'], $stored_hash)) {
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
    <title>Login - Rock Paper Scissors</title> <!-- Title tag -->
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
</body>
</html>
