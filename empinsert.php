<?php
include_once('conn.php');

$conn= mysqli_connect($servername,$username,$password,$dbname);
if(isset($_POST['btnadd']))
{
$name= $_POST['name'];
$email=$_POST['email'];
$password= $_POST['pass'];
$address= $_POST['addr'];
$phone= $_POST['phone'];
$age= $_POST['age'];
$gender= $_POST['gender'];
$filename= $_FILES['file']['name'];
$tempname = $_FILES["file"]["tmp_name"];  
$folder = "images/".$filename;
$imageFileType=pathinfo($folder,PATHINFO_EXTENSION);
//Allow only JPG, JPEG, PNG & GIF etc formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
$pass = password_hash($password,PASSWORD_DEFAULT);
$sql ="INSERT into emp_table (emp_name,emp_email,emp_pass,emp_phone,emp_addr,emp_age,gender,emp_img) values ('".$name."','".$email."','".$pass."','".$phone."','".$address."','".$age."','".$gender."','".$filename."')";
mysqli_query($conn,$sql);
if (move_uploaded_file($tempname, $folder)) {
    $msg = "Image uploaded successfully";
}else{

    $msg = "Failed to upload image";
}

$sql = "SELECT * FROM emp_table";
$result = mysqli_query($conn, $sql);
    header("location:emptable.php");
    exit;
}

?>