<?php
include('conn.php');
// Update Table code
$conn= mysqli_connect($servername,$username,$password,$dbname);
if (isset($_POST['btnadd'])) 
{
$id = $_POST['postid'];
$nm= $_POST['name'];
$em=$_POST['email'];
$pwd=$_POST['pass'];
$phone=$_POST['phone'];
$addr=$_POST['addr'];
$age=$_POST['age'];
$gen=$_POST['gender'];
$filename= $_FILES['file']['name'];
$tempname = $_FILES["file"]["tmp_name"];  
$folder = "images/".$filename;
$imageFileType=pathinfo($folder,PATHINFO_EXTENSION);
//Allow only JPG, JPEG, PNG & GIF etc formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
$pass = password_hash($pwd,PASSWORD_DEFAULT);
//echo $id;
mysqli_query($conn, "UPDATE emp_table SET emp_name='".$nm."',emp_email='".$em."',emp_pass='".$pass."',emp_phone='".$phone."',emp_addr='".$addr."',
emp_age='".$age."',gender='".$gen."' where emp_id='".$id."'");
if(move_uploaded_file($tempname, $folder)){
    mysqli_query($conn, "UPDATE emp_table SET emp_img='".$filename."' WHERE emp_id='".$id."'");
	   header('location:emptable.php');
    }else{
        mysqli_query($conn, "UPDATE emp_table SET emp_name='".$nm."',emp_email='".$em."',emp_pass='".$pass."',emp_phone='".$phone."',emp_addr='".$addr."',
        emp_age='".$age."',gender='".$gen."' where emp_id='".$id."'");        
	   header('location:emptable.php');
    }

}

// Delete code 
if(isset($_GET['del_id'])){
$id= $_GET['del_id'];
$sql= "DELETE FROM emp_table WHERE emp_id ='".$id."'";
$result= mysqli_query($conn,$sql);
header("location:emptable.php");
}

?>

