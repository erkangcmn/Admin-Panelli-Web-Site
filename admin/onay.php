<!DOCTYPE html>
<html lang="en">
<head><!DOCTYPE html>
<html lang="en">
<?php 
session_start();
if(!isset( $_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:../giris.php");
    exit;
}
else{
   if($_SESSION["yetkim"] == 1 ){
     
   }
   else{
     echo"<script>
     alert('Yetkiniz Yoktur');
     window.location = 'index.php';
     </script>";
  
 
   }
}

require_once "../ayarlar_veritabani.php";?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">İlanver.com</a>

      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>                
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Arama Yap">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="images/faces/face1.jpg" alt="image">
                <span class="availability-status online"></span>             
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black">Erkan Göçmen</p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">

              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../index.php">
                <i class="mdi mdi-equal-box"></i>
                Anasayfa
              </a>
              <a class="dropdown-item" href="../cikis.php">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Çıkış Yap
              </a>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>


        
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="images/faces/face1.jpg" alt="profile">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->              
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">Erkan Göçmen</span>
                <span class="text-secondary text-small">Bilgisayar Programcısı</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span class="menu-title">Genel Bilgi</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="onay.php">
              <span class="menu-title">Üye Kabul</span>
              <i class="mdi mdi-contacts menu-icon"></i>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="yorum.php">
              <span class="menu-title">Yorum Kabul</span>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="ilan_onay.php">
              <span class="menu-title">İlan Kabul</span>
              <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>
          </li>

            
              
            </span>
          </li>
        </ul>
      </nav>
        <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>
</html></head>
<body>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-contacts menu-icon"></i>                 
              </span>
              Üye Kabul
            </h3>

          </div>

        
        <script type="text/javascript">
function onayla(clicked_id)
{
    window.location.href = "http://localhost/web_projesi/admin/onay.php?id=" +clicked_id;


}

</script>
<style>
  table{
    border-bottom: 1px solid #ddd;
    text-align: center;
    width: 100%;
  }
  tr{
    border-bottom: 1px solid #ddd;
    text-align: center;
  }
  td{
    border-bottom: 1px solid #ddd;
    text-align: center;
  }

</style>

<?php 

if(isset($_GET['id'])){
  $id=$_GET['id'];
  $query = "UPDATE ilanver SET onay=1 Where id='$id'";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  
}
   
?>
<div class="row">


    <div class="col-10">
      <table style="width:1000px;align:center;margin-left: auto;margin-right: auto;">
        <tr>
        <td colspan="4" width="100"><h3>Onay Bekleyen Kullanıcı Listesi</h3></td>
        </tr>
        <tr>
        <td>İd'si</td>
        <td>Kullanıcı Adı</td>
        <td>Kayıt Olma Tarihi</td>
        <td>Onay Numarası</td>
        <td>Onaylama Butonu</td>
        </tr>
        <tr>
        <form >
        <?php 
        $a=0;
        $query = "SELECT * FROM ilanver Where onay=0 ORDER BY id DESC";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH )) {
          $id = $row['id'];
          $kullanici = $row['kullanici'];
          $kayit = $row['kayit_olma'];        
          $onay= $row['onay'];
          if($a<1){
            echo'<td>'.$id.'</td>
            <td>'.$kullanici.'</td>
            <td>'.$kayit.'</td>
            <td>'.$onay.'</td>
            <td>
            <input type="button"'.$id.' class="btn btn-info" onclick="onayla( '.$id.')" value="Onayla">';}  
          else{
            echo'</tr>';
            echo'<td>'.$id.'</td>
            <td>'.$kullanici.'</td>
            <td>'.$kayit.'</td>
            <td>'.$onay.'</td>
            <td><input type="button"'.$id.' class="btn btn-info" onclick="onayla( '.$id.')" value="Onayla">';}  
           
         $a++; 
        }
        ?>
          <input type="hidden" id="gonder" >
        </form>
        </tr>
    </table>
    </div>



        <!-- partial -->
        <?php require_once "onay_silme.php" ?>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

</body>

</html>
