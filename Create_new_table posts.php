
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
  // sql to create table with name `posts` //      
       $sql = "CREATE TABLE `posts` (
      `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
      `userid` int(11)NOT NULL,
      `post_text` varchar(2000) DEFAULT NULL,
      `post_time_stamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
      FOREIGN KEY (userid) REFERENCES `users`(id))"; 
  if ($conn->query($sql) === TRUE) {    
    echo "Table with name `posts` created successfully.";
  } else { 
    echo "Failed to create table with name `posts`: " . $conn->error;
  }
  $conn->close(); 
  
 ?>