<?php include('components/menu.php') ?>
<?php 
    $id=$_GET['id'];
    $sql="SELECT * FROM tbl_admin WHERE id=$id";
    $res=mysqli_query($conn,$sql);
    if($res==true){
        $count=mysqli_num_rows($res);
        if($count==1){
            $row=mysqli_fetch_assoc($res);
            $full_name=$row['full_name'];
            $username=$row['username'];
        }else{
            header('location:'.SITEURL.'admin/manage_admin.php');
        }
    }

?>
<div id="page-content-wrapperx">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
         <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                 <h2 class="fs-2 m-0">Update Admin</h2>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            </nav>
<form action="" method="POST">
  <div class="mb-3 ms-5">
    <label for="exampleInputEmail1" class="form-label">Full Name</label>
    <input value="<?php echo $full_name; ?>" name="full_name" type="text" class="form-control">
  </div>
  <div class="mb-3 ms-5">
    <label for="username" class="form-label">Username</label>
    <input value="<?php echo $username; ?>" name="username" type="text" class="form-control">
  </div>
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <input name="submit" value="Update Admin" type="submit" class="btn btn-warning ms-5">
</form>
<?php 
    if(isset($_POST['submit'])){
        $id=$_POST['id'];
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        $sql="UPDATE tbl_admin SET
        full_name='$full_name',
        username='$username'
        WHERE id='$id'
        ";
        $res=mysqli_query($conn,$sql);
        if($res==true){
            $_SESSION['update']="<div class='alert alert-success' role='alert'>
            Admin Updated Successfully!
          </div>";
          header('location:'.SITEURL.'admin/manage_admin.php');
        }
    }

?>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


    <script src="script.js"></script>