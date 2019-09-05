<?php

								$servername = "localhost";
								$username = "root";
								$password = "ac3r";
								$dbname = "product";

 								$conn = new mysqli($servername, $username, $password, $dbname);

  								if($conn->connect_error)
    							 {
    								die("connection Failed: " . $conn->connect_error);
    							 }

?> 
