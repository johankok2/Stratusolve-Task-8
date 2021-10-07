<?php
require_once("config.php"); 
// Destroy session
if (session_destroy()) {
// Redirecting to Login Page   
header("location:index.php"); 
}
?>

