<?php
include_once('conn.php');

$conn= mysqli_connect($servername,$username,$password,$dbname);
$id = $_POST['postid'];
$nm= $_POST['name'];
$sql="UPDATE create_role SET role_name='".$nm."' where id='".$id."'";
mysqli_query($conn,$sql);

//Delete code 
if(isset($_GET['del_id'])){
    $id= $_GET['del_id'];
    $sql= "DELETE FROM create_role WHERE id ='".$id."'";
    $result= mysqli_query($conn,$sql);
    header("location:editrole.php");
    }
    
?>