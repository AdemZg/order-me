<?php include('components/menu.php') ?>
<div id="page-content-wrapperx">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
         <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                 <h2 class="fs-2 m-0">Change Your Password</h2>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
    </button>
     </nav>
     <?php 
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        }
     ?>
          <form action="" method="POST">
            <div class="mb-3 ms-5">
              <label for="password" class="form-label">Current Password</label>
              <input  name="current_password" type="password" class="form-control" placeholder="Current Password">
            </div>
            <div class="mb-3 ms-5">
              <label for="password" class="form-label">New Password</label>
              <input  name="new_password" type="password" class="form-control" placeholder="New Password">
            </div>
            <div class="mb-3 ms-5">
              <label for="password" class="form-label">Confirm Password</label>
              <input  name="confirm_password" type="password" class="form-control" placeholder="Confirm Password">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input name="submit" value="Change Password" type="submit" class="btn btn-warning ms-5">
          </form> 
<?php
    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $current_password=md5($_POST['current_password']);
        $new_password=md5($_POST['new_password']);
        $confirm_password=md5($_POST['confirm_password']);
        $sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";
        $res=mysqli_query($conn,$sql);
        if($res==true){
            $count=mysqli_num_rows($res);
            if($count==1){
                if($new_password==$confirm_password){
                    $sql2="UPDATE tbl_admin SET
                        password='$new_password'
                        WHERE id=$id
                    ";
                    $res2=mysqli_query($conn,$sql2);
                    if($res2==true){
                        $_SESSION['change-pwd']="<div class='alert alert-success' role='alert'>
                    Password Changed Successfully!
                  </div>";
                  header('location:'.SITEURL.'admin/manage_admin.php');
                    }
                }
                else{
                    $_SESSION['pwd-not-match']="<div class='alert alert-danger' role='alert'>
                    Password Did Not Match!
                  </div>";
                  header('location:'.SITEURL.'admin/manage_admin.php');
                    }
            }
        }
    }
?>