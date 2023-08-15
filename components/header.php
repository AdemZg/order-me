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
  <div class="hero_area bggz">
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>
              Yummy
            </span>
          </a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo SITEURL; ?>">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#offers">Offers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo SITEURL; ?>food.php">Food</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo SITEURL; ?>about.php">About</a>
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