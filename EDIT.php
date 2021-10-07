<?php
require_once "config.php";
if (!isset($_SESSION['userid'])){
    header("location:login.php"); 
    }
$first_name = $last_name = $email = $user_name = "";
$first_name_error = $last_name_error = $email_error = $user_name_error = "";
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $id = $_POST["id"];
        //Validate first name
        $firstName = trim($_POST["fname"]);
         if (empty($firstName)) {
            $first_name_error = "First Name is required.";
        } elseif (!filter_var($firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(?=.{3,20}$)[A-Za-z ]+(?:[_-][A-Za-z]+)*$/")))) {
            $first_name_error = "First Name is invalid / Needs 3 to 20 MAX letters.";  
        } else {
            $firstName = $firstName;
        }
        //Validate last name
        $lastName = trim($_POST["lname"]);
        if (empty($lastName)) {
            $last_name_error = "Last Name is required.";
        } elseif (!filter_var($lastName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^(?=.{3,20}$)[A-Za-z ]+(?:[_-][A-Za-z]+)*$/")))) {
            $last_name_error = "Last Name is invalid / Needs 3 to 20 MAX letters.";
        } else {
            $lastName = $lastName;
        }
        //Validate email address
        $email = trim($_POST["email"]); 
        if (empty($email)) {
            $email_error = "Email is required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-Z]{2,4})$/")))) { 
            $email_error = "Email Address is invalid. Typical example is: username @ domain . extension "; 
        } else {                                
          $email = $email;
        }
        //Validate username
        $username = trim($_POST["username"]); 
        if (empty($username)){
            $user_name_error = "Username is required.";
        } elseif (!filter_var($username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[^A-Z0-9@#$%^&*()+!~`|';:<>,.[{}](?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-z0-9._]+(?<![_.])$/")))) { 
            $user_name_error = "Invalid Username. Enter lowercase letters (8 MIN and 20 MAX) without any spaces and NO numbers at the start - Eg - myusername or myuser123"; 
            $username = $username;
        }                         
        if (empty($first_name_error) && empty($last_name_error) && empty($email_error) && empty($user_name_error)) {
          $sql = "UPDATE `users` SET `fname`= '$firstName', `lname`= '$lastName', `email`= '$email', `username`= '$username' WHERE id='$id'";

        if (mysqli_query($dbc, $sql)) { // hIER MOET 'N MODAL INKOM HOOR
              header("location: Homepage.php"); // was edit.php en hou dit so as jy wil he die user moet WEER inlog, anders gaan na HOMEPAGE
          } else { 
              echo "Something went wrong. Please try again later.";
          }
    }
    mysqli_close($dbc);
} else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id = trim($_GET["id"]);
        $query = mysqli_query($dbc, "SELECT * FROM `users` WHERE id = '$id'");
        if ($user = mysqli_fetch_assoc($query)) {
            $firstName   = $user["fname"];
            $lastName    = $user["lname"];
            $email       = $user["email"];
            $username    = $user["username"];
        } else {
            echo "Something went wrong. Please try again later.";
            header("location: login.php");
            exit();
        }
        mysqli_close($dbc);
    }  else {
        echo "Something went wrong. Please try again later.";
        header("location: login.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <title>Update Record</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> 
    <link rel="stylesheet" href="style-info.css"> 
</head>
<div class="container"> </br> 
	<div class="col-sm-4"> 
	</div> 
        <div class="col-sm-4">
    <div class="login_form"> 
    <body>
         <div class="container-fluid"> 
            <div class="row"> 
                <div class="col-md-12"> 
                    <div class="page-header"> 
                        <h2 class="text-center">Update / Edit User</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <div class="class="form-group <?php echo (!empty($first_name_error)) ? 'has-error' : ''; ?>">
                            <label>First Name :</label>
                            <input type="text" name="fname" class="form-control" value="<?php echo $firstName; ?>">
                            <span class="help-block"><?php echo $first_name_error;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($last_name_error)) ? 'has-error' : ''; ?>">
                            <label>Last Name :</label>
                            <input type="text" name="lname" class="form-control" value="<?php echo $lastName; ?>">
                            <span class="help-block"><?php echo $last_name_error;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_error)) ? 'has-error' : ''; ?>">
                            <label>Email :</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_error;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($user_name_error)) ? 'has-error' : ''; ?>">
                            <label>Username :</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $user_name_error;?></span>
                        </div>
                        <input type="submit" class="btn btn-success" value="Submit">
                        <a href="Homepage.php" class="btn btn-warning">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
                       