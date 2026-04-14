    <?php
    session_start();
    require_once("functions/setting.php");
    // ===== PHP PROCESSING =====


    if (isset($_POST["login"])) {



        $emails = trim($_POST["email"]);
        $password = $_POST["pwd"];

        $errors = [];

        // ===== VALIDATION =====

        // Check email not empty
        if (empty($emails) || !filter_var($emails, FILTER_VALIDATE_EMAIL) ||  preg_match('/\s/', $emails)) {
            $errors[] = "Please enter emails in right format and less than 40 character";
        }

        // Check password not empty
        if (empty($password) || !preg_match("/^[a-zA-Z0-9]+$/", $password) || strlen($password) > 15 || preg_match('/\s/', $password)) {
            $errors[] = "Please enter password  contain letters and numbers only and less than 15 and";
        }


        // ===== CHECK LOGIN =====
        if (empty($errors)) {

            $stmt = $conn->prepare("SELECT * FROM friends WHERE friend_email = ? AND password = ?");
            $stmt->bind_param("ss", $emails, $password);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows == 1) {

                $row = $result->fetch_assoc();

                // Set session
                $_SESSION["user_id"] = $row["friend_id"];
                $_SESSION["profile_name"] = $row["profile_name"];

                // Redirect
                header("Location: friendlist.php");
                exit();
            } else {
                $errors[] = "Invalid email or password";
            }
        }


        $conn->close();
    }



    ?>
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

            <form method="post" class="login-card">

                <h2>Login</h2>

                <div class="input-group">
                    <label>Email</label>
                    <input type="text" name="email"
                        value="<?php echo isset($emails) ? htmlspecialchars($emails) : ''; ?>">
                </div>

                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="pwd">
                </div>

                <input type="submit" name="login" value="Login" class="btn-login">
                <button type="button" onclick="window.location.href='login.php'" class="btn-login">
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







        </section>




    </body>

    </html>