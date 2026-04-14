    <!DOCTYPE html>

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="description" content="Web Programming :: Lab 2">
        <meta name="keywords" content="Web,programming">
        <title>Lab3 - Web Advance</title>
    </head>

    <body>
        <?php
        function is_prime($number)
        {
            if (!($number > 1 && $number < 999)) {
                return false;
            }

            if ($number == 1) {
                return false;
            }

            $sqrt_num = floor(sqrt($number));

            for ($n = 2; $n <= $sqrt_num; $n++) {
                if ($number % $n == 0) {
                    return false;
                }
            }
            return true;
        }

        $input = isset($_GET["value"]) ? $_GET["value"] : "";


        if ($input === "" || !is_numeric($input)) {
            echo "<p style='color: blue;'>Please enter a number</p>";
        } else {
            if (is_prime($input)) {
                echo "<p style='color: green;'>The number you entered $input is a prime number.</p>";
            } else {
                echo "<p style='color: blue;'>The number you entered $input is not a prime number.</p>";
            }
        }
        ?>


    </body>

    </html>