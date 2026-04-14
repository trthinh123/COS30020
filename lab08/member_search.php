<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Phan Truong Thinh" />
    <title>Search Member</title>
</head>

<body>

    <h1>Search VIP Member</h1>

    <form method="get" action="member_search.php">
        Last Name:
        <input type="text" name="lname">
        <input type="submit" value="Search">
    </form>

    <?php

    if (isset($_GET['lname'])) {

        require_once("settings.php");

        $conn = @mysqli_connect($host, $user, $pswd, $dbnm)
            or die("Failed to connect");

        $lname = mysqli_real_escape_string($conn, $_GET['lname']);

        $query = "SELECT member_id,fname,lname,email
FROM vipmembers
WHERE lname LIKE '%$lname%'";

        $queryResult = mysqli_query($conn, $query);

        echo "<table border='1'>";
        echo "<tr>
<th>ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
</tr>";

        $row = mysqli_fetch_row($queryResult);

        while ($row) {
            echo "<tr>";
            echo "<td>{$row[0]}</td>";
            echo "<td>{$row[1]}</td>";
            echo "<td>{$row[2]}</td>";
            echo "<td>{$row[3]}</td>";
            echo "</tr>";
            $row = mysqli_fetch_row($queryResult);
        }

        echo "</table>";

        mysqli_close($conn);
    }

    ?>

</body>

</html>