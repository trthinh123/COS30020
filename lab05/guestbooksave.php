<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Phan Truong Thinh" />
    <title>lab 0 task 2</title>
</head>

<body>
    <h1>Web Programming - Lab 5</h1>
    <?php // read the comments for hints on how to answer each item
    if (
        isset($_POST["first_name"], $_POST["last_name"]) &&
        trim($_POST["first_name"]) !== "" &&
        trim($_POST["last_name"]) !== ""
    ) { // check if both form data exists
        $first_name = $_POST["first_name"]; // obtain the form item data
        $last_name = $_POST["last_name"]; // obtain the form quantity data
        $filename = "../../data/guestbook.txt"; // assumes php file is inside lab05
        $handle = fopen($filename, "a"); // open the file in append mode
        $data = addslashes($first_name . " " . $last_name . "\n"); // concatenate item and qty delimited by comma
        fwrite($handle, $data); // write string to text file
        fclose($handle); // close the text file


        echo "<p style='color:green'>Thank you for signing our guest book!</p>";
    } else { // no input
        echo "<p style='color:red'>You must enter your first and last name!<br>Use the Browser's 'Go Back' button to return to the Guestbook form.</p>";
    }
    echo '<p><a href="guestbookshow.php">Show Guest Book</a></p>';
    ?>
</body>

</html>