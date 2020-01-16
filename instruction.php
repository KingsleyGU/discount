<?php
session_start();
    if(!empty($_SESSION["lang"])){

        $lang=$_SESSION["lang"];
      }
    
    else{
      $lang = "cn";
    }
    if($lang == "cn")
    {
    	$file = "img/coolpanda_cn.pdf";
    }
    else
    {
    	$file = "img/coolpanda_uk.pdf";
    }

$name = "coolpanda_uk.pdf";
header("Cache-control: private");
header("Content-Type: application/pdf");
header("Content-Length: ".filesize($file));
header("Content-Disposition: inline; filename=$name");
$fp = fopen($file, 'r');
fpassthru($fp);
fclose($fp);

?>