<?php
session_start();
include('conn.php');
if(isset($_SESSION['id']) && isset($_SESSION['username'])) {
        if(!isset($_SERVER['HTTP_REFERER']))
        {
              
              die(header('location:login2.php'));
              exit();  
        }else
        {
                // die(header('location:Admin/Users'));       
        }
?>

<?php
include('includes/header.php');
include('includes/about.php');
include('includes/facts.php');
include('includes/service.php');
include('includes/portfolio.php');
include('includes/team.php');
include('includes/contact.php');
include('includes/script.php');
include('includes/footer.php');
?>
  
 
<?php
}else{
        // header("location:login2.php");
        include('includes/errorpage.php');
         exit();
   
}
?>