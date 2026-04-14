<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Phan Truong Thinh" />
    <title>lab 0 task 2</title>
</head>

<body>
    <h1>Lab 05 guest book show</h1>
    <?php // read the comments for hints on how to answer each item
    $filename = "../../data/guestbook.txt";
    if (is_readable($filename)) {

        echo "<pre>";


        $data = readfile($filename);

        echo "</pre>";
    } else {
        echo "<p>Guest book is empty or cannot be read.</p>";
    }
    ?>


    
</body>

</html>