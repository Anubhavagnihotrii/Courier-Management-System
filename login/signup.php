<?php
$showerror=false;
$showalert=false;

if($_SERVER['REQUEST_METHOD']=='POST'){
include 'partials/_dbconnect.php';

    $username=$_POST['uname'];
    $email=$_POST['mail'];
    $pass=$_POST['pass'];
    $cpass=$_POST['cpass'];

    // $exists=false;
    
    //check whether this user exists
    $existSql ="select * from users where email='$email';";
    $result = mysqli_query($conn,$existSql);
    $numExistRows=mysqli_num_rows($result);
    if($numExistRows >0)
    {
       // $exists=true;
       $showerror=" email already exists";
    }
    else
    {
        //$exists=false;
    if(($pass==$cpass))
                {
                    $sql="INSERT INTO `users` (`username`, `email`, `password`, `date`) VALUES ( '$username', '$email', '$pass', current_timestamp());";
                    $result = mysqli_query($conn,$sql);
                if($result)
                {
                    $showalert=true;
                }
            }
                else{
                    $showerror="password dosen't match";
                }
                    }
        
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  
  
  <?php require 'partials/_nav.php' ?>
  <style>
body {
  background-image: url('/login/assets/789.gif');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
  <?php 
  if($showalert)
  {echo'
  <div class="alert alert-success alert-dismissible fade show" role="alert-success">
  <strong>Success</strong> Your account is now created.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  if($showerror)
  {echo'
  <div class="alert alert-danger alert-dismissible fade show" role="alert-success">
  <strong>ERROR</strong> '.$showerror.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
?>

<br>
  <h1 style="color:black; text-align:center">Fill the registration from to signup!</h1>
  <br>
<div class="container col-md-6">
  
            <form action="/login/signup.php"method="post">
        <div class="mb-3">
        <div class="mb-3">
            <label for="uname" class="form-label">Username</label>
            <input type="text" class="form-control" id="uname" name="uname">
        </div>
            <label for="mail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp">
            
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="pass">
        </div>
        <div class="mb-3">
            <label for="cpass" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="cpass" name="cpass">
            <div id="emailHelp" class="form-text">Please type the same password as above.</div>
        </div>
          
        
        <button type="submit" class="btn btn-danger col-md-12 ">Signup</button>
        </form>
    
</div> 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>