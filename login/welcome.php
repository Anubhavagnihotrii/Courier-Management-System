<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
    header("location:login.php");
    exit;
}

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>welcome  </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
  
  <?php require 'partials/_nav.php' ?>
  <style>
body {
  background-image: url('/login/assets/456.gif');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>

  
 


    <div class="container my-3">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h4 class="alert-heading"> welcome - <?php echo $_SESSION['mail']?></h4>
            <p>Hy, Welcome to CMS. You are Logged in as  <?php echo $_SESSION['mail']?> </p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to logout<a href="/login/logout.php"> using this link.</a></p>
            </div>
    </div>

    <div class="container">
          
          <a class="nav-link" href="/login/place_courier.php">
          <div class="d-grid gap-2">
          <button class="btn btn-danger" type="button">PLACE COURIER</button>
          </div>
          </a>

          <br>
          <a class="nav-link" href="/login/delivery_status.php">
          <div class="d-grid gap-2">
          <button class="btn btn-success" type="button">CHECK FOR DELIVERY STATUS</button>
          </div>
          </a>

<br>
          <br>
          <a class="nav-link" href="/login/feedback.php">
          <div class="d-grid gap-10">
          <button class="btn btn-warning" type="button">FEEDBACK</button>
          </div>
          </a>

          <br>
          <a class="nav-link" href="/login/del_feedback.php">
          <div class="d-grid gap-10">
          <button class="btn btn-dark" type="button"> DELETE FEEDBACK</button>
          </div>
          </a>

          <br>
          <a class="nav-link" href="/login/staff.php">
          <div class="d-grid gap-10">
          <button class="btn btn-primary" type="button">STAFF REGISTRATION</button>
          </div>
          </a>

          <br>
          <a class="nav-link" href="/login/staff_update.php">
          <div class="d-grid gap-10">
          <button class="btn btn-secondary" type="button">STAFF DETAILS UPDATION</button>
          </div>
          </a>

          <br>
          <a class="nav-link" href="/login/franchise.php">
          <div class="d-grid gap-10">
          <button class="btn btn-danger" type="button">ADD FRANCHISE</button>
          </div>
          </a>

          <br>
          <a class="nav-link" href="/login/del_franchise.php">
          <div class="d-grid gap-10">
          <button class="btn btn-dark" type="button">DELETE FRANCHISE</button>
          </div>
          </a>
          <br>
          <br>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>