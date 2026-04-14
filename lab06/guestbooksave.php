<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Phan Truong Thinh" />
    <title>Lab 6 Task 2</title>
</head>

<body>
    <h1>Web Programming - Lab 6</h1>

<?php

// Check if form data exists and not empty
if (
    isset($_POST["name"], $_POST["email"]) &&
    trim($_POST["name"]) !== "" &&
    trim($_POST["email"]) !== ""
) {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);

    $filename = "../../data/guestbook.txt";

    // Create directory if not exists
    if (!file_exists("../../data/lab06")) {
        mkdir("../../data/lab06", 0777, true);
    }

    // Create file if not exists
    if (!file_exists($filename)) {
        $handle = fopen($filename, "w");
        fclose($handle);
    }

    // Read file into array
    $guests = file($filename, FILE_IGNORE_NEW_LINES);

    $name_exists = false;
    $email_exists = false;

    foreach ($guests as $guest) {
        $parts = explode(",", $guest); // name,email
        if (count($parts) == 2) {
            if ($parts[0] === $name) {
                $name_exists = true;
            }
            if ($parts[1] === $email) {
                $email_exists = true;
            }
        }
    }

    if ($name_exists || $email_exists) {
        echo "<p style='color:red'>This name or email already exists in the guestbook!</p>";
    } else {
        $handle = fopen($filename, "a");
        fwrite($handle, $name . "," . $email . "\n");
        fclose($handle);

        echo "<p style='color:green'>Thank you for signing our guest book!</p>";
    }

} else {
    echo "<p style='color:red'>
            You must enter both name and email!<br>
            Use the Browser's 'Go Back' button to return.
          </p>";
}

echo '<p><a href="guestbookshow.php">Show Guest Book</a></p>';

?>

</body>
</html>