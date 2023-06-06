<?php
include_once('conn.php');
$conn= mysqli_connect($servername,$username,$password,$dbname);
if(isset($_POST['btnadd']))
{
$name= $_POST['name'];
$email=$_POST['email'];
$role= $_POST['role'];
$sql ="INSERT into admin_role (name,email,roles) values ('".$name."','".$email."','".$role."')";
mysqli_query($conn,$sql);
header("location:addrole.php");
exit();
}
?>