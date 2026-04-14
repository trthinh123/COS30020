<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="description" content="Web application development" />
        <meta name="keywords" content="PHP" />
        <meta name="author" content="Phan Truong Thinh" />
        <title>String Form</title>
    </head>
    <body>
        <h1>Lab 04 Task 2 - Perfect Palindrome</h1>
        <hr>
        <form action="perfectpalindrome.php" method="post">
            <label for="palindrome_input">
                String: 
            </label>
            <input 
                type = "text"
                name ="palindrome_input"
                id = "palindrome_input"
                required
                />
            <br><br>
            <input 
                type = "submit" 
                value="Check for Perfect Palindrome"/>
        </form>
    </body>
</html>