<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" >
<meta name="description" content="Web Programming :: Lab 2" >
<meta name="keywords" content="Web,programming" >
<title>Lab2 - Web Advance</title>
</head>
<body>
    <?php 
         echo "<p>The Days of the week in English are:</p>";
         $days = array( "Sunday", "Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
         for($i=0; $i < count($days); $i++)
            {
            echo $days[$i]. "<br>";
         }
         echo "<p>The days of the week in French are:</p>";
         $days = array( "Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi");
         for($i=0; $i < count($days); $i++){
            echo $days[$i]. "<br>";
         }
         
    ?>
</body>
</html>