<?php
require "db.php";
session_start();
$uid=$_SESSION['id'];
$id=$_GET['id'];
$sql="SELECT name,task FROM employee WHERE id=$id";
$result=mysqli_query($conn,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $name=$row['name'];
        $task=$row['task'];
    }
    
    echo "<br>";
    $_SERVER['REQUEST_METHOD']=="POST";
        $heading=$_POST['heading'];
        $date=$_POST['date'];
        $content=$_POST['content'];
        $sql="INSERT INTO tasks(id,heading,details,duedate,assignedto) VALUES($id,'$heading','$content','$date','$name')";
        $result=mysqli_query($conn,$sql);
        
        if($result){
            $newtask=$task+1;
            $sql2="UPDATE employee SET task=$newtask WHERE name='$name'";
            $result2=mysqli_query($conn,$sql2);
            if($result2){
            $msg="Your Task Has Been Asigned to $name";
            header("location:index.php?message=$msg&id=$uid");
            }
        }
    }
    
?>