<?php include('components/menu.php') ?>     
<div id="page-content-wrapperx">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
         <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                 <h2 class="fs-2 m-0">Add Food</h2>
                 <?php
                     if(isset($_SESSION['upload'])){
                        echo $_SESSION['upload'];
                        unset ($_SESSION['upload']);
                    }
                 ?>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            </nav>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 ms-5">
                        <label for="title" class="form-label">Title</label>
                        <input placeholder="Title" name="title" type="text" class="form-control">
                    </div>
                    <div class="mb-3 ms-5">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea placeholder="Description of the food" name="description" class="form-control" id="exampleFormControlTextarea1" rows="5" cols="30"></textarea>
                    </div>
                    <div class="mb-3 ms-5">
                        <label for="Price" class="form-label">Price</label>
                        <input placeholder="Price"  name="price" type="number" class="form-control">
                    </div>
                    <div class="mb-3 ms-5">
                        <label for="image" class="form-label">Select Image</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                        <input name="submit" value="Add Food" type="submit" class="btn btn-warning ms-5">
                </form>
    <?php 
        if(isset($_POST['submit'])){
            $title=$_POST['title'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            if(isset($_FILES['image']['name'])){
                $image_name=$_FILES['image']['name'];
                if($image_name!=""){
                    $ext=end(explode('.',$image_name));
                    $image_name="Food-Name-".rand(0000,9999).".".$ext;
                    $src=$_FILES['image']['tmp_name'];
                    $dst="../images/food/".$image_name;
                    $upload=move_uploaded_file($src,$dst);
                    if($upload==false){
                        $_SESSION['upload']="<div class='alert alert-danger' role='alert'>
                        Failed To Upload Image !
                      </div>";
                      header('location:'.SITEURL.'admin/add_food.php');
                    }
                }
            }else{
                $image_name="";
            }
            $sql="INSERT INTO tbl_food SET
                title='$title',
                description='$description',
                image_name='$image_name',
                price=$price  
            ";
            $res=mysqli_query($conn,$sql);
            if($res==true){
                $_SESSION['add']="<div class='alert alert-success' role='alert'>
                Food Added !
              </div>";
              header('location:'.SITEURL.'admin/manage_food.php');
            }else{
                $_SESSION['add']="<div class='alert alert-danger' role='alert'>
                Failed To Add Food !
              </div>";
              header('location:'.SITEURL.'admin/manage_food.php');
            }
        }
    ?>