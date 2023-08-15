<?php include('components/header.php') ?>
    <section class="slider_section mt-5 ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1 class="mb-3">
                      The Best Food In The Whole World
                    </h1>
                    <p>
                      Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad mollitia laborum quam quisquam esse error unde. Tempora ex doloremque, labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <section id="offers" class="offer_section layout_padding-bottom">
  <?php 
     if(isset($_SESSION['order'])){
      echo $_SESSION['order'];
      unset ($_SESSION['order']);
      }
  ?>
    <div class="offer_container">
      <div class="container ">
        <div class="row">
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="images/o1.jpg" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Burger So Tasty
                </h5>
                <h6>
                  <span>20%</span> Off
                </h6>
                <a href="<?php echo SITEURL; ?>order.php">
                  Order Now 
                </a>
              </div>
            </div>
          </div>
          <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="images/o2.jpg" alt="">
              </div>
              <div class="detail-box">
                <h5>
                  Pizza Days
                </h5>
                <h6>
                  <span>15%</span> Off
                </h6>
                <a href="<?php echo SITEURL; ?>order.php">
                  Order Now 
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="food" class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Food Menu
        </h2>
      </div>
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
                    <div class="col-sm-6 col-lg-4">
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
                            <h5>
                              <?php echo $title; ?>
                            </h5>
                            <p><?php echo $description; ?></p>
                            <div class="options">
                              <h6>
                              <?php echo $price; ?> DT
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
        <div class="btn-box">
        <a href="<?php echo SITEURL; ?>food.php">
          View More
        </a>
      </div>
   </div>
  </section>
  <?php include('components/about.php') ?>
<?php include('components/footer.php') ?>
