<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Phan Truong Thinh" />
    <title>Display Cars</title>
</head>

<body>

    <h1>Web Programming - Lab08</h1>

    <?php
    require_once("settings.php");

    // Connect to database
    $conn = @mysqli_connect($host, $user, $pswd, $dbnm)
        or die("Failed to connect to server");

    // SQL query
    $query = "SELECT car_id, make, model, price FROM cars";

    // Execute query
    $result = mysqli_query($conn, $query);

    // Display table
    echo "<table border='1'>";
    echo "<tr>
<th>Car ID</th>
<th>Make</th>
<th>Model</th>
<th>Price</th>
</tr>";

    $row = mysqli_fetch_row($result);

    while ($row) {
        echo "<tr>";
        echo "<td>{$row[0]}</td>";
        echo "<td>{$row[1]}</td>";
        echo "<td>{$row[2]}</td>";
        echo "<td>{$row[3]}</td>";
        echo "</tr>";

        $row = mysqli_fetch_row($result);
    }

    echo "</table>";

    mysqli_close($conn);
    ?>

</body>

</html>