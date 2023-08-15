<?php include('../config/constants.php')?>
<?php include('login_check.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" type="text/css" />
    <title>Admin Panel</title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <div class="bg-white" id="sidebar-wrapper">
            <div class="list-group list-group-flush my-3 " id="myList">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold active " ><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="manage_admin.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"   ><i
                        class="fas fa-user-alt me-2"></i>Admin</a>
                <a href="manage_food.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"  ><i
                        class="fas fa-pizza-slice me-2"></i>Food</a>
                <a href="manage_order.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"  ><i
                        class="fas fa-shopping-cart me-2"></i>Order</a>
                <a href="logout.php" id="btns" class=" btn btn-danger py-3 fw-bold"><i
                        class="fas fa-power-off me-2"></i>Log out</a>
            </div>
        </div>


