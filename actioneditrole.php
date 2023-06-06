<?php
include_once('conn.php');

$conn= mysqli_connect($servername,$username,$password,$dbname);
$name= $_POST['name'];
$sql ="INSERT into create_role (role_name) values ('".$name."')";
mysqli_query($conn,$sql);
    
?>