<?php include('components/menu.php') ?>
<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="SELECT * FROM tbl_order WHERE id=$id";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        if($count==1){
            $row=mysqli_fetch_assoc($res);
            $food=$row['food'];
            $price=$row['price'];
            $qty=$row['qty'];
            $customer_name=$row['customer_name'];
            $status=$row['status'];
            ?>                   
            <?php
        }else{
            header('location:'.SITEURL.'admin/manage_order.php');
        }

    }else{
        header('location:'.SITEURL.'admin/manage_order.php');
    }
?>
                                    <?php
                                        if(isset($_POST['submit'])){
                                            $id=$_POST['id'];
                                            $price=$_POST['price'];
                                            $qty=$_POST['qty'];
                                            $total=$price*$qty;
                                            $status=$_POST['status'];
                                            $customer_name=$_POST['customer_name'];
                                            $sql2="UPDATE tbl_order SET
                                                qty=$qty,
                                                total=$total,
                                                status='$status',
                                                customer_name='$customer_name'
                                                WHERE id=$id
                                            ";
                                            $res2=mysqli_query($conn,$sql2);
                                            if($res2==true){
                                                $_SESSION['update']="<div class='alert alert-success' role='alert'>
                                                                Order Updated Successfully !
                                                            </div>";
                                                            header('location:'.SITEURL.'admin/manage_order.php');
                                            }else{
                                                $_SESSION['update']="<div class='alert alert-danger' role='alert'>
                                                                Failed To Update Order !
                                                            </div>";
                                                            header('location:'.SITEURL.'admin/manage_order.php');
                                            }
                                        }
                                    ?>
<div id="page-content-wrapperx ">
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


                                  <form class="ms-5" method="POST">
                                          <div class="form-group">
                                            <label class="mt-2 mb-2" for="exampleInputEmail1">Food</label>
                                            <h4 class="fw-b ms-2"><?php echo $food; ?></h4>
                                          </div>
                                          <div class="form-group mt-3">
                                            <label class="mt-2 mb-2" for="exampleInputPassword1">Price</label>
                                            <h4 class="fw-b ms-2"><?php echo $price; ?> DT</h4>
                                          </div>
                                          <div class="form-group mt-3">
                                            <label class="mt-2" for="exampleInputPassword1">Quantity</label>
                                            <input value="<?php echo $qty; ?>" name="qty" type="number" class="form-control" id="exampleInputPassword1" >
                                          </div>
                                          <div class="form-group mt-3">
                                            <label class="mt-2" for="exampleInputPassword1">Customer Name</label>
                                            <input value="<?php echo $customer_name; ?>" name="customer_name" type="text" class="form-control" id="exampleInputPassword1" >
                                          </div>
                                          <div class="form-group mt-3">
                                            <label class="mt-2" for="exampleFormControlSelect2">Status</label>
                                            <select multiple name="status" class="form-control" id="exampleFormControlSelect2">
                                              <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                                              <option <?php if($status=="On Delivery"){echo "On Delivery";} ?> value="On Delivery">On Delivery</option>
                                              <option <?php if($status=="Delivered"){echo "Delivered";} ?> value="Delivered">Delivered</option>
                                              <option <?php if($status=="Canceled"){echo "Canceled";} ?> value="Canceled">Canceled</option>
                                            </select>
                                          </div>
                                            <input type="hidden" name="id" value="<?php echo $id;  ?>">
                                            <input type="hidden" name="price" value="<?php echo $price;  ?>">
                                            <button name="submit" type="submit" class="btn btn-warning mt-3">Update Order</button>
                                    </form> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="script.js"></script>                                