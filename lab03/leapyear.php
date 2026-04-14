<!DOCTYPE html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="Web Programming :: Lab 2">
    <meta name="keywords" content="Web,programming">
    <title>Lab3 - Web Advance</title>
</head>

<body>
    <?php
    function leapyearCheck($year)
    {
        if ($year % 4 == 0) {
            if ($year % 100 == 0) {
                if ($year % 400 == 0) {
                    return true; // divisible by 4, 100 & 400 : is leap 
                } else {
                    return false; // divisble by 4 & 100 but not 400: not leap
                }
            } else {
                return true; // divisble by 4 but not 100: is leap 
            }
        } else {
            return false; // not divisible by 4: not leap 
        }
    }

    // call the function 
    if (isset($_GET['year']) && $_GET['year'] !== '') {
        $input = $_GET["year"];
        if (is_numeric($input)) {
            if (leapyearCheck($input)) {
                echo "<p style='color: green;'>The year you entered $input is a leap year.</p>";
            } else {
                echo "<p style='color: red;'>The year you entered $input is not a leap year.</p>";
            }
        } else {
            echo "<p style='color: orange;'>Enter a numberic year.</p>";
        }
    } else {
        echo "<p style='color: orange;'>Enter a numberic year.</p>";
    }
    ?>

</body>

</html>