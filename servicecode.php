<?php
include_once('conn.php');
$conn= mysqli_connect($servername,$username,$password,$dbname);
if(isset($_POST['btnadd']))
{
$title= $_POST['title'];
$des=$_POST['descr'];
$subtitle= $_POST['subtitle'];
$subdes= $_POST['subdescr'];
$sql ="INSERT into services (title,description,subtitle,subdescr) values ('".$title."','".$des."','".$subtitle."','".$subdes."')";
mysqli_query($conn,$sql);
header("location:services.php");
exit();
}
?>