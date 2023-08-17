<?php
require "db.php";
require "navbar.php";
if(isset($_GET['id'])){
    $uid=$_GET['id'];
}
echo'
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="task.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
  <center><br>
  <div class="container-fluid" id="div">
 
  <form action="tasks.php?id='.$uid.'" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label topics" >Heading</label>
  <input type="text" name="heading"  id="div" class="form-control" id="exampleFormControlInput1" ><br>
  <label for="exampleFormControlInput1" class="form-label topics">Due Date:-</label>
  <input type="date" id="div" name="date">
</div>
<div>
</div><br>

<div class="mb-3" >
  <label for="exampleFormControlTextarea1" class="form-label topics" >Details</label>
  <textarea class="form-control" id="div"  name="content" id="exampleFormControlTextarea1"  rows="20" ></textarea><br>
  <button type="submit" class="btn btn-primary" id="btn">Submit</button>
</div>
  </form>

</div>
</center>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
';
?>