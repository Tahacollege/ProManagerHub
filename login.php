<?php
require "db.php";
if($_GET['id']==1){
   $id=$_GET['id']; 
    if(isset($_SERVER['REQUEST_METHOD'])=="POST"){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="SELECT email,password FROM manager WHERE email='$email' AND password='$password';";
    $result=mysqli_query($conn,$sql);
    if($result){
        
        session_start();
        $_SESSION['id']=$id;
        $_SESSION['name']=$name;
        $_SESSION['login']=true;
        $msg="Welcome $name";
        
        header("location:index.php?message=$msg&id=$id");
    }
    else{
        $msg="Invalid Email Or Password Try Again!!!!!";
        header("location:index.php?message=$msg");
    }
    }
}

else if($_GET['id']==3){
    $id=$_GET['id'];
    if(isset($_SERVER['REQUEST_METHOD'])=="POST"){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $sql="SELECT email,password,name FROM employee WHERE email='$email' AND password='$password' AND name='$name';";
    $result=mysqli_query($conn,$sql);
    if($result){
        
        session_start();
        $_SESSION['id']=$id;
        $_SESSION['name']=$name;
        $_SESSION['login']=true;
        $sql="SELECT id FROM employee where name='$name'";
        $result=mysqli_query($conn,$sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                $uid=$row['id'];
            }
        }
        $msg="Welcome $name";
        
        header("location:index.php?message=$msg&id=$id&uid=$uid");
    }
    else{
        $msg="Invalid Email Or Password Try Again!!!!!";
        header("location:index.php?message=$msg");
    }
    }
}
?>