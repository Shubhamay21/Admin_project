<?php
session_start();
session_destroy();
unset($_SESSION['admin_name']);
header("location:login.php?logout");
?>