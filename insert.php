<?php
include_once('conn.php');

$conn= mysqli_connect($servername,$username,$password,$dbname);
$name= $_POST['nm'];
$email=$_POST['em'];
$password= $_POST['pwd'];
$pass = password_hash($password,PASSWORD_DEFAULT);
$sql ="INSERT into admin (admin_name,email,password) values ('".$name."','".$email."','".$pass."')";
mysqli_query($conn,$sql);
?>