<?php
session_start();

if (!isset($_SESSION['name'])) {
    die('Name parameter missing');
}

$names = ['Rock', 'Paper', 'Scissors'];
$result = '';

function check($computer, $human) {
    if ($computer == $human) {
        return 'Tie';
    }
    if (($human == 0 && $computer == 2) || ($human == 1 && $computer == 0) || ($human == 2 && $computer == 1)) {
        return 'You Win';
    }
    return 'You Lose';
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}

if (isset($_POST['human'])) {
    $human = $_POST['human'];
    if ($human >= 0 && $human <= 2) { // Validate to ensure it's a valid selection
        $computer = rand(0, 2);
        $result = check($computer, $human);
    } else {
        $result = 'Invalid selection';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Play Game - Rock Paper Scissors</title> <!-- Title tag -->
</head>
<body>
    <h1>Welcome, <?= htmlentities($_SESSION['name']) ?>!</h1>
    <form method="POST">
        <label for="human">Choose Your Move:</label>
        <select name="human" id="human">
            <option value="0">Rock</option>
            <option value="1">Paper</option>
            <option value="2">Scissors</option>
        </select>
        <input type="submit" value="Play">
        <input type="submit" name="logout" value="Logout">
    </form>

    <?php
    if (isset($_POST['human']) && isset($human)) {
        if ($human >= 0 && $human <= 2) {
            echo "Your Play: " . $names[$human] . "<br>";
            echo "Computer Play: " . $names[$computer] . "<br>";
            echo "Result: " . $result . "<br>";
        } else {
            echo "Please select a valid option.";
        }
    }
    ?>
</body>
</html>
