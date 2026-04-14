<?php
session_start();

if (isset($_SESSION["number"])) {
    echo "<h1>The number was: " . $_SESSION["number"] . "</h1>";
} else {
    echo "<h1>No game in progress.</h1>";
}
?>

<p><a href="startover.php">Start New Game</a></p>