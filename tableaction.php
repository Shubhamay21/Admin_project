<?php
include('conn.php');
// Update Table code
$conn= mysqli_connect($servername,$username,$password,$dbname);
$id = $_POST['postid'];
$nm= $_POST['name'];
$em=$_POST['email'];
$pwd=$_POST['password'];
$pass = password_hash($pwd,PASSWORD_DEFAULT);
//echo $id;
$sql ="UPDATE admin SET admin_name='".$nm."',email='".$em."',password='".$pass."' where id='".$id."'";
mysqli_query($conn,$sql);

//Delete code 
if(isset($_GET['del_id'])){
$id= $_GET['del_id'];
$sql= "DELETE FROM admin WHERE id ='".$id."'";
$result= mysqli_query($conn,$sql);
header("location:tables.php");
}

?>

