<?php
session_start();
$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if fields are filled
    if (empty($_POST['who']) || empty($_POST['pass'])) {
        $error_message = 'User name and password are required';
    } else {
        // Set salt and stored hash
        $salt = 'XyZzy12*_';
        $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
        
        // Concatenate salt and password, hash it
        $check_hash = hash('md5', $salt . $_POST['pass']);
        
        // Check if hashed password matches stored hash
        if ($check_hash != $stored_hash) {
            $error_message = 'Incorrect password';
        } else {
            // Set the session variable and redirect
            $_SESSION['name'] = $_POST['who'];
            header("Location: game.php"); // Redirect to game page
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>28efcdfa</title>
</head>
<body>
    <h2>Please Log In</h2>
    <form method="POST">
        <!-- Username Field -->
        <label for="who">Username:</label>
        <input type="text" name="who" id="who" value="">
        <br><br>
        
        <!-- Password Field -->
        <label for="pass">Password:</label>
        <input type="password" name="pass" id="pass" value="">
        <br><br>
        
        <!-- Error Message Display -->
        <?php
        if ($error_message) {
            echo '<p style="color:red;">' . $error_message . '</p>';
        }
        ?>
        
        <!-- Login Button -->
        <button type="submit">Log In</button>
        <button type="button" class="cancel-btn" onclick="window.location.href='index.php';">Cancel</button>

        <p>For a password hint view source and find a password hint in HTML comments.</p>
    </form>
</body>
</html>
