<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Coolpang</title>

  <!-- Custom fonts for this theme -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="../css/freelancer.css" rel="stylesheet">
<link href="../css/main.css" rel="stylesheet">
<link href="../css/shop.css" rel="stylesheet">
<link href="../css/form.css" rel="stylesheet">


</head>
<?php
    require("../api/getTitles.php");
    if(empty($_GET["lang"])){
      $lang = "cn";
      if(isset($_SESSION["lang"]))
      {
        $lang = $_SESSION["lang"];
      }
    }
    else{
      $lang = strtolower($_GET["lang"]);
    }
    $_SESSION["lang"] = $lang;
    $titleArray = array();
    if($lang == "cn")
    {
      $titleArray = $titleArrayCN;
    }
    else
    {
      $titleArray = $titleArrayUK;
    }
?>
<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand logo" href="index.php">
      <img src="../img/coolpanda.png" class="logo-img"/>CoolPanda</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
          <?php 
          if(isset($_SESSION["shopEmail"]))
          {
            if($_SESSION["shopName"]=="admin")
            {
          ?>
          <li class="nav-item mx-0 mx-lg-1">
                  <a href="admin.php" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger">admin</a>
          </li>          
          <?php 
            }
          ?>
          <li class="nav-item mx-0 mx-lg-1">
                  <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="">欢迎你,<?php echo $_SESSION["shopName"]; ?></a> 
          </li>
          <li class="nav-item mx-0 mx-lg-1">
                  <a href="login.php" class="btn header-btn">退出</a>
          </li>
          <?php 
          }
          else
          {
          ?>

          <li class="nav-item mx-0 mx-lg-1">
                  <a href="login.php" class="btn header-btn">登录</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
                  <a href="register.php" class="btn header-btn">注册</a>
          </li>
          <?php
                    }
          ?>
        </ul>
      </div>
    </div>
  </nav>