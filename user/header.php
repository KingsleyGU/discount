<!DOCTYPE html>
<html lang="en">
 <head>

  <meta charset="utf-8">
   <meta name="keywords" content="Cool Panda,Coolpanda,Coupon,Copenhagen,Discount,Share">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Collect likes to get Coupons">
  <meta property="og:image" content="https://coolpanda.dk/img/coolpanda.png">
  <meta name="author" content="CoolPanda">

  <title>Coolpanda</title>
  <link rel="shortcut icon" href="img/coolpanda.png"/>
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
    require("api/getTitles.php");
    require("api/getAbout.php");
    require("api/common_functions.php");
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
    $aboutArray = array();
    if($lang == "cn")
    {
      $titleArray = $titleArrayCN;
      $aboutArray = $aboutArrayCN;
    }
    else
    {
      $titleArray = $titleArrayUK;
      $aboutArray = $aboutArrayUK;
    }
?>
<?php 
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
?>
<body id="page-top">


    <div class="portfolio-modal modal fade" id="search-modal" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog search-modal-dialog" role="document">
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">
              <i class="fas fa-times"></i>
            </span>
          </button>
          <div class="modal-body text-center search-modal-body">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-8">
                  <div class="input-group md-form form-sm form-2 pl-0 intro-search-block">
                    <input class="form-control my-0 py-1 red-border" id="user-search-input" type="text" placeholder="<?php echo $titleArray['input_user_search'];?>" aria-label="Search">
                    <div class="input-group-append">
                      <span class="input-group-text user-search-btn red lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
                          aria-hidden="true"></i></span>
                    </div>
                  </div>  

                  <div class="input-group md-form form-sm form-2 pl-0 intro-search-block">
                    <input class="form-control my-0 py-1 red-border" id="share-search-input" type="number" placeholder="<?php echo $titleArray['input_share_id'];?>" aria-label="Search">
                    <div class="input-group-append">
                      <span class="input-group-text share-search-btn red lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
                          aria-hidden="true"></i></span>
                    </div>
                  </div>                
                  <!-- Portfolio Modal - Title -->
                  
                  <!-- Icon Divider -->
 
                  <button class="btn btn-primary" href="#" data-dismiss="modal">
                    <i class="fas fa-times fa-fw"></i>
                    <?php echo $titleArray['close_window'];?>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- Navigation -->
  <nav class="navbar navbar-expand text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand logo mr-auto mx-auto" href="index.php" style="display:flex;">
      <img src="img/coolpanda.png" class="logo-img"/></a>
<!--       <form class="form-inline" style="float:right;">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      </form>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button> -->
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
<!--           <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="index.php"><?php echo $titleArray['food'];?></a>
          </li> -->
<!--           <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="danish_shop.php"><?php echo $titleArray['shopping'];?></a>
          </li> -->    
          <li class="nav-item mx-lg-1" >
                  <span  class="btn alt header-btn" data-toggle="modal" data-target="#search-modal" style="display: inline-block;min-width: 60px; text-align: center; cursor:pointer;"><i class="fas fa-search fa-lg" style="line-height: 30px;"></i></span>
          </li>   
          <?php 
          if(isset($_SESSION["email"]))
          {
          ?>
          <li class="nav-item mx-lg-1">
                  <a class="btn alt header-btn sign-btn" href="profile.php?userId=<?php echo $_SESSION['userId'];?>"><?php echo $titleArray['me'];?></a> 
          </li>
          <li class="nav-item mx-lg-1">
                  <a href="login.php" class="btn alt  header-btn"><?php echo $titleArray['logout'];?></a>
          </li>
          <?php 
          }
          else
          {
          ?>
          <li class="nav-item mx-lg-1">
                  <a href="register.php" class="btn alt header-btn sign-btn"><?php echo $titleArray['register'];?></a>
          </li>
          <li class="nav-item mx-lg-1">
                  <a href="login.php" class="btn alt header-btn "><?php echo $titleArray['login'];?></a>
          </li>
          <?php
            }
          ?>

<!--    This is for the language choice. -->
            <li class="nav-item mx-lg-1">
              
              <?php
                  if(strtolower($lang) == "cn")
                  {
              ?>
                <button class="nav-link px-0 px-lg-3 rounded lang-btn" onclick="changeUrl('uk')" type="button">
                  <img class="language-img" src="img/eng.jpg"></button>
              <?php
                    
                  }
                  else
                  {
              ?>

                <button class="nav-link px-0 px-lg-3 rounded lang-btn" onclick="changeUrl('cn')" type="button">
                  <img class="language-img" src="img/china.jpg"></button>
              <?php
                    
                  }
              ?>
              
              
            </li>

        </ul>
      </div>
    </div>
  </nav>

