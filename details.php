<?php
require "db.php";
require "navbar.php";



echo'
<!doctype html>
<html lang="en">
  <head>
  <style>
  body{
    background-image: url("./images/logoWhite.png");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-position-y: -80px;
}
  </style>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="indexupdated.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>';
    $id=$_GET['id'];
$sql="SELECT task FROM employee WHERE id=$id";
$result=mysqli_query($conn,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $task=$row['task'];
    }
}
if($task==0){
    echo "You have No Pending tasks";
}
else{
    $sql="SELECT * FROM tasks WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $heading=$row['heading'];
            $details=$row['details'];
            $duedate=$row['duedate'];
            $assgnedto=$row['assignedto'];
            $completed=$row['completed'];
            $taskid=$row['taskid'];
            if($completed==0){
    echo '<br><div class="card mb-3" style="background-color:rgb(238, 161, 161);" >
    <center><img src="./images/pending_task.png" class="card-img-top" style="width:200px;mix-blend-mode: multiply;"></center>
    <div class="card-body">
      <u><center><h5 class="card-title fs-1">'.$taskid.':- '.$heading.'</h5></center></u><br>
      <p class="card-text fs-3 fst-italic font-monospace">'.$details.'</p>
      <center><button type="button" class="btn btn-danger" style="width:300px">Due Date:- '.$duedate.'</button>
      <a href="completed.php?id='.$taskid.'"><button type="button" class="btn btn-success mx-5" style="width:300px">Completed</button></a></center>
      <hr>

     
    </div>
  </div>';
            }
            if($completed==1){
                echo '<br><div class="card mb-3" style="background-color:rgb(185, 246, 185);">
                <center><img src="./images/completed_task.avif" class="card-img-top" style="width:200px;border-radius:40px;mix-blend-mode: multiply;"></center>
                <div class="card-body">
                  <u><center><h5 class="card-title fs-1">'.$task.':- '.$heading.'</h5></center></u><br>
                  <p class="card-text fs-3 fst-italic font-monospace">'.$details.'</p>
                  
                  <center><button type="button" class="btn btn-success mx-5" style="width:300px">Task Has Been Completed</button></center>
                  <hr>
            
                 
                </div>
              </div>';
                        }
        }
    }
}
    echo '<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
';
?>