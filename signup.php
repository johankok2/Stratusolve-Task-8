<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>
<head>
<title> SignUp - Stratusolve</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
<h1 style="font-size:32px; text-align: center; "> USER REGISTRATION </h1> 
  <div class="row">
  <div class="col-sm-4"> 
  </div>
  <div class="col-sm-4">
  <img src="Xstratusolve.jpg"  alt="Logo" class="Logo img-fluid"><br><br> 
  </div>
  <div class="col-sm-4"> 
  </div>
<?php 
  if(isset($_POST['signup'])){
  extract($_POST);
  if(strlen($fname)<3){ // Minimum character length
      $error[] = 'Please enter First Name using 3 charaters at least.';
        }
  if(strlen($fname)>20){  // Max character length
      $error[] = 'First Name: Max length 20 Characters / Not allowed';
        }
  if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z -]*$/", $fname)){
      $error[] = 'Invalid Entry First Name. Please Enter letters without any Digits or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,)';
        }    
  if(strlen($lname)<3){ // Minimum 
      $error[] = 'Please enter Last Name using 3 charaters at least.';
        }
  if(strlen($lname)>20){  // Max 
      $error[] = 'Last Name: Max length 20 Characters / Not allowed';
        }
  if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z -]*$/", $lname)){
      $error[] = 'Invalid Entry Last Name. Please Enter letters without any Digits or special symbols like ( 1,2,3#,$,%,&,*,!,~,`,^,)';
        }    
  if(strlen($username)<8){ // Change Minimum Length   
      $error[] = 'Please enter Username using 8 charaters at least.';
        }
  if(strlen($username)>20){ // Change Max Length 
      $error[] = 'Username : Max length 20 Characters  / Not allowed'; 
        }
  if(!preg_match("/^[^A-Z0-9@#$%^&*()+!~`|';:<>,.[{}](?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-z0-9._]+(?<![_.])$/", $username)){ 
      $error[] = 'Invalid Entry for Username. Enter lowercase letters without any space and No numbers at the start- Eg - myusername or myuser123';
        }  
  if(strlen($email)>30){  // Max 
      $error[] = 'Email: Max length 30 Characters / Not allowed';
        }
  if($passwordConfirm ==''){
      $error[] = 'Please confirm the password.';
        }
          if($password != $passwordConfirm){
            $error[] = 'Passwords do not match.';
        }
          if(strlen($password)<5){ // min 
            $error[] = 'The password is 6 characters long.';
        }
          if(strlen($password)>30){ // Max 
            $error[] = 'Password: Max length 30 Characters / Not allowed';
        }
          $sql="select * from `users` where (username='$username' or email='$email');";
      $res=mysqli_query($dbc,$sql);
  if (mysqli_num_rows($res) > 0) {
      $row = mysqli_fetch_assoc($res);

  if($username==$row['username'])
     {
    $error[] ='Username already Exists.';
          } 
  if($email==$row['email'])
       {
     $error[] ='Email already Exists.';
          } 
      }
  if(!isset($error)){ 
            $date=date('Y-m-d');
            $options = array("cost"=>4);
    $password = password_hash($password,PASSWORD_BCRYPT,$options);
            $result = mysqli_query($dbc,"INSERT into `users` values('','$fname','$lname','$username','$email','$password','$date')");
  if($result)
    {
     $done=2; 
    }
  else{
      $error[] ='Failed : Something went wrong';
    }
 }
 } ?>
		 <div class="col-sm-4">
 <?php 
  if(isset($error)){ 
foreach($error as $error){ 
  echo '<p class="errmsg">&#x26A0;'.$error.' </p>'; 
}
}
?>
		</div>
		<div class="col-sm-4">
      <?php if(isset($done)) 
      { ?>
    <div class="successmsg"><span style="font-size:100px;">&#9989;</span> <br> You have registered successfully. <br> <a href="login.php" style="color:#fff;">Login here please.....? </a> </div>
      <?php } else { ?>
       <div class="signup_form">
		<form action="" method="POST">
  <div class="form-group">
        <label class="label_txt"><b>First Name :<b></label>
    <input type="text" class="form-control" name="fname" value="<?php if(isset($error)){ echo $_POST['fname'];}?>" required="">
  </div>
  <div class="form-group">
    <label class="label_txt">Last Name :</label>
    <input type="text" class="form-control" name="lname" value="<?php if(isset($error)){ echo $_POST['lname'];}?>" required="">
  </div>
 
<div class="form-group">
    <label class="label_txt">Username (user ID) :</label>
    <input type="text" class="form-control" name="username" value="<?php if(isset($error)){ echo $_POST['username'];}?>" required="">
  </div>
<div class="form-group">
    <label class="label_txt">Email Address :</label>
    <input type="email" class="form-control" name="email" value="<?php if(isset($error)){ echo $_POST['email'];}?>" required="">
    <small id="emailHelp" class="text-danger"class="form-text text-muted">POPI (Act) = We'll never share your email address with anyone else.</small>
  </div>
  <div class="form-group">
    <label class="label_txt">Password :</label>
    <input type="password" name="password" class="form-control" required="">
  </div>
   <div class="form-group">
    <label class="label_txt">Confirm Password :</label>
    <input type="password" name="passwordConfirm" class="form-control" required="">
  </div>
  <button type="submit" name="signup" class="btn btn-info btn-group-lg form_btn">Register as User</button><br><br>
  <button type="reset" value="reset" class="btn btn-danger btn-group-lg form_btn">Reset Incorrect Input</button><br><br>
   <p>Have an account?  <a href="login.php" class="btn btn-primary" >Login as User</a> </p>
  <p><a href="logout.php"class="btn btn-warning" >Logout</a></p>
</form>
<?php } ?> 
</div>
		</div>
		<div class="col-sm-4">
		</div>
	</div>
</div> 
</body>
</html>