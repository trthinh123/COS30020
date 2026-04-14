<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Friends System</title>
    <meta charset="utf-8">
    <meta name="description" content="Web development">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Phan Truong Thinh">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">My Friends System</div>
        <nav>
            <a href="index.php">Home</a>
            <a href="signup.php">Sign Up</a>
            <a href="login.php">Log in</a>
            <a href="about.php">About</a>
        </nav>
    </header>

    <section class="hero">
        <div class="content">
            <h1>Welcome to the My Friends System</h1>

            <div class="info">
                <p><strong>Name:</strong> Phan Truong Thinh</p>
                <p><strong>Student ID:</strong> 104188395</p>
                <p><strong>Email:</strong> 104188395@swin.edu.au</p>
            </div>

            <div class="declaration">
                I declare that this assignment is my individual work.
                I have not worked collaboratively, nor have I copied from
                any other student’s work or from any other source.
            </div>

            <div class="links">
                <a href="signup.php">Sign Up</a> &nbsp;&nbsp;
                <a href="login.php">Log In</a> &nbsp;&nbsp;
                <a href="about.php">About</a>
            </div>
            <?php

            require_once("functions/setting.php");



            // ===== CREATE TABLE =====
            $table1 = "friends";

            $create_table = "CREATE TABLE IF NOT EXISTS friends (
    friend_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    friend_email VARCHAR(40) NOT NULL,
    password VARCHAR(15) NOT NULL,
    profile_name VARCHAR(35) NOT NULL,
    date_started DATE NOT NULL,
    num_of_friends INT UNSIGNED DEFAULT 0
)";

            $conn->query($create_table);
            if (!$conn->query($create_table)) {
                error_log("Error creating table: " . $conn->error);
            }

            $table2 = "myfriends";

            $create_table = "CREATE TABLE IF NOT EXISTS myfriends (
                              friend_id1 INT NOT NULL,
                              friend_id2 INT NOT NULL
                            )";

            $conn->query($create_table);
            if (!$conn->query($create_table)) {
                error_log("Error creating table: " . $conn->error);
            }
            // ===== INSERT SAMPLE DATA (friends) =====
            $check = $conn->query("SELECT * FROM  $table1 LIMIT 1");

            if ($check->num_rows == 0) {
                $insertFriends = "INSERT INTO friends 
    (friend_email, password, profile_name, date_started, num_of_friends) VALUES
    ('john@gmail.com','123','John','2024-01-01',0),
    ('anna@gmail.com','123','Anna','2024-01-01',0),
    ('bob@gmail.com','123','Bob','2024-01-01',0),
    ('lisa@gmail.com','123','Lisa','2024-01-01',0),
    ('mike@gmail.com','123','Mike','2024-01-01',0),
    ('sara@gmail.com','123','Sara','2024-01-01',0),
    ('tom@gmail.com','123','Tom','2024-01-01',0),
    ('emma@gmail.com','123','Emma','2024-01-01',0),
    ('alex@gmail.com','123','Alex','2024-01-01',0),
    ('lucas@gmail.com','123','Lucas','2024-01-01',0)";

                $conn->query($insertFriends);
            }

            // ===== INSERT SAMPLE DATA (myfriends) =====
            $check2 = $conn->query("SELECT * FROM  $table2 LIMIT 1");

            if ($check2->num_rows == 0) {
                $insertMyFriends = "INSERT INTO myfriends (friend_id1, friend_id2) VALUES
    (1,2),(1,3),(2,3),(2,4),(3,5),
    (4,5),(5,6),(6,7),(7,8),(8,9),
    (9,10),(10,1),(3,6),(4,7),(5,8),
    (6,9),(7,10),(8,1),(9,2),(10,3)";

                $conn->query($insertMyFriends);
            }




            $conn->close();
            ?>

        </div>
    </section>




</body>

</html>