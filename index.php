<!doctype html>
<html lang="tr">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    

    <title>Ana Sayfa</title>
  </head>

  <body style="overflow-x: hidden !important;">

  <?php 
  require_once "header.php";
  require_once "ayarlar_veritabani.php";
  ?>
  

   
  <div class="row" >

    <div class="col-12">  
      <?php
      if(isset($_GET['ilan_turu'])){
        require_once "kategori.php";
      }
      else{
        require_once "ilan.php"; }
      ?>
    </div>


    
<?php   require_once "footer.php";
  ?>



    
  </body>
</html>