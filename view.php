<?php

  include_once("functions.php");

  if (isset($_GET['i'])) 
  {
    $i = $_GET['i'];
    $file = base64_decode($i);
    $imd5 = md5($i);
    $path = $file;

    if (!file_exists($path)) 
      die404();
  } 
  else 
  {
    die404();
  }
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <title>360&deg; - #<?= $imd5 ?> - Panorámy! - [tekk]</title>
    <script type="text/javascript" src="js/lp.js"></script>
    <script type="text/javascript" src="js/raf.js"></script>
    <script type="text/javascript" src="js/pano.js"></script>
    <link rel="stylesheet" href="css/pano.css"/>
    <link rel="stylesheet" href="css/tekk.css">
</head>
<body>
<div id="panorama"></div>
<script>
pannellum.viewer('panorama', {
    "type": "equirectangular",
    "panorama": "<?= $path ?>",
    "pitch": -23.0,
    "yaw": 0,
    "hfov": 110,
    "autoLoad": true
});
</script>
</body>
</html>