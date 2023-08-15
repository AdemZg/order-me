<?php 
    include('../config/constants.php');

   $id=$_GET['id'];
   $sql="DELETE FROM tbl_admin WHERE id=$id";
   $res=mysqli_query($conn,$sql);
   if($res==true){
       $_SESSION['delete']="<div class='alert alert-danger' role='alert'>
       Admin Deleted!
     </div>";
       header('location:'.SITEURL.'admin/manage_admin.php');
   }else{
       $_SESSION['delete']="<div class='alert alert-danger' role='alert'>
       Sorry!!
     </div>";
       header('location:'.SITEURL.'admin/manage_admin.php');
   }
?>