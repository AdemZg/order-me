<?php include('components/menu.php') ?>

<?php 
    if(isset($_POST['submit']))
    {
        $full_name=$_POST['full_name'];
        $username =$_POST['username'];
        $password=md5($_POST['password']);

        $sql="INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";
        $res=mysqli_query($conn,$sql);
        if($res==true){
            $_SESSION['add']="<div class='alert alert-success' role='alert'>
            Admin Added Successfully!
          </div>";
          header('location:'.SITEURL.'admin/manage_admin.php');
        }
    }
?>

<div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0 ">Admin Section</h2>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
            <div class="page-content page-container" id="page-content">
    <div>
        <div class="row container d-flex justify-content-center">

        <div class="col-lg-12 grid-margin stretch-card">
              <div class="card mt-5">
                <div class="card-body">
                  <h2 class="card-title fw-bold">Manage Admin Section</h2>
                    <button type="button" class="btn btn-success mt-3 mb-3 me-3" data-toggle="modal" data-target="#exampleModal">
                    Add Admin </button>
                    <?php 
                     if(isset($_SESSION['add'])){
                        echo $_SESSION['add'];
                        unset ($_SESSION['add']);
                    }
                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset ($_SESSION['delete']);
                    }
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset ($_SESSION['update']);
                    }
                    if(isset($_SESSION['pwd-not-match'])){
                        echo $_SESSION['pwd-not-match'];
                        unset ($_SESSION['pwd-not-match']);
                    }
                    if(isset($_SESSION['change-pw'])){
                        echo $_SESSION['change-pw'];
                        unset ($_SESSION['change-pw']);
                    }
                    ?>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Admin</h5>
                        </div>
                        <div class="modal-body">
                        <form action="" method="POST">
                            <div class="form-group mt-2">
                                <label for="name">Full Name</label>
                                <input name="full_name" type="text" class="form-control mt-2"  placeholder="Enter Your Full Name">
                            </div>
                            <div class="form-group mt-2">
                                <label for="username">Username</label>
                                <input name="username" type="text" class="form-control mt-2"  placeholder=" Enter Your Username">
                            </div>
                            <div class="form-group mt-2">
                                <label for="password">Password</label>
                                <input name="password" type="password" class="form-control mt-2"  placeholder="Password">
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-success" value="Add Admin" name="submit">
                        </div>
                        </form>
                        </div>
                        </div>
                    </div>
                    </div>
                  <div class="table-responsive">
                    <table class="table ">
                      <thead>
                        <tr>
                          <th>S.N</th>
                          <th>Full Name</th>
                          <th>Username</th>
                          <th><div class="ms-5">Actions</div></th>
                        </tr>
                      </thead>
                      <tbody>
                            <?php
                                $sql="SELECT * FROM tbl_admin";    
                                $res=mysqli_query($conn,$sql);
                                if($res==true){
                                    $count=mysqli_num_rows($res);
                                    $i=1;
                                    if($count>0){
                                        while($rows=mysqli_fetch_assoc($res)){
                                            $id=$rows['id'];
                                            $full_name=$rows['full_name'];
                                            $username=$rows['username'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $i++; ?></td>
                                                    <td><?php echo $full_name; ?></td>
                                                    <td><?php echo $username; ?></td>
                                                    <td>
                                                    <a href="<?php echo SITEURL; ?>admin/change_password.php?id=<?php echo $id; ?>" type="button" class="btn btn-outline-warning ms-3 ">Change Password</a>
                                                    <a href="<?php echo SITEURL; ?>admin/update_admin.php?id=<?php echo $id; ?>" type="button" class="btn btn-outline-success ms-2 ">Update</a>
                                                    <a href="<?php echo SITEURL; ?>admin/delete_admin.php?id=<?php echo $id; ?>" type="button" class="btn btn-outline-danger ms-3 ">Delete</a></td>
                                                 </tr>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>     
        </div>
     </div>
    </div>





<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script src="script.js"></script>