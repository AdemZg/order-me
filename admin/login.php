<?php include('../config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="login.css" type="text/css" />
    <title>Log in</title>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
      <h1 id="zz" class="mt-3 mb-5 fw-bold">LOG IN</h1>
      <?php
        if(isset($_SESSION['login'])){
            echo $_SESSION['login'];
            unset ($_SESSION['login']);
        }
        if(isset($_SESSION['not-login'])){
          echo $_SESSION['not-login'];
          unset ($_SESSION['not-login']);
      }
      ?>
    <form action="" method="POST">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="Username">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password">
      <input id="yes" name="submit" type="submit" class="fadeIn fourth" value="Log In">
    </form>

  </div>
</div>
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=md5($_POST['password']);
        $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        if($count==1){
            $_SESSION['login']="<div class='alert alert-success' role='alert'>
            Welcome !
          </div>";
          $_SESSION['user']=$username;
          header('location:'.SITEURL.'admin/');
        }else{
            $_SESSION['login']="<div class='alert alert-danger' role='alert'>
            Wrong Details !
          </div>";
          header('location:'.SITEURL.'admin/login.php');
        }
    }



?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


