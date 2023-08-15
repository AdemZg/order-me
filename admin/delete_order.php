<?php 
    include('../config/constants.php');

   $id=$_GET['id'];
   $sql="DELETE FROM tbl_order WHERE id=$id";
   $res=mysqli_query($conn,$sql);
   if($res==true){
       $_SESSION['delete']="<div class='alert alert-success' role='alert'>
       Order Deleted !
     </div>";
       header('location:'.SITEURL.'admin/manage_order.php');
   }else{
       $_SESSION['delete']="<div class='alert alert-danger' role='alert'>
       Sorry Couldn't Delete The Order !
     </div>";
       header('location:'.SITEURL.'admin/manage_order.php');
   }
?>