<?php
require "navbar.php";
require "db.php";

if(isset($_GET['message'])){
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>'.$_GET['message'].'</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  
  
echo'

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="indexupdatedth.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>';
  if(isset($_GET['id'])&&$_GET['id']==1){
    $sql="SELECT * FROM employee";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo '<div class="row row-cols-1 row-cols-md-3 g-4 my-3">';
        while($row=mysqli_fetch_assoc($result)){
            $email=$row['email'];
            $id=$row['id'];
            $name=$row['name'];
            $position=$row['position'];
           $num=$row['task'];
            echo '
            
  <div class="col" >
    <div class="card" id="transparent">
      <center><img src="./images/user.png" class="card" id="transparent" width="140px" height="240px" style="border-radius:90px"></center>
      <div class="card-body">
        <center><h3 class="card-title">'.$name.'</h3>
        <h5 class="card-title">'.$email.'</h5>
        <button type="button" class="btn btn-primary">
  TASKS <span class="badge text-bg-secondary">'.$num.'</span>
</button>
        <b><u><p class="card-text fs-3">'.$position.'</p></u></b></center><br>
        <div class="d-grid gap-2">
  <button class="btn btn-secondary" type="button"><a href="asigntask.php?id='.$id.'" style="color:white;text-decoration:none">Asign-Task</a></button>
</div>
      </div>
    </div>
  </div>
            ';
        }
    }
  }

  else if(isset($_GET['id'])&&$_GET['id']==3){
    $uid=$_GET['uid'];
    $sql="SELECT * FROM employee where id=$uid";
    $result=mysqli_query($conn,$sql);
    if($result){
        
        while($row=mysqli_fetch_assoc($result)){
            $email=$row['email'];
            $id=$row['id'];
            $name=$row['name'];
            $position=$row['position'];
           $num=$row['task'];
           
            echo '
            
  <div class="col" >
    <div class="card my-3 mx-3" >
      <center><img src="./images/user.png" class="card" id="transparent" width="140px" height="240px" style="border-radius:90px"></center>
      <div class="card-body">
        <center><h3 class="card-title">'.$name.'</h3>
        <h5 class="card-title">'.$email.'</h5>
        <a href="details.php?id='.$uid.'"><button type="button" class="btn btn-primary">
  TASKS <span class="badge text-bg-secondary">'.$num.'</span>
</button></a>
        <b><u><p class="card-text fs-3">'.$position.'</p></u></b></center><br>
        <div class="d-grid gap-2">
  
</div>
      </div>
    </div>
  </div>
            ';
        }
    }
  }
  else{
    echo '<center><div class="card mb-3 my-5 mx-5" >
  <center><img src="./images/circle-fotor-20230816122731.png" class="card-img-top" style="width:340px;"></center>
  <div class="card-body">
    <h5 class="card-title">🌟 Welcome to ProManageHub    ! 🌟</h5>
    <p class="card-text">Were thrilled to have you join our community of passionate project managers, leaders, and enthusiasts. Whether youre a seasoned professional or just embarking on your project management journey, youve come to the right place.

    At ProManageHub    , were dedicated to providing you with a hub of valuable resources, insightful discussions, and practical tools that will empower you to excel in the world of project management. Our platform is designed to foster collaboration, share best practices, and help you navigate the complexities of managing projects from inception to successful completion.</p>
    <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#manager">Manager</button>
      
      <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#employee">Employee</button>
  </div>
</div></center>

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
  }
?>