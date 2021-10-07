<!DOCTYPE html>
<?php require_once("config.php");
if (!isset($_SESSION['userid'])){
    header("location:login.php"); 
    }
 ?>
<html>
<head>
<title>Stratusolve --- Insert Posts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="style.css"> 
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<?php
if(isset($_POST['new']) && $_POST['new']==1)
{
$post_text =$_REQUEST['post_text'];
$ins_query="insert into `posts`(post_text,userid) values ('".$post_text."', '".$_SESSION['userid']."')";
mysqli_query($dbc,$ins_query) or die(mysqli_error($dbc));
header("Location: Homepage.php");  
}
?>
<body>
<center>    
<div class="container"> 
<h1 style="font-size:40px; text-align: center; "> USERS POSTS </h1> 
    <div class="row">
    <div class="col-sm-4">                 
    </div>
    <div class="col-sm-4">
    <img src="xstratusolve.jpg" alt="Logo" class="Logo img-fluid"> 
    </div>
    <div class="col-sm-4"> 
    </div>
	  <div class="col-sm-4">
 	  </div>
	  <div class="col-sm-4"> 
    <label class="label_txt">My post to Stratusolve:</label>
<form name="form" method="post" action="#" onsubmit="required()" > 
<input type="hidden" name="new" value="1" />
<div class="form-group"> 
<small id="Text_area_Help" class="text-danger">* Maximum of 300 characters allowed *</small>
<textarea type="text" id="user_post" rows="7" cols="39" maxlength="300" name="post_text" placeholder="Enter your post here......." value = "required"></textarea > 
</div>
<input type="submit" id="submit_post" name="submit" class="btn btn-success" value="Submit to Database"> 
<a href="Homepage.php" class="btn btn-info"> Homepage</a> 
</form>
</div>
</div>
</center>
</body>
<script>
    $(document).ready(function(){  
      var checkField;
      //checking the length of the value of message and assigning to a variable(checkField) on load
      checkField = $("#user_post").val().length;  
      var enableDisableButton = function(){         
        if(checkField > 0){
          $('#submit_post').removeAttr("disabled");
        } 
        else {
          $('#submit_post').attr("disabled","disabled");
        }
      }        
      //calling enableDisableButton() function on load
      enableDisableButton();            
      $('#user_post').keyup(function(){ 
        //checking the length of the value of message and assigning to the variable(checkField) on keyup
        checkField = $("#user_post").val().replace(/\s/g, '').length;
        //calling enableDisableButton() function on keyup
        enableDisableButton();
      });
    });
    </script>
</html>
