<?php
session_start();
session_destroy();

// redirect về guessinggame.php
header("Location: guessinggame.php");
exit();