<?php
$php_version = phpversion();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>About This Assignment</title>
    <meta name="description" content="Web development">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Phan Truong Thinh">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f5f6f7;
            margin: 0;
            color: #1f2d3d;
        }

        .container {
            max-width: 900px;
            margin: 80px auto;
            background: white;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border-radius: 10px;
        }

        h1 {
            margin-bottom: 30px;
        }

        .section {
            margin-bottom: 30px;
        }

        .section h3 {
            margin-bottom: 15px;
            border-left: 5px solid #f15a22;
            padding-left: 10px;
        }

        ul {
            padding-left: 20px;
        }

        li {
            margin-bottom: 8px;
        }

        .btn-group {
            margin-top: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin-right: 10px;
            background-color: #f15a22;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #d94e1d;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>About This Assignment</h1>

        <!-- Tasks -->
        <div class="section">
            <h3>Tasks Not Attempted / Not Completed</h3>
            <ul>
                <li>All core required tasks have been completed (registration, login, add friend, friend list).</li>
                <li>No major task has been left incomplete.</li>
                <li>Some minor improvements such as UI polish and extra validation could be enhanced further.</li>
            </ul>
        </div>

        <!-- Special Features -->
        <div class="section">
            <h3>Special Features Implemented</h3>
            <ul>
                <li>Session-based authentication to manage logged-in users.</li>
                <li>Add Friend system with mutual relationship stored in database.</li>
                <li>Mutual friend count displayed when adding friends.</li>
                <li>Pagination implemented in Add Friend page for better performance.</li>
                <li>Prepared statements used in several queries to improve security.</li>
                <li>Dynamic update of number of friends when adding/removing friends.</li>
            </ul>
        </div>

        <!-- Difficulties -->
        <div class="section">
            <h3>Parts That Gave Me Trouble</h3>
            <ul>
                <li>Designing the database relationship between friends (myfriends table).</li>
                <li>Handling mutual friends calculation correctly.</li>
                <li>Managing session and redirect flow after login and actions.</li>
                <li>Preventing duplicate friend relationships.</li>
                <li>Pagination logic with SQL LIMIT and OFFSET.</li>
            </ul>
        </div>

        <!-- Improvements -->
        <div class="section">
            <h3>What I Would Do Better Next Time</h3>
            <ul>
                <li>Improve UI/UX with better styling and responsive design.</li>
                <li>Refactor code into reusable functions and separate logic layers.</li>
                <li>Enhance security (hash passwords instead of plain text).</li>
                <li>Add AJAX to improve user experience without page reload.</li>
                <li>Optimize SQL queries for better performance.</li>
            </ul>
        </div>



        <!-- Links -->
        <div class="section">
            <h3>Navigation Links</h3>

            <div class="btn-group">
                <a class="btn" href="friendlist.php">Friend List</a>
                <a class="btn" href="friendadd.php">Add Friends</a>
                <a class="btn" href="index.php">Home Page</a>
            </div>
        </div>

    </div>

</body>

</html>