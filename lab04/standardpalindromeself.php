<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Phan Truong Thinh" />
    <title>Perfect Palindrome (Self Processing)</title>
</head>

<body>

<h1>Lab 04 Task 2 - Perfect Palindrome</h1>
<hr>

<!-- FORM -->
<form action="standardpalindromeself.php" method="post">
    <label for="palindrome_input">String:</label>

    <input 
        type="text"
        name="palindrome_input"
        id="palindrome_input"
        required
        value="<?php 
            if (isset($_POST['palindrome_input'])) {
                echo htmlspecialchars($_POST['palindrome_input']);
            }
        ?>"
    />

    <br><br>

    <input type="submit" value="Check for Perfect Palindrome">
</form>

<hr>

<!-- PROCESSING -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["palindrome_input"]) && trim($_POST["palindrome_input"]) !== "") {

        $input = $_POST["palindrome_input"];

        // Convert to lowercase
        $cleaned = strtolower($input);

        // Remove punctuation and spaces
        $cleaned = str_replace(
            [' ', ',', '.', '!', '?', "'", '"', ':', ';', '-', '@', '/', '\\'],
            "",
            $cleaned
        );

        // Reverse string
        $reversed = strrev($cleaned);

        // Compare
        if (strcmp($cleaned, $reversed) === 0) {
            echo "<p style='color: green'>
                    The text you entered '<strong>" .
                    htmlspecialchars($input) .
                    "</strong>' is a perfect palindrome.
                  </p>";
        } else {
            echo "<p style='color: red'>
                    The text you entered '<strong>" .
                    htmlspecialchars($input) .
                    "</strong>' is not a perfect palindrome.
                  </p>";
        }

    } else {
        echo "<p style='color: red'>Please enter a string.</p>";
    }
}
?>

</body>
</html>
