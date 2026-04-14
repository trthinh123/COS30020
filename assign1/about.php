<?php
$php_version = phpversion();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>About This Assignment</title>
    <meta charset="utf-8">
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
            margin: 100px auto;
            background: white;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
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

        
    </style>
</head>

<body>

    <div class="container">

        <h1>About This Assignment</h1>

        <!-- PHP Version -->
        <div class="section">
            <h3>PHP Version on Mercury</h3>
            <ul>
                <li>The PHP version installed on Mercury is:
                    <strong><?php echo $php_version; ?></strong>
                </li>
            </ul>
        </div>

        <!-- Tasks Not Attempted -->
        <div class="section">
            <h3>Tasks Not Attempted / Not Completed</h3>
            <ul>
                <li>All required tasks (1–6) have been completed.</li>
                <li>Advanced Search (Task 7) implemented.</li>
                <li>Sorting by Closing Date (Task 8) implemented.</li>
            </ul>
        </div>

        <!-- Special Features -->
        <div class="section">
            <h3>Special Features Implemented</h3>
            <ul>
                <li>Automatic creation of "jobs" directory if not exists.</li>
                <li>Server-side validation using regular expressions.</li>
                <li>Unique Position ID checking.</li>
                <li>Date validation using DateTime object.</li>
                <li>Advanced search with multiple criteria.</li>
                <li>Sorting results by most future closing date.</li>
                <li>Styled user interface with modern responsive design.</li>
            </ul>
        </div>



        <a class="btn" href="index.php">Return to Home Page</a>

    </div>

</body>

</html>