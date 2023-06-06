<?php
include_once('conn.php');
$conn= mysqli_connect($servername,$username,$password,$dbname);
if(isset($_POST['btnadd']))
{
$title= $_POST['title'];
$des=$_POST['descr'];
$address= $_POST['addr'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$sql ="INSERT into contact (title,description,address,email,phone) values ('".$title."','".$des."','".$address."','".$email."','".$phone."')";
mysqli_query($conn,$sql);
header("location:contact.php");
exit();
}
?>