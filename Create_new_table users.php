
<?php
   $servername = "localhost";
   $username = "root"; 
   $password = "";
   $database = "stratusolvetask8";
  // Create connection
  $conn = new mysqli($servername, $username, $password, $database);  	
  // Check connection  	
  if ($conn->connect_error) {      
    die("Failed to connect to database: " . $conn->connect_error);
  }
  // sql to create table with name users //      
    $sql = "CREATE TABLE `users` (
      `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `fname` varchar(200) DEFAULT NULL,
      `lname` varchar(200) DEFAULT NULL,
      `username` varchar(200) DEFAULT NULL UNIQUE,
      `email` varchar(300) DEFAULT NULL UNIQUE,
      `password` varchar(200) DEFAULT NULL,
      `date` date NOT NULL)"; 
  if ($conn->query($sql) === TRUE) {    
    echo "Table with name `users` created successfully.";
  } else { 
    echo "Failed to create table with name `users`: " . $conn->error;
  }
  $conn->close(); 
  
 ?>