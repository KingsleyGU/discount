<?php
$conn = new mysqli("localhost","root","","coolpang");
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }


$conn->set_charset("utf8");

// $conn = new mysqli("hamasushi.dk.mysql","hamasushi_dk","x6vBrCi5pQWZanu4sovhkzPn","hamasushi_dk");
// if (!$conn)
//   {
//   die('Could not connect: ' . mysql_error());
//   }

// $conn->set_charset("utf8");

?>