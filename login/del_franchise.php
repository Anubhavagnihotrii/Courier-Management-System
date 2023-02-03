<?php
$showerror=false;
$showalert=false;
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
    header("location:login.php");
    exit;
}

?>
<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'partials/_dbconnect.php';

  $bname=$_POST['bname'];
  $bphone=$_POST['bphone'];
  $sql=" DELETE FROM FRANCHISE WHERE BNAME='$bname' AND BPHONE=$bphone;";
  $result = mysqli_query($conn,$sql);
  if($result)
  {
    $showalert=true;
  }
  else{
    $showerror=true;
  }

  
}

?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>delete feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  
  <?php require 'partials/_nav.php' ?>
  <style>
body {
  background-image: url('/login/assets/ecom.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  
}
</style>

  
<br>  
    <?php 
  if($showalert)
  {echo'
  <div class="alert alert-success alert-dismissible fade show" role="alert-success">
  <strong>Success</strong> Your franchise  has been removed !
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  if($showerror)
  {echo'
  <div class="alert alert-danger alert-dismissible fade show" role="alert-success">
  <strong>Sorry</strong> unable to delete franchise.please try again later or contact us admin@cms.com
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  
?>
    
<div class="col-md-5 offset-md-6">
<h1 style="color:black; text-align:center">Enter the details to delete franchise</h1>
      <form action="/login/del_franchise.php"method="post">
    <br>
<div class="mb-3">
<div class="mb-3">
  <label for="bname" class="form-label"> <h5 style="color:black">Name</h5></label>
  <input type="text" class="form-control" id="bname" name="bname">
</div>

<div class="mb-3">
  <label for="bphone" class="form-label"><h5 style="color:black">Phone number</h5></label>
  <input type="text" class="form-control" id="bphone" name="bphone">
</div>
<br>
<button type="submit" class="btn btn-info col-md-12 ">Submit</button>
</form>

</div> 


<br><br>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>