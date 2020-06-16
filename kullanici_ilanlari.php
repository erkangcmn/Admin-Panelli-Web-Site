<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>İlanVer.com</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

    </head>
<body>
<?php

$query = 'SELECT * FROM ilan WHERE kullanici_id = '.$_SESSION["id"].' AND onay=1'; 

$result = mysqli_query($link, $query) or die(mysqli_error($link));
echo '<table style="margin-left: auto;margin-right: auto;"><tr>
        <div class="products-slick" data-nav="#slick-nav-1">';
$i=0;

while ($row = mysqli_fetch_array($result, MYSQLI_BOTH )) {
  $ilan_adi = $row['ilan_adi'];
  $fiyat = $row['fiyat'];
  $ilan_id = $row['ilan_id'];
  $resim = $row['resim'];
  if($i<=2){
    echo '<td style="padding: 25px;">
            <div class="product">
                <div class="product-img">
                    <img src="',$resim,'" style="height: 20rem; width: 30rem;">
                </div>
                <div class="product-body">
                    <h3 class="product-name"><a href="#">',$ilan_adi,'</a></h3>
                    <h4 class="product-price">',$fiyat,' TL</h4>
                </div>
                <div class="add-to-cart" style="border-bottom-right-radius:20px;border-bottom-left-radius:20px;">
                <a href="detay.php?ilan_no='.$ilan_id.'" ><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Detay</button></a>
                </div>
                </div>
        </td>';

  }
  else{
    echo'</tr>';
    echo '<td style="padding: 25px;">
    <div class="product">
    <div class="product-img">
        <img src="',$resim,'" style="height: 20rem; width: 30rem;">
    </div>
    <div class="product-body">
        <h3 class="product-name"><a href="#">',$ilan_adi,'</a></h3>
        <h4 class="product-price">',$fiyat,' TL</h4>
    </div>
    <div class="add-to-cart" style="border-bottom-right-radius:20px;border-bottom-left-radius:20px;">
    <a href="detay.php?ilan_no='.$ilan_id.'" ><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Detay</button></a>
    </div>
    </div>
    </td>';
    $i=0;
   }
   $i++;
}


echo '</div>

</div></tr></table>';
?>

<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
</body>
</html>