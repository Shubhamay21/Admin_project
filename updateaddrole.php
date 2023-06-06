<?php
include_once('conn.php');
error_reporting(0);
$conn= mysqli_connect($servername,$username,$password,$dbname);
if(isset($_POST['btnadd']))
{
$id = $_POST['postid'];
$nm= $_POST['name'];
$em= $_POST['email'];
$rol=$_POST['role'];
$arrol= implode(',',$rol);
$sql="UPDATE admin_role SET name='".$nm."',email='".$em."',roles='".$arrol."' where id='".$id."'";
mysqli_query($conn,$sql);
header("location:addrole.php");
exit();
}    
//Delete code 
if(isset($_GET['del_id'])){
    $id= $_GET['del_id'];
    $sql= "DELETE FROM admin_role WHERE id ='".$id."'";
    $result= mysqli_query($conn,$sql);
    header("location:addrole.php");
    }
    
?>