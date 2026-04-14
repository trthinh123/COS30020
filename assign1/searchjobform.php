<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Job Vacancy</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }



        .container {
            width: 50%;
            margin: 80px auto;
            background: white;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        h1 {
            margin-bottom: 25px;
            color: #1f2d3d;
        }

        label {
            display: block;
            margin-top: 20px;
            font-weight: 500;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        .option-group {
            margin-top: 10px;
        }

        .option-group label {
            display: inline-block;
            margin-right: 20px;
            font-weight: 400;
        }

        button {
            margin-top: 30px;
            padding: 12px 25px;
            border: none;
            background: #f15a22;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        button:hover {
            background: #d94c1b;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #1f2d3d;
        }

        .back-link:hover {
            color: #f15a22;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">JOB VACANCY SYSTEM</div>
        <nav>
            <a href="postjobform.php">POST JOB</a>
            <a href="searchjobform.php">SEARCH JOB</a>
            <a href="about.php">ABOUT</a>
        </nav>
    </header>

    <div class="container">

        <h1>Advanced Job Search</h1>

        <form action="searchjobprocess.php" method="get">

            <!-- Job Title -->
            <label for="title">Job Title</label>
            <input type="text" id="title" name="title">

            <!-- Position -->
            <label>Position</label>
            <div class="option-group">
                <label><input type="radio" name="position" value="Full Time"> Full Time</label>
                <label><input type="radio" name="position" value="Part Time"> Part Time</label>
            </div>

            <!-- Contract -->
            <label>Contract</label>
            <div class="option-group">
                <label><input type="radio" name="contract" value="On-going"> On-going</label>
                <label><input type="radio" name="contract" value="Fixed term"> Fixed term</label>
            </div>

            <!-- Location -->
            <label>Location</label>
            <div class="option-group">
                <label><input type="radio" name="location" value="On site"> On site</label>
                <label><input type="radio" name="location" value="Remote"> Remote</label>
            </div>

            <!-- Application Type -->
            <label>Application Type</label>
            <div class="option-group">
                <label><input type="checkbox" name="application[]" value="Post"> Post</label>
                <label><input type="checkbox" name="application[]" value="Email"> Email</label>
            </div>

            <button type="submit">Search</button>

        </form>

        <a class="back-link" href="index.php">← Return to Home Page</a>

    </div>

</body>

</html>