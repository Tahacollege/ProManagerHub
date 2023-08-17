<?php
require "db.php";
$taskid=$_GET['id'];
$sql="SELECT id FROM tasks WHERE taskid=$taskid";
$result=mysqli_query($conn,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['id'];
    }
$sql="UPDATE tasks SET completed=true WHERE taskid=$taskid";
$result=mysqli_query($conn,$sql);
if($result){
    header("location:details.php?id=$id");
}
}
?>