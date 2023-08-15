<?php include('components/menu.php') ?>    
<?php 
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="SELECT * FROM tbl_food WHERE id=$id";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($res);
        $title=$row['title'];
        $description=$row['description'];
        $price=$row['price'];
        $current_image=$row['image_name']; 
    }else{
        header('location:'.SITEURL.'admin/manage_food.php');
    }
?> 
                <?php
                    if(isset($_POST['submit'])){
                        $id=$_POST['id'];
                        $title=$_POST['title'];
                        $description=$_POST['price'];
                        $current_image=$_POST['current_image'];
                        if(isset($_FILES['image']['name'])){
                            $image_name=$_FILES['image']['name'];
                            if($image_name!=""){
                                $ext=end(explode('.',$image_name));
                                $image_name="Food-Name-".rand(0000,9999).'.'.$ext;
                                $src_path=$_FILES['image']['tmp_name'];
                                $dest_path="../images/food/".$image_name;
                                $upload=move_uploaded_file($src_path,$dest_path);
                                if($upload==false){
                                    $_SESSION['upload']="<div class='alert alert-danger' role='alert'>
                                    Failed To Upload New Image !
                                  </div>";
                                  header('location:'.SITEURL.'admin/manage_food.php');
                                  die();
                                }
                                if($current_image!=""){
                                    $remove_path="../images/food/".$current_image;
                                    $remove=unlink($remove_path);
                                    if($remove_path==false){
                                        $_SESSION['upload']="<div class='alert alert-danger' role='alert'>
                                        Failed To Remove Current Image !
                                      </div>";
                                      header('location:'.SITEURL.'admin/manage_food.php');
                                      die();
                                    }
                                }else{
                                    $image_name=$current_image;
                                }
                            }
                        }else{
                            $image_name=$current_image;
                        }
                        $sql2="UPDATE tbl_food SET
                            title='$title',
                            description='$description',
                            price=$price,
                            image_name='$image_name'
                            WHERE id=$id
                        ";
                        $res2=mysqli_query($conn,$sql2);
                        if($res2==true){
                            $_SESSION['update']="<div class='alert alert-success' role='alert'>
                            Food Updated Successfully !
                          </div>";
                          header('location:'.SITEURL.'admin/manage_food.php');
                        }else{
                            $_SESSION['update']="<div class='alert alert-danger' role='alert'>
                            Failed To Upload Food !
                          </div>";
                          header('location:'.SITEURL.'admin/manage_food.php');
                        }
                    }
                ?>
<div id="page-content-wrapperx">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
         <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                 <h2 class="fs-2 m-0">Update Food</h2>
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
                        <input value="<?php echo $title; ?>" placeholder="Title" name="title" type="text" class="form-control">
                    </div>
                    <div class="mb-3 ms-5">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea placeholder="Description of the food" name="description" class="form-control" id="exampleFormControlTextarea1" rows="5" cols="30"><?php echo $description; ?></textarea>
                    </div>
                    <div class="mb-3 ms-5">
                        <label for="Price" class="form-label">Price</label>
                        <input value="<?php echo $price; ?>" placeholder="Price"  name="price" type="number" class="form-control">
                    </div>
                    <div class="mb-3 ms-5">
                        <label for="image" class="form-label">Current Image</label><br>
                        <?php 
                            if($current_image==""){
                              echo "<div class='alert alert-danger' role='alert'>
                              Image Not Available !
                            </div>";
                            }else{
                              ?>
                                <img src="<?php echo SITEURL;?>images/food/<?php echo $current_image ?>">
                              <?php
                            }
                            ?>
                    </div>
                    <div class="mb-3 ms-5">
                        <label for="image" class="form-label">Select New Image</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                        <input name="id" value="<?php echo $id; ?>" type="hidden" class="btn btn-warning ms-5">
                        <input name="current_image" value="<?php echo $current_image; ?>" type="hidden" class="btn btn-warning ms-5">
                        <input name="submit" value="Update Food" type="submit" class="btn btn-warning ms-5">
                </form>
