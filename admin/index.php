<?php include('components/menu.php') ?>
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
            <?php 
                    if(isset($_SESSION['login'])){
                        echo $_SESSION['login'];
                        unset ($_SESSION['login']);
                    }
                ?>
            <div class="container-fluid px-5 mt-5">
                <div class="row g-3 my-2">
                    <div class="col-md-6 mt-5 px-5 w-30">
                        <div class="p-5 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2 fw-bold">2</h3>
                                <p class="fs-3 fw-bold">Offers</p>
                            </div>
                            <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-6 mt-5 px-5 w-30">
                        <div class="p-5 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php
                                    $sql="SELECT * FROM tbl_food";
                                    $res=mysqli_query($conn,$sql);
                                    $count=mysqli_num_rows($res);
                                ?>
                                <h3 class="fs-2 fw-bold"><?php echo $count; ?></h3>
                                <p class="fs-3 fw-bold">Foods</p>
                            </div>
                            <i
                                class="fas fa-hamburger fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-6 mt-5 px-5 w-30">
                        <div class="p-5 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                            <?php
                                    $sql2="SELECT * FROM tbl_order";
                                    $res2=mysqli_query($conn,$sql2);
                                    $count2=mysqli_num_rows($res2);
                                ?>
                                <h3 class="fs-2 fw-bold"><?php echo $count2; ?></h3>
                                <p class="fs-3 fw-bold">Total Orders</p>
                            </div>
                            <i class="fas fa-truck fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-6 mt-5 px-5 w-30">
                        <div class="p-5 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                            <?php
                                    $sql3="SELECT SUM(total) AS Total FROM tbl_order";
                                    $res3=mysqli_query($conn,$sql3);
                                    $row3=mysqli_fetch_assoc($res3);
                                    $total_revenue=$row3['Total'];
                                    
                                ?>
                                <h3 class="fs-2 fw-bold"><?php echo $total_revenue;?> DT</h3>
                                <p class="fs-3 fw-bold">Revenue</p>
                            </div>
                            <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
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
</body>
</html>