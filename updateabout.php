<?php
include_once('conn.php');
// error_reporting(0);
$conn= mysqli_connect($servername,$username,$password,$dbname);
if(isset($_POST['btnadd']))
{
$id = $_POST['postid'];
$title= $_POST['title'];
$sub= $_POST['subtitle'];
$sub_des=$_POST['sub_des'];
$des=$_POST['des'];
$filename= $_FILES['file']['name'];
$tempname = $_FILES["file"]["tmp_name"];  
$folder = "Users/images/".$filename;
$imageFileType=pathinfo($folder,PATHINFO_EXTENSION);
//Allow only JPG, JPEG, PNG & GIF etc formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $error[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed';   
}
//echo $id;
mysqli_query($conn, "UPDATE about SET title='".$title."',sub_des='".$sub_des."',subtitle='".$sub."',description='".$des."' where id='".$id."'");
if(move_uploaded_file($tempname, $folder)){
    mysqli_query($conn, "UPDATE about SET images='".$filename."' WHERE id='".$id."'");
            header('location:about.php');
    }
    else{
        mysqli_query($conn, "UPDATE about SET title='".$title."',,sub_des='".$sub_des."',subtitle='".$sub."',description='".$des."' where id='".$id."'");        
	   header('location:about.php');
    }
}
    
//Delete code 
if(isset($_GET['del_id'])){
    $id= $_GET['del_id'];
    $sql= "DELETE FROM about WHERE id ='".$id."'";
    $result= mysqli_query($conn,$sql);
    header("location:about.php");
    }
    
?>