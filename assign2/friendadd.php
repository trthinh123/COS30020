<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Web application development">
    <meta name="author" content="Phan Truong Thinh">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Add Friend</title>
</head>

<body>

    <header class="header">
        <div class="logo">My Friends System</div>
        <nav>
            <a href="index.php">Home</a>
            <a href="signup.php">Sign Up</a>
            <a href="login.php">Log in</a>
            <a href="about.php">About</a>
        </nav>
    </header>

    <div class="container">

        <?php
        session_start();


        if (!isset($_SESSION["user_id"])) {
            header("Location: login.php");
            exit();
        }

        $user_id = $_SESSION["user_id"];
        $profile_name = $_SESSION["profile_name"];
        // ===== PAGINATION =====
        $limit = 10;
        $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
        if ($page < 1) $page = 1;

        $offset = ($page - 1) * $limit;
        ?>

        <h2 class="title"><?php echo $profile_name; ?> - Add Friend</h2>

        <?php
        // ===== DB CONFIG =====
        require_once("functions/setting.php");
        // ===== HANDLE ADD FRIEND =====
        if (isset($_GET["add"])) {

            $add_id = (int) $_GET["add"];

            $sql = "INSERT INTO myfriends (friend_id1, friend_id2) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $user_id, $add_id);
            $stmt->execute();

            $stmt2 = $conn->prepare($sql);
            $stmt2->bind_param("ii", $add_id, $user_id);
            $stmt2->execute();

            $conn->query("UPDATE friends 
                  SET num_of_friends = num_of_friends + 1 
                  WHERE friend_id = $user_id");

            $conn->query("UPDATE friends 
                  SET num_of_friends = num_of_friends + 1 
                  WHERE friend_id = $add_id");

            // header("Location: friendadd.php");
            header("Location: friendadd.php");
            exit();
            // exit();
        }

        // ===== GET TOTAL FRIEND =====
        $sql = "SELECT COUNT(*) AS total
        FROM friends 
        WHERE friend_id != ?
        AND friend_id NOT IN (
            SELECT friend_id2 FROM myfriends WHERE friend_id1 = ?
        )";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $user_id, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $total = $row["total"];
        echo "<p class='total'>Total friends: <strong>$total</strong></p>";

        // ===== GET LIST USERS =====
        $sql = "SELECT friend_id, profile_name 
        FROM friends 
        WHERE friend_id != ?
        AND friend_id NOT IN (
            SELECT friend_id2 FROM myfriends WHERE friend_id1 = ?
        )
        ORDER BY profile_name
        LIMIT ? OFFSET ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiii", $user_id, $user_id, $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();

        // ===== DISPLAY =====
        echo "<div class='card'>";
        echo "<table>";

        echo "<tr>
        <th>Name</th>
        <th>Action</th>
      </tr>";

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $friend_id = $row["friend_id"];

                // ===== MUTUAL FRIEND =====
                $sql_mutual = "SELECT COUNT(*) AS mutual
               FROM myfriends m1
               JOIN myfriends m2 ON m1.friend_id2 = m2.friend_id2
               WHERE m1.friend_id1 = ?
               AND m2.friend_id1 = ?";

                $stmt_mutual = $conn->prepare($sql_mutual);
                $stmt_mutual->bind_param("ii", $user_id, $friend_id);
                $stmt_mutual->execute();
                $res_mutual = $stmt_mutual->get_result();
                $mutual_row = $res_mutual->fetch_assoc();
                $mutual = $mutual_row["mutual"];

                echo "<tr>";

                echo "<td class='user'>";
                echo "<div class='avatar'></div>";
                echo "<span>" . htmlspecialchars($row["profile_name"]) .
                    " ($mutual mutual)</span>";
                echo "</td>";

                echo "<td>";
                echo "<a class='btn-add' href='friendadd.php?add=" . $row["friend_id"] . "'>
                Add
              </a>";
                echo "</td>";

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No available users</td></tr>";
        }

        echo "</table>";
        echo "</div>";
        // ===== PAGINATION BUTTON =====
        $total_pages = ceil($total / $limit);

        echo "<div class='pagination'>";

        if ($page > 1) {
            echo "<a href='friendadd.php?page=" . ($page - 1) . "'>Previous</a>";
        }

        if ($page < $total_pages) {
            echo "<a href='friendadd.php?page=" . ($page + 1) . "'>Next</a>";
        }

        echo "</div>";

        $conn->close();
        ?>

        <div class="footer-links">
            <a href="friendlist.php">Friend List</a>
            <a href="logout.php">Log out</a>
        </div>

    </div>
</body>

</html>