<?php
require_once("hitcounter.php");
require_once("../../data/lab10/mykeys.inc.php");

$table = "hitcounter";

//create object
$Counter = new HitCounter($host, $user, $pswd, $dbnm, $table);

// Reset to 0
$Counter->startOver();

echo "<p>Counter reset to 0</p>";

//close kết nối
$Counter->closeConnection();
?>