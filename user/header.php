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
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/form.css">


</head>
<?php
    require("getTitles.php");
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
      <img src="img/coolpanda.png" class="logo-img"/></a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php#portfolio"><?php echo $titleArray['food'];?></a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="danish_shop.php"><?php echo $titleArray['shopping'];?></a>
          </li>
          <?php 
          if(isset($_SESSION["email"]))
          {
          ?>
          <li class="nav-item mx-0 mx-lg-1">
                  <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="personal.php"><?php echo $titleArray['welcome'];?><?php echo $_SESSION["name"]; ?></a> 
          </li>
          <li class="nav-item mx-0 mx-lg-1">
                  <a href="login.php" class="btn alt  header-btn"><?php echo $titleArray['logout'];?></a>
          </li>
          <?php 
          }
          else
          {
          ?>

          <li class="nav-item mx-0 mx-lg-1">
                  <a href="login.php" class="btn alt  header-btn"><?php echo $titleArray['login'];?></a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
                  <a href="register.php" class="btn alt  header-btn"><?php echo $titleArray['register'];?></a>
          </li>
          <?php
            }
          ?>

<!--    This is for the language choice. -->
            <li class="nav-item mx-0 mx-lg-1">
              
              <?php
                  if(strtolower($lang) == "cn")
                  {
              ?>
                <button class="nav-link py-3 px-0 px-lg-3 rounded lang-btn" onclick="window.location.href='index.php?lang=uk'" type="button">
                  <img class="language-img" src="img/eng.jpg"></button>
              <?php
                    
                  }
                  else
                  {
              ?>

                <button class="nav-link py-3 px-0 px-lg-3 rounded lang-btn" onclick="window.location.href='index.php?lang=cn'" type="button">
                  <img class="language-img" src="img/china.jpg"></button>
              <?php
                    
                  }
              ?>
              
              
            </li>

        </ul>
      </div>
    </div>
  </nav>