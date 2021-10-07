<!doctype html>
<html dir="ltr" lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STRATUSOLVE HOME PAGE</title>
	<link rel="stylesheet" href="style.css"> 
  </head>
<body> 
<center>
<img src="Stratusolve.jpg" alt="Logo">
</center>
<h1>**** Homepage ****</h1> 
<h3>Content Management System </h3> 
<div class="content"> 
<ul> 
  <li><a href="Information.php">Stratusolve Information</a></li> 
  <li><a href="My-New-Account.php">User Profile</a></li> 
  <li><a href="create-a-post.php">Post a Comment</a></li>
  <li><a href="logout.php">Logout</a></li>
</div>
<h3>Comments Posted By Users</h3>
<div class="content"> 
<?php												
include_once("config.php");
if (!isset($_SESSION['userid'])){
header("location:login.php"); 
}
$result = mysqli_query($dbc, "SELECT fname,lname,post_text,post_time_stamp FROM `posts` LEFT JOIN `users` ON `users`.id = `posts`.userid");  
?> 
<table width='100%'height='15%' border='1%'> 
<td><b>Name</b></td> 
<td><b>Surname</b></td>
<td><b>Comments Posted</b></td>
<td><b>Date Posted</b></td>
</tr>
<?php 
while($res = mysqli_fetch_array($result)) { 
echo "<tr>";
		echo "<td>".$res['fname']."</td>";
		echo "<td>".$res['lname']."</td>";
		echo "<td>".$res['post_text']."</td>";
		echo "<td>".$res['post_time_stamp']."</td>";	
}
?> 
</table>
</div>
</article>
</main>
</body>
</html>