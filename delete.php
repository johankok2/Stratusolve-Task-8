<?php
if (isset($_POST["id"]) && !empty($_POST["id"])) {  
    require_once "config.php";
    if (!isset($_SESSION['userid'])){
        header("location:login.php"); 
        } 
    $userid = $_POST["id"];
    $query = "DELETE FROM `posts` where userid = '$userid'";  
    mysqli_query($dbc, $query);
    $query = "DELETE FROM `users` WHERE id = '$userid'";
    if (mysqli_query($dbc, $query)) {
        header("location:index.php"); 
    } else {
         echo "Something went wrong. Please try again later.";
    }
    mysqli_close($dbc);
} else {
    if (empty(trim($_GET["id"]))) {
        echo "Something went wrong. Please try again later.";
        header("location: delete.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="style.css"> 
     <style type="text/css">
        .wrapper{
            width: 340px;
            margin: 0 auto;
            border: 2px solid #c68c53;
            border-radius: 8px;
        }
    </style> 
</head>
<body>
     <div class="wrapper"> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                    <h2 class="text-center">Delete Record ?</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-warning fade in"> 
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>By deleting this record you have to register again as a (new) user from scratch !</p>
                            <p>Are you sure you want to delete this record ?</p><br>
                            <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="My-New-Account.php" class="btn btn-success">No</a> 
                            </p>
                        </div>
                    </form>
                </div>
</body>
</html>