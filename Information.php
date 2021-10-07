<!DOCTYPE html>
<?php require_once("config.php");
if (!isset($_SESSION['userid'])){
    header("location:login.php"); 
    }
 ?>
<html>
<head>
<title>Stratusolve - Information Page</title>
<link rel="stylesheet" href="style-info.css">
</head>
<body>
<div class="container">
<h1>Details about Statusolve</h1>
<div class="content">
<p class="normal">⌘ Reach out --- Let us help you create your dreams if you have an idea for a software project that you need to deliver ⌘</p>
<div class="info-1">
<h2>About us :</h2>
<p> Stratusolve (Pty) Ltd is a software company based in Centurion, Pretoria, that specialises in custom “Software as a Service” (SaaS) solutions, or what we call on-demand SaaS. 
	The business is built on the rapid development of cloud-based software solutions for modern consumer devices such as notebooks, tablets and smartphones.
	We promote a data-driven, web-first appoach. Therefore we always start by creating a web application using languages like HTML, JavaScript and CSS. Our solutions can be exported as native apps if required.</p>
</div> <br>
<div class="info-2">
<h2>Business Values :</h2>
<p> The SaaS model, in combination with the divblox rapid application development framework, allows for a number of benefits. Solutions are developed and maintained in a fraction of the time it would take,
	compared to traditional methods and technologies, which results in a substantial cost saving with regards to development fees over the long term. 
	This ensures a return on investment very early on in the project lifecycle. Other benefits of this approach:</p>
<ul>
<li>No hardware or setup costs</li>
<li>No hardware maintenance costs</li>
<li>Free core framework upgrades, ensuring a modern and secure solution</li>
<li>Easy and continuous customisation of the solution for the duration of the project life cycle</li></p>
</ul>
</div> 
<p class="normal">⌘ Get in touch --- Post us your comments about your software requirements and let's have a chat about how we can help you achieve your goals.
   We don't charge for a consultation of this kind, so you have nothing to lose........⌘</p>
<p><a href="Homepage.php">Back to Homepage</a></p>
</body>
</html>