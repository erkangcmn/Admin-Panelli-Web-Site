
<?php
require_once "header.php";
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: giris.php");
    exit;
}
require_once "ayarlar_veritabani.php";
$ilan_adi = $ilan_sahibi = $ilan_adi= $fiyat = $ilan_turu =$id="";
$ilan_adi_err = $ilan_sahibi_err = $ilan_adi_err= $fiyat_err = $ilan_turu_err=$id_err="";

 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    function yukle($dosya, $boyutLimit = 1, $dosya_uzantilari = null) 
{ 
    $sonuc = []; 
    if ($dosya['error'] == 4){ 
        $sonuc['hata'] = 'Lütfen dosyanızı seçin.'; 
    } else { 
         
        if (is_uploaded_file($dosya['tmp_name'])){ 
     
            $uzanti = explode('.', $dosya['name']); 
            $uzanti = $uzanti[1]; 
     
            $gecerli_dosya_uzantilari = $dosya_uzantilari ? $dosya_uzantilari : [ 
                'image/jpeg', 
                'image/png', 
            ]; 
     
            $gecerli_dosya_boyutu = (1024 * 1014) * $boyutLimit; 
     
            $dosya_uzantisi = $dosya['type']; 
     
            if (in_array($dosya_uzantisi, $gecerli_dosya_uzantilari)){ 
     
                if ($gecerli_dosya_boyutu >= $dosya['size']){ 
     
                    $ad = uniqid(); 
                     
                    $yukle = move_uploaded_file($dosya['tmp_name'], 'deneme/' . $ad . '.' . $uzanti);  
     
                   if ($yukle){ 
                       $sonuc['resim'] = 'deneme/' . $ad . '.' . $uzanti; 
                   } else { 
                    $sonuc['hata'] = 'Bir sorun oluştu ve dosyanız yüklenemedi.'; 
                   } 
     
                } else { 
                    $sonuc['hata'] = 'Yükleyeceğiniz dosya en fazla 3MB olabilir.'; 
                } 
     
            } else { 
                $sonuc['hata'] = 'Yüklediğiniz dosya geçerli bir formatta değil.'; 
            } 
     
        } else { 
            $sonuc['hata'] = 'Dosya yüklenirken bir sorun oluştu.'; 
        } 
    } 
    return $sonuc; 
} 
$sonuc = yukle($_FILES['resim']);

    
    if(empty(trim($_POST["ilan_adi"]))){
        $ilan_adi_err = "Lütfen bir ilan adı giriniz.";     
    }else{
        $ilan_adi = trim($_POST["ilan_adi"]);

    } 
    if(empty(trim($_POST["fiyat"]))){
        $fiyat_err = "Lütfen bir fiyat giriniz.";     
    } else{
        $fiyat = trim($_POST["fiyat"]);
        
    } 

    if(empty(trim($_POST["ilan_turu"]))){
        $ilan_turu_err = "Lütfen ilan türünü şeçiniz.";     
    } else{
        $ilan_turu = trim($_POST["ilan_turu"]);
        
    } 
    if(empty($kadi_err) && empty($sifre_err) && empty($sifre_onayla_err)){

        $sql1 = "SELECT id FROM ilanver";
        
        $sql = "INSERT INTO ilan (ilan_sahibi, ilan_adi, fiyat, ilan_turu, resim, kullanici_id, onay) VALUES (?, ?, ?, ?, ?, ?,0)";
      
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssissi", $param_ilan_sahibi, $param_ilan_adi, $param_fiyat,$param_ilan_turu,$param_resim,$param_id);
            
            $param_ilan_sahibi = htmlspecialchars($_SESSION["kullanici"]);
            $param_ilan_adi= $ilan_adi;
            $param_fiyat= $fiyat;
            $param_ilan_turu= $ilan_turu;
            $param_resim= $sonuc['resim'];
            $param_id= htmlspecialchars($_SESSION["id"]);
            
            if(mysqli_stmt_execute($stmt)){


            } else{
                echo "Bir şeyler yanlış gitti. Lütfen daha sonra tekrar deneyiniz.";
            }
        }

        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}

 ?>
 
<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script>
        function mesaj() {
        alert("İlan yükleme isteğiniz yöneticiye gitmiştir. İlanınız Onaylandıktan sonra sitede yayınlanacaktır.");
        }
    </script>
    
    <title>İlan Ver</title>

    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        .arkaplan{
                width: 350px;
                height: 300px;
                border-radius: 10px;
                position: relative;
                margin: auto;
            }

    </style>
</head>
<body style="height:1000px;   overflow-x: position: relative; margin: auto;">
<div class="arkaplan">
    <div class="wrapper">
        <h2>İlan Ver</h2>
        <p>Lütfen ilan oluşturmak için bu formu doldurun.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group <?php echo (!empty($ilan_adi_err)) ? 'has-error' : ''; ?>">
                <label>İlan adı</label>
                <input type="text" name="ilan_adi" class="form-control" value="<?php echo $ilan_adi; ?>">
                <span class="help-block"style="color:red;"><?php echo $ilan_adi_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($fiyat_err)) ? 'has-error' : ''; ?>">
                <label>Fiyatı</label>
                <input type="text" name="fiyat" class="form-control" value="<?php echo $fiyat; ?>">
                <span class="help-block"style="color:red;"><?php echo $fiyat_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($ilan_turu_err)) ? 'has-error' : ''; ?>">
                <input type="radio" name="ilan_turu" value="Araba"> Araba <br> 
                <input type="radio" name="ilan_turu" value="Konut"> Konut <br>
                <input type="radio" name="ilan_turu" value="elektr"> Elektronik Eşya <br>
                <input type="radio" name="ilan_turu" value="diger"> Diğer ilanlar
                <span class="help-block"style="color:red;"><?php echo $ilan_turu_err; ?></span>
            </div>
                Resim Yükle: <br>
                <input type="file" name="resim" ><br>
                <button type="submit" onclick="mesaj()" class="btn btn-primary">Yükle</button>
                <input type="reset" class="btn btn-default" value="Sıfırla">
            </div>
        </form>
    </div>  
  </div>      
   
</body>
</html>