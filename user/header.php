<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
 <head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Coolpanda</title>
  <link rel="shortcut icon" href="img/coolpang.png"/>
  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">


</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand logo" href="index.php">
      <img src="img/coolpanda.png" class="logo-img"/></a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php#portfolio">吃吃吃</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="danish_shop.php">买买买</a>
          </li>
          <?php 
          if(isset($_SESSION["email"]))
          {
          ?>
          <li class="nav-item mx-0 mx-lg-1">
                  <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="personal.php">欢迎你,<?php echo $_SESSION["name"]; ?></a> 
          </li>
          <li class="nav-item mx-0 mx-lg-1">
                  <a href="login.php" class="btn alt  header-btn">退出</a>
          </li>
          <?php 
          }
          else
          {
          ?>

          <li class="nav-item mx-0 mx-lg-1">
                  <a href="login.php" class="btn alt  header-btn">登录</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
                  <a href="register.php" class="btn alt  header-btn">注册</a>
          </li>
          <?php
                    }
          ?>
        </ul>
      </div>
    </div>
  </nav>