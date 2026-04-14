<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Phan Truong Thinh" />
    <title>Add Member</title>
</head>

<body>

    <h1>Insert VIP Member</h1>

    <?php
    require_once("settings.php");

    $conn = @mysqli_connect($host, $user, $pswd, $dbnm)
        or die("Failed to connect to server");

    $table = "vipmembers";

    $create_table = "CREATE TABLE IF NOT EXISTS $table(
member_id INT AUTO_INCREMENT PRIMARY KEY,
fname VARCHAR(40),
lname VARCHAR(40),
gender VARCHAR(1),
email VARCHAR(40),
phone VARCHAR(20)
)";

    mysqli_query($conn, $create_table);

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $query = "INSERT INTO $table (fname,lname,gender,email,phone)
VALUES ('$fname','$lname','$gender','$email','$phone')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "New member added successfully";
    } else {
        echo "Insert failed";
    }

    mysqli_close($conn);
    ?>

</body>

</html>