<?php
$login = false;
$showerror=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
include 'partials/_dbconnect.php';


  
    $email=$_POST['mail'];
    $pass=$_POST['pass'];
    

    $exists=false;
    
    
    
            $sql="select * from users where email='$email' AND password='$pass';";
            $result = mysqli_query($conn,$sql);
            $num=mysqli_num_rows($result);
    if($num==1)
    {
        $login=true;
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['mail']=$email;
        header("location:welcome.php");
    }
    else{
        $showerror="invalid credentials";
    }
        
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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
  if($login)
  {echo'
  <div class="alert alert-success alert-dismissible fade show" role="alert-success">
  <strong>Success</strong> You are logged in.
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

<br><br>
  <h1 style="color:black; text-align:center">Login to our website </h1>
  <br>
<div class="container col-md-6">
  
            <form action="/login/login.php"method="post">
        <div class="mb-3">
         <label for="mail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp">
            
        </div>
        <div class="mb-3">
            <label for="pass" class="form-label">Password</label>
            <input type="password" class="form-control" id="pass" name="pass">
        </div>
        <br><br>
        <button type="submit" class="btn btn-danger col-md-12 ">Login</button>
        </form>
    
</div> 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 </body>
</html>