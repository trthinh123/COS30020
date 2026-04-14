<?php
// ===== PHP PROCESSING =====
require_once("functions/setting.php");
session_start();

$emails = "";
$profiles = "";


if (isset($_POST["submit"])) {




    // ===== GET INPUT =====
    $emails = trim($_POST["email"]);
    $profiles = trim($_POST["prof_name"]);
    $password = $_POST["pwd"];
    $confirm = $_POST["cf_pwd"];

    $errors = [];


    // ===== VALIDATION =====
    if (!filter_var($emails, FILTER_VALIDATE_EMAIL) || empty($emails) ||  preg_match('/\s/', $emails)) {
        $errors[] = "Enter emails in right format and less than 40 character";
    }

    if (!preg_match("/^[a-zA-Z]+$/", $profiles) || empty($profiles)  || strlen($profiles) > 35 || preg_match('/\s/', $profiles)) {
        $errors[] = "Please enter the Profile contain letters only and not blankk and the length must be less than 35 character";
    }

    if (!preg_match("/^[a-zA-Z0-9]+$/", $password) || strlen($password) > 15  || preg_match('/\s/', $password) || empty($password)) {
        $errors[] = "Please enter password, password must contain letters and numbers only and less than 15 and ";
    }


    if ($password !== $confirm || empty($confirm) || preg_match('/\s/', $confirm)) {
        $errors[] = "Passwords do not match, please enter the confirm password";
    }



    // ===== CHECK EMAIL EXISTS =====
    $stmt = $conn->prepare("SELECT friend_id FROM friends WHERE friend_email = ?");
    $stmt->bind_param("s", $emails);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $errors[] = "Email already exists";
    }

    $stmt->close();

    // ===== INSERT =====
if (empty($errors)) {

    $date = date("Y-m-d");

    $stmt = $conn->prepare("INSERT INTO friends 
    (friend_email, password, profile_name, date_started, num_of_friends)
    VALUES (?, ?, ?, ?, 0)");

    $stmt->bind_param("ssss", $emails, $password, $profiles, $date);

    if ($stmt->execute()) {

        $_SESSION["user_id"] = $conn->insert_id;
        $_SESSION["profile_name"] = $profiles;

        session_regenerate_id(true);

        header("Location: friendadd.php");
        exit();

    } else {
        echo "<p style='color:red'>Insert failed</p>";
    }

    $stmt->close();
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development">
    <meta name="author" content="Phan Truong Thinh">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Registration Page</title>
</head>

<body class="login-page">
    <header>
        <div class="logo">My Friends System</div>
        <nav>
            <a href="index.php">Home</a>
            <a href="signup.php">Sign Up</a>
            <a href="login.php">Log in</a>
            <a href="about.php">About</a>
        </nav>
    </header>


    <div class="login-container">


        <form method="post" action="" class="login-card">

            <h2>Register</h2>

            <div class="input-group">
                <label>Email:</label>
                <input type="text" name="email" value="<?php echo htmlspecialchars($emails); ?>">
            </div>

            <div class="input-group">
                <label>Profile Name:</label>
                <input type="text" name="prof_name" value="<?php echo htmlspecialchars($profiles); ?>">
            </div>

            <div class="input-group">
                <label>Password:</label>
                <input type="password" name="pwd" placeholder="Enter password">
            </div>

            <div class="input-group">
                <label>Confirm Password:</label>
                <input type="password" name="cf_pwd" placeholder="Confirm password">
            </div>

            <input type="submit" name="submit" value="Register" class="btn-login">
            <button type="button" onclick="window.location.href='signup.php'" class="btn-login">
                Clear
            </button>
            <?php
            if (!empty($errors)) {
                foreach ($errors as $e) {
                    echo "<p class='error'>$e</p>";
                }
            }
            ?>

        </form>

    </div>


</body>

</html>