<?php include('config/constants.php') ?>
<?php 
          if(isset($_POST['submit'])){
            $food=$_POST['food'];
            $price=$_POST['price'];
            $qty=$_POST['qty'];
            $total=$price * $qty;
            $order_date= date("Y-m-d h:i:sa");
            $status="Ordered";
            $customer_name=$_POST['full-name'];
            $customer_contact=$_POST['contact'];
            $customer_email=$_POST['email'];
            $customer_address=$_POST['address'];
            $sql2="INSERT INTO tbl_order SET
              food='$food',
              price=$price,
              qty=$qty,
              total=$total,
              order_date='$order_date',
              status='$status',
              customer_name='$customer_name',
              customer_contact='$customer_contact',
              customer_email='$customer_email',
              customer_address='$customer_address'
            ";
            $res2=mysqli_query($conn,$sql2);
            if($res2==true){
              $_SESSION['order']="<div class='alert alert-success text-center' role='alert'>
                  Food Ordered Successfully !
                </div>";
                header('location:'.SITEURL);
            }else{
              $_SESSION['order']="<div class='alert alert-danger text-center' role='alert'>
                  Failed To Order Food !
                </div>";
                header('location:'.SITEURL);
            }
          }
        ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title> Yummy </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet" />
</head>
<body>
  <div class="hero_area bgg">
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span id="span1">
              Yummy
            </span>
          </a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul  class="navbar-nav  mx-auto ">
              <li class="nav-item active">
                <a class="nav-link mwah" href="<?php echo SITEURL; ?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mwah" href="#offers">Offers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mwah" href="<?php echo SITEURL; ?>food.php">Food</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mwah" href="<?php echo SITEURL; ?>about.php">About</a>
              </li>
            </ul>
            <div class="user_option">
              <a href="#food" class="order_online">
                Order Now
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
<section id="trrr">
    <div  class="container mt-5 mb-5 w-75">
        <h2 class="text-center ttt  fw-bold">Fill this form to confirm your order</h2>
        <form id="form" method="POST" class="text-center text-white">
                <fieldset>
                <?php
                      if(isset($_GET['food_id'])){
                        $food_id=$_GET['food_id'];
                        $sql="SELECT * FROM tbl_food WHERE id=$food_id";
                        $res=mysqli_query($conn,$sql);
                        $count=mysqli_num_rows($res);
                        if($count==1){
                          $row=mysqli_fetch_assoc($res);
                          $title=$row['title'];
                          $price=$row['price'];
                          $image_name=$row['image_name'];
                          ?>
                        <h3 class=" fw-bold">Selected Food</h3>
                        <div class="food-menu-img">
                          <?php
                            if($image_name==""){
                              echo "<div class='alert alert-danger' role='alert'>
                              Image Not Available!
                            </div>";
                            }
                            else{
                              ?>
                              <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>">
                              <?php
                            }
                           ?>
                            
                        </div><br>
                        <div class="food-menu-desc">                      
                            <h3 class="fw-bold"><?php echo $title; ?></h3>
                            <input type="hidden" name="food" value="<?php echo $title; ?>">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <p class="food-price"><?php echo $price;?> DT</p>
                            <div class="order-label">Quantity</div>
                            <input type="number" name="qty" class="input-responsive" value="1" required> 
                        </div>
                </fieldset>
                          <?php
                        }else{
                          header('location:'.SITEURL);
                        }
                      }
                  ?>
                      <fieldset id="btnz">
                              <h3 class=" fw-bold mt-4 mb-4">Delivery Details</h3>
                          <div class="mb-3 ">
                              <label for="exampleInputEmail1" class="form-label">Full Name</label>
                              <input id="zza" name="full-name" type="text" placeholder="E.g Adem" class="form-control" >     
                          </div>
                          <div class="mb-3  ">
                              <label for="exampleInputPassword1" class="form-label">Phone Number</label>
                              <input id="zaa" name="contact" type="tel" placeholder="E.g. +216:" class="form-control" >
                          </div>
                          <div class="mb-3 ">
                              <label for="exampleInputPassword1" class="form-label">Email</label>
                              <input id="aaa" name="email" type="text" placeholder="E.g. Adem@gmail.com" class="form-control" >
                          </div>
                          <div class="mb-3 ">
                              <label for="exampleInputPassword1" class="form-label">Address</label>
                              <textarea id="bbb" name="address" rows="5" placeholder="E.g. Street, City, Country" type="email" class="form-control"></textarea>
                          </div>
                          <input class="xd" type="submit" name="submit" value="Confirm Order">
                      </fieldset>
        </form>
    </div>
    </div>
 </section>
 <script src="js/js.js"></script>
<?php include('components/footer.php') ?>