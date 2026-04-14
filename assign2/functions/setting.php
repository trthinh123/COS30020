<?php

            $host = "feenix-mariadb.swin.edu.au";
            $user = "s104188395"; // your user name
            $pswd = "100604"; // your password d(date of birth – ddmmyy)
            $dbnm = "s104188395_db"; // your database


            // Connect to database 
            $conn = new mysqli($host, $user, $pswd, $dbnm);

            if ($conn->connect_error) {
                die("<p style=color:red >Unable to connect to the database server.</p>"
                    . "<p>Error code {$conn->connect_errno}: {$conn->connect_error}</p>");
            }
            
            ?>