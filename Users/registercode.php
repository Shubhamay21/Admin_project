<?php
session_start();
include('conn.php');
if(isset($_POST['btnadd'])){
    $conn= mysqli_connect($servername,$username,$password,$dbname);
    $name =$_POST['name'];
    $email =$_POST['email'];
    $password =$_POST['pass'];
    $cpassword =$_POST['cpass'];
    if(empty($name)){
        header("location:register.php?error=Name is required");
    }elseif(empty($email)){
        header("location:register.php?error=Email is requied");
    }elseif(empty($password)){
        header("location:register.php?error=Password is required");
    }elseif(empty($cpassword)){
        header("location:register.php?error=Cpassword is required");
    }else{
        if($password !== $cpassword){
        header('location:register.php?error=Please Enter Same Password');
        exit();
        
        }else{
        $hash_pass= password_hash($password,PASSWORD_DEFAULT);
        $sql ="INSERT into users (username,email,password) values ('".$name."','".$email."','".$hash_pass."')";
        mysqli_query($conn,$sql);
        header("location:login2.php?NewUser Registered!");      
        }
    }
}

?>