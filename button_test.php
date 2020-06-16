<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style type="text/css">
        .a{
          background:black;
          width:100%;
          }
    </style>
</head>

<body>

<?php
$sql1 = "SELECT id FROM ilanver";
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  echo '<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    '.htmlspecialchars($_SESSION["kullanici"]).'
  </button>
  <div class="dropdown-menu" style="background:black;">
    <li class="a"><a class="dropdown-item" href="ilanver.php" style="font-size:14px;">İlanver</a></li>
    <li class="a"><a class="dropdown-item" href="kullanici_ilan.php" style="font-size:14px;">İlanlarım</a></li>
    <li class="a"><a class="dropdown-item" href="admin/index.php" style="font-size:14px;">Yönetici Paneli</a></li>
    <div class="dropdown-divider"></div>
    <li class="a"><a class="dropdown-item" href="cikis.php" style="font-size:14px;">Çıkış Yap</a></li>
  </div>
</div>';
}
else{
  echo'<ul class="header-links pull-right">
        <li><a href="giris.php"><i class="fa fa-user-o"></i> Giriş Yap</a></li>
        <li><a href="kayitol.php"><i class="fa fa-group"></i>Üye Ol</a></li>
      </ul>';
  }

?>
    
</body>
</html>