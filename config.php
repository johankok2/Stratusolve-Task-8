<?php
session_start();
$dbHost = 'localhost';
$dbName = 'stratusolvetask8';
$dbUsername = 'root';
$dbPassword = '';
$dbc = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
?>