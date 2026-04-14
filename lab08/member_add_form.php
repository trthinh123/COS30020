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

    <h1>Add Member Form</h1>

    <form action="member_add.php" method="post">

        <p>
            <label for="fname">First Name:</label>
            <input name="fname" required />
        </p>

        <p>
            <label for="lname">Last Name:</label>
            <input name="lname" required />
        </p>

        <p>
            <label for="gender">Gender:</label>

            <label>
                <input type="radio" name="gender" value="M" required>
                M
            </label>

            <label>
                <input type="radio" name="gender" value="F" required>
                F
            </label>

        </p>

        <p>
            <label for="email">Email:</label>
            <input type="email" name="email" required />
        </p>

        <p>
            <label for="phone">Phone:</label>
            <input type="text" name="phone" required />
        </p>

        <p>
            <input type="submit" value="Add Member" />
            <input type="reset" value="Clear Form" />
        </p>

    </form>

</body>

</html>