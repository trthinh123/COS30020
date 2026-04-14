<?php
require_once("hitcounter.php");
require_once("../../data/lab10/mykeys.inc.php");

$table = "hitcounter";

//Create object
$Counter = new HitCounter($host, $user, $pswd, $dbnm, $table);

//Take a certain hit
$hits = $Counter->getHits();

$Counter->setHits();

echo "<h1>Hit Counter</h1>";
echo "<p>Number of hits: $hits</p>";

//close connection
$Counter->closeConnection();
echo '<p><a href="startover.php">Start Over</a></p>';
?>
