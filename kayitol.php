<?php
require_once "ayarlar_veritabani.php";
 
$kadi = $sifre = $sifre_onayla = "";
$kadi_err = $sifre_err = $sifre_onayla_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["kullanici"]))){
        $kadi_err = "Kullanıcı Adını giriniz.";
    } else{
        $sql = "SELECT id FROM ilanver WHERE kullanici= ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
           
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["kullanici"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $kadi_err = "Bu kullanıcı adı zaten alınmış.";
                } else{
                    $kadi = trim($_POST["kullanici"]);
                }
            } else{
                echo "Bir şeyler yanlış gitti. Lütfen daha sonra tekrar deneyiniz.";
            }
        }
         
        mysqli_stmt_close($stmt);
    }
    
    if(empty(trim($_POST["sifre"]))){
        $sifre_err = "Lütfen şifreyi giriniz.";     
    } elseif(strlen(trim($_POST["sifre"])) < 6){
        $sifre_err = "Minimum 6 karekter giriniz.";
    } else{
        $sifre = trim($_POST["sifre"]);
    }
    
    if(empty(trim($_POST["dogrulama"]))){
        $sifre_onayla_err = "Lütfen şifreyi doğrulayın.";     
    } else{
        $sifre_onayla = trim($_POST["dogrulama"]);
        if(empty($sifre_err) && ($sifre != $sifre_onayla)){
            $sifre_onayla_err = "Şifreler Eşleşmedi.";
        }
    }
    
    if(empty($kadi_err) && empty($sifre_err) && empty($sifre_onayla_err)){
        
        $sql = "INSERT INTO ilanver (kullanici, sifre, yetkim, onay) VALUES (?, ?, 3, 0)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            $param_username = $kadi;
            $param_password = password_hash($sifre, PASSWORD_DEFAULT);
            
            if(mysqli_stmt_execute($stmt)){

                header("location: giris.php");
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
<script>
    function mesaj() {
    alert("Kayıt olma isteğiniz yöneticiye ulaşmıştır, yönetici kayıt olma işleminizi onayladıktan sonra hesabınıza giriş yapabilirsiniz.");
    }
</script>
    <meta charset="UTF-8">
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        .arkaplan{
                width: 350px;
                height: 440px;
                border-radius: 10px;
                background-color: transparent;
                background-image: radial-gradient(circle at 20% 50%, rgba(181, 181, 181, 0.7) 0%, rgba(181, 181, 181, 0.3) 100%);
                position: relative;margin: auto;
            }
    </style>
</head>
<body style="height:1000px;  overflow-y: hidden !important; overflow-x: hidden !important;padding: 20px;background: linear-gradient(to bottom,#003366 0%, #006666 100%);background-repeat: no-repeat; position: relative; margin: auto;padding-top:150px;">
<div class="arkaplan">
    <div class="wrapper">
        <h2>Üye Olma Formu </h2>
        <p>Lütfen bir hesap oluşturmak için bu formu doldurun.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($kadi_err)) ? 'has-error' : ''; ?>">
                <label>E-Mail</label>
                <input type="text" name="kullanici" class="form-control" placeholder="<?php echo $kadi_err; ?>" value="<?php echo $kadi; ?>">
            </div>    


            <div class="form-group <?php echo (!empty($sifre_err)) ? 'has-error' : ''; ?>">
                <label>Şifre</label>
                <input type="password" name="sifre" class="form-control"placeholder="<?php echo $sifre_err; ?>" value="<?php echo $sifre; ?>"> 
            </div>
            <div class="form-group <?php echo (!empty($sifre_onayla_err)) ? 'has-error' : ''; ?>">
                <label>Şifreyi Onaylayın</label>
                <input type="password" name="dogrulama" class="form-control" placeholder="<?php echo $sifre_onayla_err; ?>" value="<?php echo $sifre_onayla; ?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" onclick="mesaj()" value="Onayla">
                <input type="reset" class="btn btn-default" value="Sıfırla">
            </div>
            <p>Zaten hesabınız var mı?<a href="giris.php" style="color:DarkBlue;">Giriş Yap</a>.</p>
            <p>Ana Sayfaya dönmek için <a href="index.php" style="color:DarkBlue;">buraya</a> tıklayınız.</p>
        </form>
    </div> 
</div>    
</body>
</html>