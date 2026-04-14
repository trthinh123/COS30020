<?php
session_start();
require_once("functions/setting.php");

// ===== CHECK LOGIN =====
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();;
}

$user_id = $_SESSION["user_id"];
$profile_name = $_SESSION["profile_name"];


// ===== HANDLE UNFRIEND =====
if (isset($_GET["remove"])) {

    $remove_id = (int) $_GET["remove"];

    // DELETE u
    $sql = "DELETE FROM myfriends 
            WHERE (friend_id1 = ? AND friend_id2 = ?) 
               OR (friend_id1 = ? AND friend_id2 = ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iiii", $user_id, $remove_id, $remove_id, $user_id);
    $stmt->execute();

    // UPDATE num of user (user)
    $stmt2 = $conn->prepare("UPDATE friends 
                            SET num_of_friends = num_of_friends - 1 
                            WHERE friend_id = ?");
    $stmt2->bind_param("i", $user_id);
    $stmt2->execute();

    // UPDATE num of friebds (friend)
    $stmt3 = $conn->prepare("UPDATE friends 
                            SET num_of_friends = num_of_friends - 1 
                            WHERE friend_id = ?");
    $stmt3->bind_param("i", $remove_id);
    $stmt3->execute();

    // prevent delete while refreshing
    header("Location: friendlist.php");
    exit();
}

// ===== GET FRIEND LIST =====
$sql = "SELECT f.friend_id, f.profile_name
        FROM friends f
        JOIN myfriends m ON f.friend_id = m.friend_id2
        WHERE m.friend_id1 = ?
        ORDER BY f.profile_name";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$count = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Web application development">
    <meta name="author" content="Phan Truong Thinh">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Friend List</title>
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

    <div class="container">

        <h2 class="title"><?php echo htmlspecialchars($profile_name); ?> - Friend List</h2>
        <p class="total">Total friends: <?php echo $count; ?></p>

        <div class="card">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>

                <?php
                if ($count > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td>
                                <div class="user">
                                    <div class="avatar"></div>
                                    <?php echo htmlspecialchars($row["profile_name"]); ?>
                                </div>
                            </td>

                            <td>
                                <a class="btn-add" href="friendlist.php?remove=<?php echo $row["friend_id"]; ?>">
                                    Unfriend
                                </a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='2'>No friends yet</td></tr>";
                }
                ?>
            </table>
        </div>

        <div class="footer-links">
            <a href="friendadd.php">Add Friends</a>
            <a href="logout.php">Log out</a>
        </div>

    </div>

</body>

</html>

<?php
$conn->close();
?>