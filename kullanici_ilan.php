<!doctype html>
<html lang="tr">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

  

    <title>Ana Sayfa</title>
  </head>
  <?php 
  require_once "header.php";
  if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
      header("location: giris.php");
      exit;
  } 

  require_once "ayarlar_veritabani.php";
  ?>
  <body>
  
    
  <div class="row">
 
    <div class="col-12">
      <?php   require_once "kullanici_ilanlari.php"; ?>
    </div>
    <?php   require_once "footer.php";
  ?>
  </body>
</html>