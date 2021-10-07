<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>
<head><br>
<title> Login Page - Stratusolve</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<table class="table table-condensed">  
	<div class="row">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4">
		<div class="login_form"> 
 	<form action="login_process.php" method="POST">
  <div class="form-group">

   <h1 style="font-size:35px; text-align: center; ">LOGIN</h1>  
  <img src="stratusolve.jpg"  alt="Logo" class="Logo img-fluid"><br><br>  
<?php 
if(isset($_GET['loginerror'])) {
	$loginerror=$_GET['loginerror'];
}
 if(!empty($loginerror)){  echo '<p class="errmsg">Invalid login credentials.</br>Please try again.....?</p>'; }
?>
    <label class="label_txt"><b>Username or Email Address :<b></label>
    <input type="text" name="login_var" value="<?php if(!empty($loginerror)){ echo $loginerror; } ?>" class="form-control" required="">
  </div>
  <div class="form-group">
    <label class="label_txt">Password :</label>
    <input type="password" name="password" class="form-control" required="">
  </div>
  <button type="submit" name="sublogin" class="btn btn-info btn-group-lg form_btn">Login as User</button><br><br>
  <button type="reset" value="reset" class="btn btn-danger btn-group-lg form_btn">Reset Incorrect Input</button><br>
</form>
   <br> 
    <p>No account yet? <a href="signup.php"class="btn btn-primary" >Register Here</a> </p>
  <p><a href="logout.php"class="btn btn-warning">Logout</a></p>
</div>
		</div>
		<div class="col-sm-4">
		</div>
		</div>
	</div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
