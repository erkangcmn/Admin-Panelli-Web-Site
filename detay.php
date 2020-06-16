<!DOCTYPE html>
<html lang="tr">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

	</head>
	<style>
  table{
    border-bottom: 1px solid #ddd;
    width: 100%;
  }
  tr{
    border-bottom: 1px solid #ddd;
    padding:15px;
  }
  td{
    border-bottom: 1px solid #ddd;
    padding:7px;
  }

</style>
	<?php 
require_once "header.php";
require_once "ayarlar_veritabani.php";
$i_id=$_GET['ilan_no'];
    $query = "SELECT * FROM ilan Where ilan_id='$i_id'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH )) {
        $ilan_adi = $row['ilan_adi'];
        $fiyat = $row['fiyat'];
        $ilan_sah = $row['ilan_sahibi'];
        $resimler= $row['resim'];
    }

?>

<body style="overflow-x: hidden !important;" >
<h1 style=" margin-left: 40%;"><?php echo $ilan_adi ?></h1>



<div class="row">
    <div class="col-12">
    		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
                                <?php echo '<img src="',$resimler,'" style="height: 30rem; width: 55rem;">'; ?>
							</div>

							<div class="product-preview">
                            <?php echo '<img src="',$resimler,'" style="height:30rem; width: 55rem;">'; ?>
							</div>

							<div class="product-preview">
                            <?php echo '<img src="',$resimler,'" style="height: 30rem; width: 55rem;">'; ?>
							</div>


						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
                            <?php echo '<img src="',$resimler,'" style="height: 10rem; width: 20rem;">'; ?>
							</div>

							<div class="product-preview">
                            <?php echo '<img src="',$resimler,'" style="height: 10rem; width: 20rem;">'; ?>
							</div>

							<div class="product-preview">
							<?php echo '<img src="',$resimler,'" style="height: 10rem; width: 20rem;">'; ?>
							</div>

						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							
							<div>
								<div class="product-rating">
                                <h2 class="product-name">İlan Sahibi:<?php echo $ilan_sah ?></h2>
								</div>
					
							</div>
							<div>
								<h3 class="product-price"><?php echo $fiyat ?> TL</h3>
							</div>
							<p>Açıklama</p>

						







							<ul class="product-links">
								<li>Paylaş:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
						<?php   
						if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
							require_once "test.php";
							
						}
						else{
							echo "<div></div>";
						}
						?>
					</div>
					<!-- /Product details -->

				

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>



    </div>
</div>

<div class="col-8" style="margin-top:30px;">
      <table style="width:1000px;align:center;margin-left: auto;margin-right: auto;">
        <tr>
        <td colspan="4" width="100" style="text-align: center;"><h3>İlana Yapılan Yorum</h3></td>
        </tr>
        <tr>
        <td>Yorumu Yapan Kişi</td>
        <td>Yorum</td>
        </tr>
        <tr>
		<form>
<?php
$a=0;
$i_id=$_GET['ilan_no'];
	$query = "SELECT * FROM yorum WHERE ilan_id = '$i_id' AND onay_durumu=1 ORDER BY yorum_id DESC"; 
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    while ($row = mysqli_fetch_array($result, MYSQLI_BOTH )) {
        $kisi = $row['kAdi'];
		$yorumlar = $row['yorumlar'];
		if($a<1){
			echo'<td>'.$kisi.'</td>
			<td style="padding:30px;">'.$yorumlar.'</td>';}  
		else{
			echo'</tr>';
			echo'<td>'.$kisi.'</td>
			<td style="padding:30px;">'.$yorumlar.'</td>';}  
	
		$a++; 
	}
	mysqli_close($link);

?>
    	</form>
	</tr>
</table>

</div>
<div style="margin-top:250px; margin-bottom:0px;">
<?php   require_once "footer.php";
  ?></div>

</body>
</html>