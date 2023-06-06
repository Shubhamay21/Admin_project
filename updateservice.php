<?php
include_once('conn.php');
// error_reporting(0);
$conn= mysqli_connect($servername,$username,$password,$dbname);
if(isset($_POST['btnadd']))
{
$id = $_POST['postid'];
$title= $_POST['title'];
$des= $_POST['descr'];
$subtitle= $_POST['subtitle'];
$subdes= $_POST['subdescr'];
$sql="UPDATE services SET title='".$title."',description='".$des."',subtitle='".$subtitle."',subdescr='".$subdes."' where id='".$id."'";
mysqli_query($conn,$sql);
header("location:services.php");
exit();
}    
//Delete code 
if(isset($_GET['del_id'])){
    $id= $_GET['del_id'];
    $sql= "DELETE FROM services WHERE id ='".$id."'";
    $result= mysqli_query($conn,$sql);
    header("location:services.php");
    }
    
?>