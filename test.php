<?php
$ilan_id = $kAdi = $yorumlar= $fiyat = $onay_durumu ="";
$ilan_err = $kAdi_err = $yorumlar_err= $onay_durumu_err="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["yorumlar"]))){
        $yorumlar_err = "Lütfen bir yorum yazınız.";
    } else{
        $yorumlar = trim($_POST["yorumlar"]);
    }
    if(empty($kadi_err) && empty($sifre_err) && empty($sifre_onayla_err)){

        $sql1 = "SELECT * FROM ilanver";
        $i_id=$_GET['ilan_no'];
        $query = "SELECT * FROM ilan Where ilan_id='$i_id'";
           
        $sql = "INSERT INTO yorum (ilan_id, kAdi, yorumlar, onay_durumu) VALUES (?, ?, ?, 0)";
      
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "iss", $param_ilan_id, $param_kAdi, $param_yorumlar);
            
            $param_ilan_id = $i_id;
            $param_kAdi= htmlspecialchars($_SESSION["kullanici"]);
            $param_yorumlar= $yorumlar;
        
            if(mysqli_stmt_execute($stmt)){

               
            } else{
                echo "Bir şeyler yanlış gitti. Lütfen daha sonra tekrar deneyiniz.";
            }
        }

        mysqli_stmt_close($stmt);
    }
}

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript">
    function TextAreaKarakterSayisiDogrula()
    {
        var sonSayi = 255 - document.getElementById("yorumlar").value.length;
        if (sonSayi >= 0)
        {
            document.getElementById("KalanKarakterSayac").innerHTML = sonSayi;
        }
        else
        {
            document.getElementById("yorumlar").value = document.getElementById("yorumlar").value.substring(0, 255);
        }
    }
</script>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'].'?ilan_no='.$i_id.''); ?>" method="post" >

            <div class="form-group <?php echo (!empty($yorumlar_err)) ? 'has-error' : ''; ?>">
               <br><br>
                <input type="textarea" placeholder="yorum yaz" name="yorumlar"onkeyup="TextAreaKarakterSayisiDogrula()" class="form-control" value="<?php echo $yorumlar; ?>">
                <span class="help-block"style="color:red;"><?php echo $yorumlar_err; ?></span>
            </div>  
            <input type="submit" class="btn btn-primary" value="Gönder">
</form>            

</body>
</html>