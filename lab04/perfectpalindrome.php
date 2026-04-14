<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta name="description" content="Web application development"/>
        <meta name="keywords" content="PHP" />
        <meta name="author" content="Phan Truong Thinh" />
        <title>Perfect Palindrome Result</title>
</head>
    <body>
        <?php 
            // check if input is null or space only -> echo 
            if (isset($_POST["palindrome_input"]) && trim($_POST["palindrome_input"]) !== "")
            {
                // Define input variable
                $input = $_POST["palindrome_input"];
                // Define input but in lowercase
                $cleaned= strtolower($input);
                // Define reversed variable 
                $reversed = strrev($cleaned); 

                // check if the 2 srtings are the same 
                if (strcmp($cleaned, $reversed) === 0) 
                {
                    echo "<p style='color: green'>The text you enter '<strong>", htmlspecialchars($input), "</strong>' is a perfect palindrom.</p>";
                }
                else 
                {
                    echo "<p style='color: red'>The text you enter '<strong>", htmlspecialchars($input), "</strong>' is not a perfect palindrom.</p>";
                }
            }
            else 
            {
               echo "<p style='color: red'>Please enter string from the input form.</p>";
            }
        ?>

    </body>
</html>