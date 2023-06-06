<?php
include_once('conn.php');

$conn= mysqli_connect($servername,$username,$password,$dbname);
if(isset($_POST['btnadd']))
{
$title= $_POST['title'];
$des= $_POST['descr'];
$name=$_POST['name'];
$desig=$_POST['desig'];
$filename= $_FILES['file']['name'];
$tempname = $_FILES["file"]["tmp_name"];  
$folder = "Users/images/".$filename;
$imageFileType=pathinfo($folder,PATHINFO_EXTENSION);
//Allow only JPG, JPEG, PNG & GIF etc formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
$pass = password_hash($password,PASSWORD_DEFAULT);
$sql ="INSERT into team (title,description,name,designation,images) values ('".$title."','".$des."','".$desig."','".$name."','".$filename."')";
mysqli_query($conn,$sql);
if (move_uploaded_file($tempname, $folder)) {
    $msg = "Image uploaded successfully";
}else{

    $msg = "Failed to upload image";
}

$sql = "SELECT * FROM team";
$result = mysqli_query($conn, $sql);
    header("location:team.php");
    exit();
}
?>