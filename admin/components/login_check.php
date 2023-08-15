<?php
    if(!isset($_SESSION['user'])){
        $_SESSION['not-login']="<div class='alert alert-warning' role='alert'>
        Please Login to Access Admin Panel !
      </div>";
      header('location:'.SITEURL.'admin/login.php');
    }      
?>