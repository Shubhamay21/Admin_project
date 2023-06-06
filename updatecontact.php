<?php
include_once('conn.php');
// error_reporting(0);
$conn= mysqli_connect($servername,$username,$password,$dbname);
if(isset($_POST['btnadd']))
{
$id = $_POST['postid'];
$title= $_POST['title'];
$des= $_POST['descr'];
$em= $_POST['email'];
$addr= $_POST['addr'];
$phone= $_POST['phone_num'];
$sql="UPDATE contact SET title='".$title."',description='".$des."',email='".$em."',address='".$addr."',phone='".$phone."' where id='".$id."'";
mysqli_query($conn,$sql);
header("location:contact.php");
exit();
}    
//Delete code 
if(isset($_GET['del_id'])){
    $id= $_GET['del_id'];
    $sql= "DELETE FROM contact WHERE id ='".$id."'";
    $result= mysqli_query($conn,$sql);
    header("location:contact.php");
    }
    
?>