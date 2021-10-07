<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <title>User Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> 
</head>
<div class="container"> </br>
    <div class="row">  
	<div class="col-sm-4"> 
	</div> 
    <div class="col-sm-4"> 
    <div class="login_form"> <!-- Maak form geel soos in Style.css gespesifiseer-->
<body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                       <h2 class="text-center">User Profile </h2>
                           
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    // select only the user that has logged in ========================================================================
                    if(!isset($_SESSION["login_sess"])) // [A] om net die user wat ingelog is te kies
                    {
                     header("location:login.php"); 
                    }
                    //Sit hier iets in van veiligheid == email check voor user by my_account kan uitkom
                    $email=$_SESSION["login_email"];  // [A] om net die user wat ingelog is te kies
                    // ================================================================================================================ 
                    $data = "SELECT * FROM `users` WHERE email='$email'"; 
                    if($users = mysqli_query($dbc, $data)){
                        if(mysqli_num_rows($users) > 0){  
                           echo "<table class='table table-bordered table-striped'> 
                                    <thead>
                                      <tr>
                                        <th>Username</th>
                                        <th>Actions</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                                while($user = mysqli_fetch_array($users)) { 
                                    echo "<tr>
                                         <td>". $user['username'] . "</td>
                                            <td><center>
                                              <a href='read.php?id=". $user['id'] ."' title='View User' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>
                                              <a href='edit.php?id=". $user['id'] ."' title='Edit User' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>
                                              <a href='delete.php?id=". $user['id'] ."' title='Delete User' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a> 
                                              <a href='Homepage.php?id=". $user['id'] ."' title='Homepage' data-toggle='tooltip'><span class='glyphicon glyphicon-home'></span></a>
                                            </td></center>
                                          </tr>"; 
                                } 
                                echo "</tbody>
                                </table>";
                            mysqli_free_result($users);
                        } else{
                            echo "<p class='lead'><em>No records found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not be able to execute $sql. " . mysqli_error($dbc);
                    }

                    // Close connection
                    mysqli_close($dbc);
                    ?>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>

                                                                              
                                                                                 