<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Job Vacancy Processing</title>
    <meta name="description" content="Web development">
    <meta name="keywords" content="HTML, CSS">
    <meta name="author" content="Phan Truong Thinh">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
        .container {
            max-width: 800px;
            margin: 100px auto;
            background: white;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        h2 {
            margin-bottom: 25px;
            color: #1f2d3d;
        }

        .success-box {
            background: #eafaf1;
            border-left: 5px solid #2ecc71;
            padding: 15px 20px;
            margin-bottom: 20px;
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
<h2>Job Vacancy Processing</h2>

<?php

// ===== PATH =====
$dir  = "../../data/jobs";
$file = $dir . "/positions.txt";

// Auto create directory
if (!file_exists($dir)) {
    mkdir($dir, 0777, true);
}

// ===== GET INPUT (PHP 5 SAFE) =====
$position_id  = isset($_POST['position_id']) ? trim($_POST['position_id']) : '';
$title        = isset($_POST['title']) ? trim($_POST['title']) : '';
$description  = isset($_POST['description']) ? trim($_POST['description']) : '';
$closing_date = isset($_POST['closing_date']) ? trim($_POST['closing_date']) : '';
$position     = isset($_POST['position']) ? $_POST['position'] : '';
$contract     = isset($_POST['contract']) ? $_POST['contract'] : '';
$location     = isset($_POST['location']) ? $_POST['location'] : '';
$application  = isset($_POST['application']) ? $_POST['application'] : array();

$errors = array();

// ===== VALIDATION =====

// Mandatory
if (
    empty($position_id) || empty($title) || empty($description) ||
    empty($closing_date) || empty($position) ||
    empty($contract) || empty($location) || empty($application)
) {
    $errors[] = "All fields are mandatory.";
}

// Position ID format
if (!preg_match("/^ID\d{3}$/", $position_id)) {
    $errors[] = "Position ID must start with ID followed by 3 digits.";
}

// Title validation
if (!preg_match("/^[a-zA-Z0-9 ,.!\s]{1,20}$/", $title)) {
    $errors[] = "Title must be max 20 valid characters.";
}

// Description validation
if (strlen($description) > 100) {
    $errors[] = "Description must be max 100 characters.";
}

// Date validation
$dateObject = DateTime::createFromFormat('d/m/y', $closing_date);
if (!$dateObject || $dateObject->format('d/m/y') != $closing_date) {
    $errors[] = "Closing Date must be in dd/mm/yy format.";
}

// Unique ID check
if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES);

    foreach ($lines as $line) {
        $fields = explode("\t", $line);
        if ($fields[0] == $position_id) {
            $errors[] = "Position ID already exists.";
            break;
        }
    }
}

// ===== DISPLAY ERRORS =====
if (!empty($errors)) {

    echo "<div class='error_box'>";
    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }
    echo "</div>";

    echo "<a class='btn' href='postjobform.php'>Return to Post Job</a><br>";
    echo "<a class='btn' href='index.php'>Return to Home</a>";
    echo "</div></body></html>";
    exit;
}

// ===== PREPARE DATA =====
$app_post  = in_array("Post", $application) ? "Post" : "";
$app_email = in_array("Email", $application) ? "Email" : "";

$record = $position_id . "\t" .
          $title . "\t" .
          $description . "\t" .
          $closing_date . "\t" .
          $position . "\t" .
          $contract . "\t" .
          $location . "\t" .
          $app_post . "\t" .
          $app_email . "\n";

// ===== WRITE FILE =====
$handle = fopen($file, "a");
fwrite($handle, $record);
fclose($handle);

// ===== SUCCESS =====
echo "<div class='success-box'>";
echo "<p><strong>Success!</strong> Job vacancy has been saved.</p>";
echo "<p><strong>Position ID:</strong> " . htmlspecialchars($position_id) . "</p>";
echo "</div>";

echo "<a class='btn' href='index.php'>Return to Home Page</a>";

?>

</div>

</body>
</html>