<!-- this is fetching data from mysql db  -->

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


  $name=$_POST['name'];
  $phone=$_POST['phone'];

  $sql="select * from place_courier where phone=$phone and date < curdate();";
  $result = mysqli_query($conn,$sql);
  if( $result)
  {
    $showalert=true;
  }
  
  
}

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>delivery status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  
  <?php require 'partials/_nav.php' ?>
  <style>
body {
  background-image: url('/login/assets/red-delivery car.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  
}
</style>

  
 


    <br>
    
    <?php 
  if($showalert)
  {echo'
  <div class="alert alert-success alert-dismissible fade show" role="alert-success">'; 
//   $num= mysqli_num_rows($result);
//   echo $num;

  while($row = mysqli_fetch_assoc($result))
  {
    echo '<h4 class="alert-heading">Delivered !</h5> <p><h4>'.$row['name']." your order is delivered from  location  ".$row['sadd']." to location ".$row['radd']."  successfully !  😅</h4>";
    echo "<br>";
  }
  echo'</p><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }

  if($showerror)
  {echo'
  <div class="alert alert-warning alert-dismissible fade show" role="alert-success">
  <strong>Sorry !</strong> Your order is in transit. please wait , we will deliver it to you shortly 😅
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  
?>
   

<div class="col-md-5 offset-md-1">
<h1 style="color:black; text-align:center">Fill the Form to check the delivery status !</h1>
<br>
<h2 style="color:black; text-align:center">Every 24 Hours⌛ we  deliver for you !</h2>
<br>
      <form action="/login/delivery_status.php"method="post">
    

<div class="mb-3">
  <label for="name" class="form-label"> <h5 style="color:black">Name</h5></label>
  <input type="text" class="form-control" id="name" name="name">
</div>
  
<div class="mb-3">
  <label for="phone" class="form-label"><h5 style="color:black">Phone number(Courier id)</h5></label>
  <input type="text" class="form-control" id="phone" name="phone">
</div>

<br>
<button type="submit" class="btn btn-danger col-md-12 ">Submit</button>
</form>

</div> 


<br><br>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>