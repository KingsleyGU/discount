<?php
function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
function translateTagbyId($tagCategory,$titleArray)
{
    if($tagCategory == 1){
        echo $titleArray['chuan']."<i class='fas fa-pepper-hot text-danger'></i>";
    }
    elseif ($tagCategory == 2) {
        echo $titleArray['cantonese'];
    }
    elseif ($tagCategory == 3) {
        echo $titleArray['xiang']."<i class='fas fa-pepper-hot text-danger'></i>";
    }   
    elseif ($tagCategory == 4) {
        echo $titleArray['northeast'];
    }   
    elseif ($tagCategory == 5) {
        echo $titleArray['sushi'];
    }    
    elseif ($tagCategory == 6) {
        echo $titleArray['fashion'];
    }  
    elseif ($tagCategory == 7) {
        echo $titleArray['design'];
    }   
    elseif ($tagCategory == 8) {
        echo $titleArray['chinese_buffet'];
    }      
}
function correctImageOrientation($filename) {
  if (function_exists('exif_read_data')) {
    $exif = exif_read_data($filename);
    if($exif && isset($exif['Orientation'])) {
      $orientation = $exif['Orientation'];
      if($orientation != 1){
        $img = imagecreatefromjpeg($filename);
        $deg = 0;
        switch ($orientation) {
          case 3:
            $deg = 180;
            break;
          case 6:
            $deg = 270;
            break;
          case 8:
            $deg = 90;
            break;
        }
        if ($deg) {
          $img = imagerotate($img, $deg, 0);        
        }
        // then rewrite the rotated image back to the disk as $filename 
        imagejpeg($img, $filename, 95);
      } // if there is some rotation necessary
    } // if have the exif orientation info
  } // if function exists      
}
function isCurrentUser($userId)
{
    return (!empty($_SESSION['userId']))&&$_SESSION['userId']==$userId;
}
function isExpired($generatedDate){
    $date = new DateTime(date("Y-m-d",strtotime('-30 days')));
    if(date_create($generatedDate)<$date){
        return true;
    }
    else{
        return false;
    }
}
?>