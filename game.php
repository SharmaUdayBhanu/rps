<?php
// game.php
session_start();

if (!isset($_SESSION['name'])) {
  die('Name parameter missing');
}

$names = ['Rock', 'Paper', 'Scissors'];
$result = '';

function check($computer, $human)
{
  if ($computer == $human)
    return 'Tie';
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
  $computer = rand(0, 2);
  $result = check($computer, $human);
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Play Game - Rock Paper Scissors - 28efcdfa</title>
</head>

<body>
  <h1>Welcome, <?= htmlentities($_SESSION['name']) ?>!</h1>
  <form method="POST">
    <select name="human">
      <option value="0">Rock</option>
      <option value="1">Paper</option>
      <option value="2">Scissors</option>
      <option value="3">Test</option>
    </select>
    <input type="submit" value="Play">
    <input type="submit" name="logout" value="Logout">
  </form>
  <?php
  if (isset($_POST['human'])) {
    if ($_POST['human'] == 3) {
      for ($c = 0; $c < 3; $c++) {
        for ($h = 0; $h < 3; $h++) {
          $r = check($c, $h);
          echo "Human=" . $names[$h] . " Computer=" . $names[$c] . " Result=" . $r . "<br>";
        }
      }
    } else {
      echo "Your Play=" . $names[$human] . " Computer Play=" . $names[$computer] . " Result=" . $result;
    }
  }
  ?>
</body>

</html>