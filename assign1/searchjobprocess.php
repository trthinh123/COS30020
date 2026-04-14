<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Search Result</title>
    <meta name="description" content="Web development">
    <meta name="keywords" content="HTML, CSS">
    <meta name="author" content="Phan Truong Thinh">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
        h2 {
            margin-bottom: 25px;
            color: #1f2d3d;
        }
    </style>
</head>

<body>
<header>
    <div class="logo">JOB VACANCY SYSTEM</div>
    <nav>
        <a href="postjobform.php">POST JOB</a>
        <a href="searchjobform.php">SEARCH JOB</a>
        <a href="about.php">ABOUT</a>
    </nav>
</header>

<div class="container">
<h2>Search Result</h2>

<?php

$file = "../../data/jobs/positions.txt";

$title     = isset($_GET['title']) ? trim($_GET['title']) : '';
$position  = isset($_GET['position']) ? $_GET['position'] : '';
$contract  = isset($_GET['contract']) ? $_GET['contract'] : '';
$location  = isset($_GET['location']) ? $_GET['location'] : '';
$app_type  = isset($_GET['application']) ? $_GET['application'] : '';

$errors  = array();
$results = array();

if (!file_exists($file)) {
    $errors[] = "No job postings found.";
}

if (empty($errors)) {

    $today = DateTime::createFromFormat('d/m/y', date('d/m/y'));

    $lines = file($file, FILE_IGNORE_NEW_LINES);

    foreach ($lines as $line) {

        $fields = explode("\t", $line);

        if (count($fields) < 9) {
            continue;
        }

        $match = true;

        // Title
        if (!empty($title)) {
            if (stripos($fields[1], $title) === false) {
                $match = false;
            }
        }

        // Position
        if (!empty($position)) {
            if ($fields[4] != $position) {
                $match = false;
            }
        }

        // Contract
        if (!empty($contract)) {
            if ($fields[5] != $contract) {
                $match = false;
            }
        }

        // Location
        if (!empty($location)) {
            if ($fields[6] != $location) {
                $match = false;
            }
        }

        // Application type
        if (!empty($app_type)) {
            if ($fields[7] != $app_type && $fields[8] != $app_type) {
                $match = false;
            }
        }

        if ($match) {

            $closingDate = DateTime::createFromFormat('d/m/y', $fields[3]);

            if ($closingDate && $closingDate >= $today) {
                $results[] = $fields;
            }
        }
    }

    if (empty($results)) {
        $errors[] = "No matching job found.";
    }

    // Sort descending by closing date
    usort($results, function ($a, $b) {

        $dateA = DateTime::createFromFormat('d/m/y', $a[3]);
        $dateB = DateTime::createFromFormat('d/m/y', $b[3]);

        if ($dateB > $dateA) return 1;
        if ($dateB < $dateA) return -1;
        return 0;
    });
}

// DISPLAY ERRORS
if (!empty($errors)) {

    echo "<div class='error_box'>";
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
    echo "</div>";

    echo "<a class='btn' href='searchjobform.php'>Search Again</a><br>";
    echo "<a class='btn' href='index.php'>Return to Home</a>";

} else {

    foreach ($results as $fields) {

        echo "<div class='result-card'>";
        echo "<p><strong>Position ID:</strong> " . htmlspecialchars($fields[0]) . "</p>";
        echo "<p><strong>Title:</strong> " . htmlspecialchars($fields[1]) . "</p>";
        echo "<p><strong>Description:</strong> " . htmlspecialchars($fields[2]) . "</p>";
        echo "<p><strong>Closing Date:</strong> " . htmlspecialchars($fields[3]) . "</p>";
        echo "<p><strong>Position:</strong> " . htmlspecialchars($fields[4]) . "</p>";
        echo "<p><strong>Contract:</strong> " . htmlspecialchars($fields[5]) . "</p>";
        echo "<p><strong>Location:</strong> " . htmlspecialchars($fields[6]) . "</p>";
        echo "<p><strong>Application by:</strong> " . htmlspecialchars(trim($fields[7] . " " . $fields[8])) . "</p>";
        echo "</div>";
    }

    echo "<a class='btn' href='searchjobform.php'>Search Again</a><br>";
    echo "<a class='btn' href='index.php'>Return to Home</a>";
}
?>

</div>
</body>
</html>