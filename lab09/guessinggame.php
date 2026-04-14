

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Guessing Game</title>
</head>
<body>

<h1>Guessing Game</h1>

<form method="post">
    <label>Enter your guess (0-100):</label>
    <input type="text" name="guess">
    <input type="submit" value="Guess">
</form>
<?php
session_start();


if (!isset($_SESSION["number"])) {
    $_SESSION["number"] = rand(0, 100);
    $_SESSION["count"] = 0;
}

$message = "";

if (isset($_POST["guess"])) {
    $guess = $_POST["guess"];

    if (filter_var($guess, FILTER_VALIDATE_INT) !== false && $guess >= 0 && $guess <= 100) {
        
        $_SESSION["count"]++;

        if ($guess < $_SESSION["number"]) {
            $message = "Your guess is too LOW!";
        } elseif ($guess > $_SESSION["number"]) {
            $message = "Your guess is too HIGH!";
        } else {
            $message = "Correct! You guessed it in " . $_SESSION["count"] . " attempts.";
        }
    } else {
        $message = "Please enter a number between 0 and 100.";
    }
}
?>

<p><?php echo $message; ?></p>
<p>Number of guesses: <?php echo $_SESSION["count"]; ?></p>

<p><a href="giveup.php">Give Up</a></p>
<p><a href="startover.php">Start Over</a></p>

</body>
</html>