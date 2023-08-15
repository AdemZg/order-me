<?php include('config/constants.php') ?>
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
  <link href="css/responsive.css" rel="stylesheet" />
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
            <ul class="navbar-nav  mx-auto ">
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
    <section id="food" class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center mt-5 ">
        <h2 class="fw-bold ttt">
          Food Menu
        </h2>
      <div class="filters-content mt-4">
        <div class="row grid"> 
          <?php
              $sql="SELECT * FROM tbl_food";
              $res=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($res); 
              if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                  $id=$row['id'];
                  $title=$row['title'];
                  $price=$row['price'];
                  $description=$row['description'];
                  $image_name=$row['image_name'];
                  ?>
                    <div id="boxs" class="col-sm-6 col-lg-4">
                      <div class="box">
                        <div>
                          <div class="img-box">
                            <?php
                              if($image_name==""){
                                echo "<div class='alert alert-danger' role='alert'>
                                      Image Not Available !
                                           </div>";
                              }else{
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="">
                                <?php
                              }
                            ?>   
                          </div>
                          <div class="detail-box">
                            <h5 class="box-title">
                              <?php echo $title; ?>
                            </h5>
                            <p><?php echo $description; ?></p>
                            <div class="options">
                              <h6>
                              <?php echo $price; ?>
                              </h6>
                              <a type="button" class="btn btn-warning text-white" href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>">Order Now</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>                                      
                  <?php
                }
              }else{
                echo "<div class='alert alert-danger' role='alert'>
                      Food Not Available !
                          </div>";
              }
            ?>
        </div>
      </div>
   </div>
  </section>
</div>
<?php include('components/footer.php') ?>
<script src="js/app.js"></script>