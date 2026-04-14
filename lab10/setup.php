<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development">
    <meta name="author" content="Phan Truong Thinh">
    <title>Setup</title>
</head>

<body>

    <h1>Web Programming – Lab10</h1>

    <form method="post" action="setup.php">

        <label>Username:</label><br>
        <input type="text" name="user" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="pwd"><br><br>

        <label>Database Name:</label><br>
        <input type="text" name="db" required><br><br>

        <input type="submit" name="setup" value="Set Up">

    </form>

    <?php
    // Connect to database 
    if (isset($_POST["setup"])) {

        $host = "feenix-mariadb.swin.edu.au";
        $user = $_POST["user"];
        $pswd = $_POST["pwd"];
        $dbnm = $_POST["db"];

        // Connect to database 
        $conn = new mysqli($host, $user, $pswd, $dbnm);

        if ($conn->connect_error) {
            die("<p>Unable to connect to the database server.</p>"
                . "<p>Error code {$conn->connect_errno}: {$conn->connect_error}</p>");
        }
        echo "<p>Connected successfully!</p>";

        // ===== CREATE mykeys.inc.php FILE =====
        $file_content = "<?php
    \$host = '$host';
    \$user = '$user';
    \$pswd = '$pswd';
    \$dbnm = '$dbnm';
    ?>";
        // Create folder and set permission 
        $dir = "../../data/lab10";
        if (!file_exists($dir)) {
            umask(0007);
            mkdir($dir, 0755, true); // set folder permission
        }

        // Create file and set permission
        $filename = "$dir/mykeys.inc.php";
        file_put_contents($filename, $file_content);
        echo "<p>Connection file created (mykeys.inc.php)</p>";

        // ===== CREATE TABLE =====
        $table = "hitcounter";

        $create_table = "CREATE TABLE IF NOT EXISTS hitcounter (
        id SMALLINT NOT NULL PRIMARY KEY,
        hits SMALLINT NOT NULL
    )";

        if ($conn->query($create_table)) {
            echo "<p>Table created successfully.</p>";
        } else {
            echo "<p>Error creating table: " . $conn->error . "</p>";
        }

        // ===== INSERT INITIAL VALUE =====
        $insert = "INSERT INTO hitcounter (id, hits)
               VALUES (1,0)
               ON DUPLICATE KEY UPDATE hits = hits";

        if ($conn->query($insert)) {
            echo "<p>Initial value inserted.</p>";
        } else {
            echo "<p>Error inserting: " . $conn->error . "</p>";
        }
        

        $conn->close();

        echo "<h3>Setup completed successfully!</h3>";
    }
    ?>

</body>

</html>