<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="Web Programming :: Lab 2">
    <meta name="keywords" content="Web,programming">
    <title>Lab2 - Web Advance</title>
</head>
<body>

    
    <form method="get" action="">
        <label for="num">Enter a number:</label>
        <input type="text" name="num" id="num">
        <input type="submit" value="Check">
    </form>

    

    
    <?php
        if (isset($_GET['num'])) {
            $num = $_GET['num'];

            if (is_numeric($num)) {
                $new_num = round($num);

                if ($new_num % 2 == 0) {
                    echo "<p>The variable $num <b>contains an even</b> number.</p>";
                } else {
                    echo "<p>The variable $num <b>contains an odd</b> number.</p>";
                }
            } else {
                echo "<p>The variable $num <b>does not contain a number</b>.</p>";
            }
        }
    ?>
</body>
</html>
