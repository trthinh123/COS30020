<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Phan Truong Thinh" />
    <title>Display Members</title>
</head>

<body>

    <h1>VIP Members</h1>

    <?php
    require_once("settings.php");

    $conn = @mysqli_connect($host, $user, $pswd, $dbnm)
        or die("Failed to connect");

    $query = "SELECT member_id,fname,lname FROM vipmembers";

    $queryResult = mysqli_query($conn, $query);

    echo "<table border='1'>";
    echo "<tr>
<th>Member ID</th>
<th>First Name</th>
<th>Last Name</th>
</tr>";

    $row = mysqli_fetch_row($queryResult);

    while ($row) {
        echo "<tr>";
        echo "<td>{$row[0]}</td>";
        echo "<td>{$row[1]}</td>";
        echo "<td>{$row[2]}</td>";
        echo "</tr>";
        $row = mysqli_fetch_row($queryResult);
    }

    echo "</table>";

    mysqli_close($conn);
    ?>

</body>

</html>