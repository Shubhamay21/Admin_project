<?php
include_once('conn.php');

$conn= mysqli_connect($servername,$username,$password,$dbname);
if(isset($_POST['btnadd']))
{
$title= $_POST['title'];
$des= $_POST['descr'];
$filename= $_FILES['file']['name'];
$tempname = $_FILES["file"]["tmp_name"];  
$folder = "Users/images/portfolio/".$filename;
$imageFileType=pathinfo($folder,PATHINFO_EXTENSION);
//Allow only JPG, JPEG, PNG & GIF etc formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
$pass = password_hash($password,PASSWORD_DEFAULT);
$sql ="INSERT into portfolio (title,description,images) values ('".$title."','".$des."','".$filename."')";
mysqli_query($conn,$sql);
if (move_uploaded_file($tempname, $folder)) {
    $msg = "Image uploaded successfully";
}else{

    $msg = "Failed to upload image";
}

$sql = "SELECT * FROM portfolio";
$result = mysqli_query($conn, $sql);
    header("location:portfolio.php");
    exit();
}
?>