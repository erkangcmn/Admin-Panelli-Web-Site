<?php

session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: index.php");
  exit;
}
 
require_once "ayarlar_veritabani.php";
 
$kadi = $sifre = "";
$kadi_err = $sifre_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["kullanici"]))){
        $kadi_err = "Kullanıcı Adını Giriniz.";
    } else{
        $kadi = trim($_POST["kullanici"]);
    }
    
    if(empty(trim($_POST["sifre"]))){
        $sifre_err = "Lütfen Şifrenizi Girin.";
    } else{
        $sifre = trim($_POST["sifre"]);
    }
    
    if(empty($kadi_err) && empty($sifre_err)){

        $sql = "SELECT id, kullanici, sifre, yetkim, onay FROM ilanver WHERE kullanici = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = $kadi;
            

            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $kadi, $hashed_password,$yetkim,$onay);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($sifre, $hashed_password)){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["kullanici"] = $kadi;  
                            $_SESSION["yetkim"] = $yetkim;
                            $_SESSION["onay"]=$onay;
                            if($onay==1 || $onay==2){
                                header("location: index.php");
                            }else{
                                require_once "cikis.php";
                                
                            }                          

                        } else{

                            $sifre_err = "Girdiğiniz şifre yanlış.";
                        }
                    }
                } else{

                    $kadi_err = "Böyle bir hesap bulunamadı.";
                }
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
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        .arkaplan{
                width: 350px;
                height: 330px;
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
        <h2>İlanver.com</h2>
        <p>Giriş yapmak için lütfen bilgilerinizi giriniz.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <input type="text" name="kullanici" class="form-control" placeholder="Email:" value="<?php echo $kadi; ?>">
                <span class="help-block" style="color:red;"><?php echo $kadi_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($sifre_err)) ? 'has-error' : ''; ?>">
                <input type="password" name="sifre" placeholder="Şifre:" class="form-control">
                <span class="help-block "style="color:red;"><?php echo $sifre_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" style="width:309px;" class="btn btn-primary" value="Giriş">
            </div>
            <p>Hesabınız yok mu?<b><a href="kayitol.php" style="color:DarkBlue;">Yeni Bir Hesap Oluştur</a></b></p>
            </form>
        </div>
    </div> 
</div>
</body>
</html>