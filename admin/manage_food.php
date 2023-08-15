<?php include('components/menu.php') ?>
<div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Food Section</h2>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
            <div class="page-content page-container" id="page-content">
        <div class="row container d-flex justify-content-center">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card mt-5">
                <div class="card-body">
                  <h4 class="card-title fw-bold">Manage Food Section</h4>
                  <a href="add_food.php"  class="btn btn-success mt-3 mb-3">Add Food</a>
                  <?php
                     if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset ($_SESSION['add']);
                    }
                    if(isset($_SESSION['delete'])){
                      echo $_SESSION['delete'];
                      unset ($_SESSION['delete']);
                    }
                    if(isset($_SESSION['upload'])){
                      echo $_SESSION['upload'];
                      unset ($_SESSION['upload']);
                    }
                    if(isset($_SESSION['unauthorized'])){
                      echo $_SESSION['unauthorized'];
                      unset ($_SESSION['unauthorized']);
                    }
                    if(isset($_SESSION['update'])){
                      echo $_SESSION['update'];
                      unset ($_SESSION['update']);
                    }
                 ?>
                  <div class="table-responsive">
                    <table class="table ">
                      <thead>
                        <tr>
                          <th>S.N</th>
                          <th>Title</th>
                          <th>Price (DT)</th>
                          <th>Image</th>
                          <th><div class="ms-5">Actions</div></th>
                        </tr>
                      </thead>
                      <?php 
                        $sql="SELECT * FROM tbl_food";
                        $res=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($res);
                        $i=1;
                        if($count>0){
                          while($row=mysqli_fetch_assoc($res)){
                            $id=$row['id'];
                            $title=$row['title'];
                            $price=$row['price'];
                            $image_name=$row['image_name'];
                            ?>
                        <tbody>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $price; ?></td>
                            <td><?php 
                            if($image_name==""){
                              echo "<div class='alert alert-danger' role='alert'>
                              Image Not Loaded !
                            </div>";
                            }else{
                              ?>
                                <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name ?>" height="50px" wdith="60px">
                              <?php
                            }
                            ?>
                            </td>
                            <td><a href="<?php echo SITEURL;?>admin/update_food.php?id=<?php echo $id;?>" type="button" class="btn btn-outline-success ms-2 ">Update</a>
                              <a href="<?php echo SITEURL;?>admin/delete_food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name ;?>" type="button" class="btn btn-outline-danger ms-3">Delete</a></td>
                          </tr>
                        </tbody>
                            <?php
                          }
                        }else{
                        }
                      ?>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    <script src="script.js"></script>