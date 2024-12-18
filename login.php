<?php
// login.php
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1'; // MD5 for 'XyZzy12*_php123'
$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['who']) || empty($_POST['pass'])) {
        $error = 'User name and password are required';
    } else {
        $check = hash('md5', $salt . $_POST['pass']);
        if ($check == $stored_hash) {
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
    <title>Login - Rock Paper Scissors - 28efcdfa</title>
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
</body>
</html>
