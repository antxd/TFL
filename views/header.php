<?php global $paises, $versiones, $app; $uid = (!empty($_SESSION['tfl_player']))? $_SESSION['tfl_player']['ID'] : 0 ; $db = $app->db(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <title><?php echo $ptitle; ?> - The Fundamental League</title>
  <link rel="shortcut icon" href="<?php echo SITE; ?>img/piu_favicon.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700,700i&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo SITE; ?>assets/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo SITE; ?>assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo SITE; ?>assets/owl.theme.green.min.css">
  <link rel="stylesheet" href="<?php echo SITE; ?>assets/global.css">
  <script src="<?php echo SITE; ?>assets/jquery.min.js"></script>
  <script src="<?php echo SITE; ?>assets/popper.min.js"></script>
  <script src="<?php echo SITE; ?>assets/bootstrap.min.js"></script>
  <script src="<?php echo SITE; ?>assets/owl.carousel.min.js"></script>
  <script type="text/javascript">
    var base_url = '<?php echo SITE; ?>';
  </script>
</head>
<body>
  <?php
    if(!empty($_SESSION['tfl_admin'])){
        include 'nav-admin.php';
    }
    if(!empty($_SESSION['tfl_player'])){
        include 'nav-player.php';
    }
  ?>