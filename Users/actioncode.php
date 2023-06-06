<?php
session_start();
include('conn.php');
if(isset($_POST['submit'])){
            $conn = mysqli_connect($servername,$username,$password,$dbname);
            $email = $_POST['email'];
            $pwd = $_POST['password'];          
            $res=mysqli_query($conn,"SELECT roles FROM admin_role where email='$email'");
            if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_array($res)){
            if($row['roles']=='user ' || $row['roles']=='user'){ 
            if (empty($email)) {
            $_SESSION['status']='Email Name is required!';     
            header("Location:login2.php?error=Email Name is required");
            exit();
            }else if(empty($pwd)){
            $_SESSION['status']='Password is required!';     
            header("Location:login2.php?error=Password is required");
            exit();
            }else{  
            $sql = "SELECT * FROM admin WHERE email='$email'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if(password_verify($pwd,$row['password'])){ 
                    $_SESSION['username']=$row['admin_name'];
                    $_SESSION['id']=$row['id'];
                    header("location:index.php");
                    exit();
                    }else{
                        $_SESSION['status']='Please Enter Valid Email And Password!';     
                        header("Location:login2.php?error=Incorrect Email or Password");
                        exit();
                    }}
                    exit();
                }else{
                    $_SESSION['status']='Please Enter Valid Email And Password!';     
                    header("Location:login2.php?error=Incorect Email or Password");
                    exit();
                }
            }}else{
                $_SESSION['status']='Please Enter Valid Email And Password!';     
                header("Location:login2.php?error=Incorect Email or Password");
                exit();
            }}
        }elseif(isset($_POST['submit']))
        {
            $conn = mysqli_connect($servername,$username,$password,$dbname);
            $email = $_POST['email'];
            $pwd = $_POST['password'];
            if (empty($email)) {
            $_SESSION['status']='Email Name is required!';     
            header("Location:login2.php?error=Email Name is required");
            exit();
            }else if(empty($pwd)){
            $_SESSION['status']='Password is required!';     
            header("Location:login2.php?error=Password is required");
            exit();
            }else{   
                $conn = mysqli_connect($servername,$username,$password,$dbname);
                $sql = "SELECT * FROM users WHERE email='$email'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
                    if(password_verify($pwd,$row['password'])){ 
                        $_SESSION['username']=$row['username'];
                        $_SESSION['id']=$row['id'];
                        header("location:index.php");
                        exit();
                        }else{
                            $_SESSION['status']='Please Enter Valid Email And Password!';     
                            header("Location:login2.php?error=Incorrect Email or Password");
                            exit();
                            
                        }
                    }
                    exit();
                }else{
                 $_SESSION['status']='Please Enter Valid Email And Password!';     
                header("Location:login2.php?error=Incorrect Email or Password");
                exit();
                }
                }
                }else{
                $_SESSION['status']='Please Enter Valid Email And Password!';      
                header("Location:login2.php?error=Incorect Email or Password");
                exit();
                }
}
?>