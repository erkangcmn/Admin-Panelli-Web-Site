<?php

session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:giris.php");
    exit;
}
 
require_once "ayarlar_veritabani.php";
 
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["yeni_sifre"]))){
        $new_password_err = "Yeni Şifrenizi Lüften Giriniz";     
    } elseif(strlen(trim($_POST["yeni_sifre"])) < 6){
        $new_password_err = "Şifre Minimum 6 Karekter Olacak";
    } else{
        $new_password = trim($_POST["yeni_sifre"]);
    }
    

    if(empty(trim($_POST["dogrulama"]))){
        $confirm_password_err = "Lütfen şifreyi doğrulayın.";
    } else{
        $confirm_password = trim($_POST["dogrulama"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Şifreler Eşleşmiyor.";
        }
    }
        

    if(empty($new_password_err) && empty($confirm_password_err)){

        $sql = "UPDATE ilanver SET sifre = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            if(mysqli_stmt_execute($stmt)){
                session_destroy();
                header("location: giris.php");
                exit();
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
    <title>Şifreyi Sıfırla</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Şifreyi Sıfırla</h2>
        <p>Lütfen şifrenizi sıfırlamak için bu formu doldurun.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>Yeni Şifre</label>
                <input type="password" name="yeni_sifre" class="form-control" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Şifreyi Onayla</label>
                <input type="password" name="dogrulama" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Onayla">
                <a class="btn btn-link" href="hoşgeldiniz.php">İptal ET</a>
            </div>
        </form>
    </div>    
</body>
</html>