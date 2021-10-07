<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
  <?php
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        require_once "config.php";
        if (!isset($_SESSION['userid'])){ 
            header("location:login.php"); 
            } 
        $id = trim($_GET["id"]);
        $query = mysqli_query($dbc, "SELECT * FROM `users` WHERE id = '$id'");
        if ($user = mysqli_fetch_assoc($query)) {
            $firstName   = $user["fname"];
            $lastName    = $user["lname"];
            $email       = $user["email"];
            $username    = $user["username"];
        } else {
            header("location: homepage.php");
            exit();
        }
        mysqli_close($dbc);
    } else {
        header("location: read.php");
        exit();
    }
  ?> 
    <div class="container"> </br> 
    <div class="row">  
	<div class="col-sm-4"> 
	</div> 
    <div class="col-sm-4"> 
    <div class="login_form"> 
<body>
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                       <h2 class="text-center">User Information </h2>
                    </div>
                    <div class="form-group">
                        <label><b>First Name :</b></label>  
                        <p class="form-control"><?php echo $firstName ?></p>
                    </div>
                    <div class="form-group">
                        <label><b>Last Name :</b></label>
                        <p class="form-control"><?php echo $lastName ?></p>
                    </div>
                    <div class="form-group">
                        <label><b>Email Address :</b></label>
                        <p class="form-control"><?php echo $email ?></p>
                    </div>
                    <div class="form-group">
                        <label><b>Username :</b></label>
                        <p class="form-control"><?php echo $username ?></p>
                    </div>
                   <p><a href="My-New-Account.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>