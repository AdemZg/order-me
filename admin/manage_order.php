<?php include('components/menu.php') ?>
<div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Order Section</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
            <div class="page-content page-container" id="page-content">
        <div class="row container d-flex justify-content-center">
<div class="col-lg-12 grid-margin stretch-card ">
              <div class="card mt-5">
                <div class="card-body">
                  <h4 class="card-title mt-3 mb-3 fw-bold">Manage Order Section</h4>
                  <?php 
                    if(isset($_SESSION['update'])){
                      echo $_SESSION['update'];
                      unset ($_SESSION['update']);
                      }
                      if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset ($_SESSION['delete']);
                    }
                  ?>
                  <div class="table-responsive">
                    <table class="table ">
                      <thead>
                        <tr>
                          <th>S.N</th>
                          <th>Food</th>
                          <th>Price</th>
                          <th>Qty</th>
                          <th>Total</th>
                          <th>Order Date</th>
                          <th>Status</th>
                          <th>Customer Name</th>                         
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <?php
                        $sql="SELECT * FROM tbl_order ORDER BY id DESC";
                        $res=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($res);
                        $i=1;
                        if($count>0){
                          while($row=mysqli_fetch_assoc($res)){
                            $id=$row['id'];
                            $food=$row['food'];
                            $price=$row['price'];
                            $qty=$row['qty'];
                            $total=$row['total'];
                            $order_date=$row['order_date'];
                            $status=$row['status'];
                            $customer_name=$row['customer_name'];
                            ?>
                            <tbody>
                              <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $food; ?></td>
                                <td><?php echo $price; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $total; ?></td>
                                <td><?php echo $order_date; ?></td>
                                <td>
                                  <?php
                                    if($status=="Ordered"){
                                      echo "<label class='fw-bold'>$status</label>";
                                    }elseif($status=="On Delivery"){
                                      echo "<label class='fw-bold' style='color: orange;'>$status</label>";
                                    }
                                    elseif($status=="Delivered"){
                                      echo "<label class='fw-bold' style='color: green;>$status</label>";
                                    }elseif($status=="Canceled"){
                                      echo "<label class='fw-bold' style='color: red;>$status</label>";
                                    }
                                   ?>
                                </td>
                                <td><?php echo $customer_name; ?></td>
                                <td><a href="<?php echo SITEURL; ?>admin/update_order.php?id=<?php echo $id; ?>" type="button" class="btn btn-outline-success ms-2">Update</a>                             
                                  <a href="<?php echo SITEURL; ?>admin/delete_order.php?id=<?php echo $id; ?>" type="button" class="btn btn-outline-danger ms-3">Delete</a></td>
                              </tr>
                            </tbody>
                            <?php                          
                          }
                        }else{
                          echo "<div class='alert alert-danger' role='alert'>
                              Order Not Available !
                            </div>";                         
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="script.js"></script>