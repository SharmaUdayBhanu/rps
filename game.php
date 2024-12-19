<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['name'])) {
    die("Error: You need to log in first to access the game.");
}

// Function to check the result of the game
function check($computer, $human) {
    if ($computer == $human) {
        return "Tie";
    }
    
    // 0 - Rock, 1 - Paper, 2 - Scissors
    if (($human == 0 && $computer == 2) || 
        ($human == 1 && $computer == 0) || 
        ($human == 2 && $computer == 1)) {
        return "You Win";
    } else {
        return "You Lose";
    }
}

$names = array("Rock", "Paper", "Scissors");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['play'] == 'Play') {
        $human = $_POST['choice'];
        $computer = rand(0, 2);  // Computer selects randomly between 0, 1, 2
        $result = check($computer, $human);
        
        // Display the result
        echo "Your Play=" . $names[$human] . " Computer Play=" . $names[$computer] . " Result=" . $result;
    } elseif ($_POST['play'] == 'Logout') {
        session_destroy(); // Destroy the session
        header('Location: login.php'); // Redirect to login page after logout
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rock Paper Scissors 28efcdfa</title>
</head>
<body>
    <h2>Welcome <?php echo htmlspecialchars($_SESSION['name']); ?>! Play Rock Paper Scissors</h2>
    
    <!-- Display instructions and buttons -->
    <p>Please select a strategy and press Play.</p>

    <form method="POST">
        <label for="choice">Choose:</label>
        <select name="choice" id="choice">
            <option value="0">Rock</option>
            <option value="1">Paper</option>
            <option value="2">Scissors</option>
        </select>
        <br><br>
        
        <!-- Play and Logout Buttons -->
        <button type="submit" name="play" value="Play">Play</button>
        <button type="submit" name="play" value="Logout">Logout</button>
    </form>
    
    <!-- Test functionality -->
    <form method="POST">
        <button type="submit" name="play" value="Test">Test</button>
    </form>

    <?php
    // Test all combinations
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['play'] == "Test") {
        for ($c = 0; $c < 3; $c++) {
            for ($h = 0; $h < 3; $h++) {
                $r = check($c, $h);
                echo "Human=" . $names[$h] . " Computer=" . $names[$c] . " Result=" . $r . "<br>";
            }
        }
    }
    ?>
</body>
</html>
