<?php
    include('../config/constants.php');
   if(isset($_GET['id']) && isset($_GET['image_name'])){
       $id=$_GET['id'];
       $image_name=$_GET['image_name'];
       if($image_name!=""){
           $path="../images/food/".$image_name;
           $remove=unlink($path);
           if($remove==false){
            $_SESSION['upload']="<div class='alert alert-warning' role='alert'>
            Failed To Remove Image File !
          </div>";
            header('location:'.SITEURL.'admin/manage_food.php'); 
            die();
           }
       }
       $sql="DELETE FROM tbl_food WHERE id=$id";
       $res=mysqli_query($conn,$sql);
       if($res==true){
        $_SESSION['delete']="<div class='alert alert-success' role='alert'>
        Food Deleted Successfully !
      </div>";
        header('location:'.SITEURL.'admin/manage_food.php');
       }else{
        $_SESSION['delete']="<div class='alert alert-danger' role='alert'>
        Failed To Delete Food !
      </div>";
        header('location:'.SITEURL.'admin/manage_food.php');
       }
   }else{
    $_SESSION['unauthorized']="<div class='alert alert-danger' role='alert'>
    Unauthorized Access !
  </div>";
    header('location:'.SITEURL.'admin/manage_food.php');
   }
?>