<?php
session_start();
$msg="";
include('conn.php');
if(isset($_POST['submit'])){
$conn = mysqli_connect($servername,$username,$password,$dbname);
$email = $_POST['email'];
$pwd = $_POST['password'];
          
    $res=mysqli_query($conn,"SELECT roles FROM admin_role where email='$email'");
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_array($res)){
            if($row['roles']=='admin ' || $row['roles']=='admin'){ 
                if (empty($email)) {
                    $_SESSION['status']='Email Name is required!';     
                    header("Location:login.php?error=Email Name is required");
                    exit();
                    }else if(empty($pwd)){
                    $_SESSION['status']='Password is required!';     
                    header("Location:login.php?error=Password is required");
                    exit();
                    }else{  
                   $sql = "SELECT * FROM admin WHERE email='$email'";
                    $result = mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            if(password_verify($pwd,$row['password'])){ 
                            $_SESSION['admin_name']=$row['admin_name'];
                            $_SESSION['id']=$row['id'];
                            header("location:index.php");
                            exit();
                            }else{
                                $_SESSION['status']='Please Enter Valid Email And Password!';     
                                header("Location:login.php?error=Incorrect Email or Password");
                                exit();
                            }
                        }
                    }else{$_SESSION['status']='Please Enter Valid Email And Password!';     
                            header("Location:login.php?error=Incorect Email or Password");
                            exit();
                        }
                    }
            }elseif($row['roles']=='user ' || $row['roles']=='user')
            {
                // var_dump($row);
                header("Location:Users/login2.php");
                exit();

            }elseif($row['roles']=='admin ,user ')
            { if(isset($_POST['submit'])){
                $email = $_POST['email'];
                $pwd = $_POST['password'];                        
                $sql = mysqli_query($conn,"SELECT roles FROM admin_role where email='$email'");
                    if(mysqli_num_rows($sql)>0){
                        while($row=mysqli_fetch_array($sql)){

                if($row['roles']=='admin ,user '|| $row['roles']=='admin,user'){
                    $conn = mysqli_connect($servername,$username,$password,$dbname);
                    $query = "SELECT * FROM admin WHERE email='$email'";
                    $result = mysqli_query($conn,$query);  
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                        if(password_verify($pwd,$row['password'])){ 
                            $_SESSION['admin_name']=$row['admin_name'];
                            $_SESSION['id']=$row['id'];
                            header("location:index.php");
                            exit();
                            }else{
                                $_SESSION['status']='Please Enter Valid Email And Password!';     
                                header("Location:login.php?error=Incorrect Email or Password");
                                exit();
                            }
                        }
                    }
                }else{
                    $_SESSION['status']='Please Enter Valid Email And Password!';     
                    header("Location:login.php?error=Incorrect Email or Password");
                    exit();
                    }
            }
        }
        }else{
        // var_dump($row);
        header("Location:Users/login2.php");
        exit();
        }

        }else{
            $_SESSION['status']='Please Enter Valid Email And Password!';     
            header("Location:login.php?error=Incorect Email or Password");
            exit();

        }
    }}else{
        if (empty($email)) {
            $_SESSION['status']='Email Name is required!';     
            header("Location:login.php?error=Email Name is required");
            exit();
            }else if(empty($pwd)){
            $_SESSION['status']='Password is required!';     
            header("Location:login.php?error=Password is required");
            exit();
            }else{   
            $_SESSION['status']='Please Enter Valid Email And Password!';                    
            header("Location:login.php?error=Incorect Emails or Passwords");
            exit();
            }
    }
}
?>