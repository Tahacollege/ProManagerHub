<?php
$id=0;
require "db.php";
session_start();

if(isset($_SESSION['id'])){
$id=$_SESSION['id'];
$name=$_SESSION['name'];
if($id==3){
  $sql="SELECT id FROM employee WHERE name='$name'";
  $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
      $uid=$row['id'];
      
    }
}
}
echo'
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-info p-3" style="color:white">
  <div class="container-fluid">
  <img src="./images/circle-fotor-20230816122731.png" class="img-fluid " alt="" width="60px">';
    if($id==3){echo '<a class="navbar-brand mx-3 fs-4" href="index.php?id='.$id.'&uid='.$uid.'"><b><u>ProManageHub</b></u></a>';}
    else{echo '<a class="navbar-brand mx-3 fs-4" href="index.php?id='.$id.'"><b><u>ProManageHub</b></u></a>';}
    echo '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">';
      if(isset($_SESSION['login'])==true){
        echo '</ul>
        <a class="navbar-brand mx-2" href="profile.php">
<img src="./images/user.png"  width="45" height="40" class="d-inline-block ">
<p class=" d-inline-block fs-4 my-1"><u><b><i>'.$_SESSION['name'].'</i></b></u></p>
</a>
        <a href="logout.php"><button type="button" class="btn btn-danger mx-3 my-1" >LogOUT</button></a>';
    }
    else{
        echo '</ul>
        <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#manager">Manager</button>
        
        <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#employee">Employee</button>';
    }
    
   echo' </div>
  </div>
</nav>



<!-- Manager Modal -->
<div class="modal fade" id="manager" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Manager</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  action="login.php?id=1" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      </div>
      
    </div>
  </div>
</div>



<!-- Emoloyee Modal -->
<div class="modal fade" id="employee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Employee</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="login.php?id=3" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
      </div>
      
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
';
?>