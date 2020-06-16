<!DOCTYPE html>
<html lang="en">
<head><?php require_once "header.php";?></head>
<body>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>                 
              </span>
              Genel Bilgi
            </h3>

          </div>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                  <h4 class="font-weight-normal mb-3">Toplam Üye Sayısı
                    <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">          
                    <?php     
                      $query = "SELECT COUNT(*) c FROM ilanver WHERE onay = 1";
                      $result = mysqli_query($link, $query) or die(mysqli_error($link));
                      $row = mysqli_fetch_array($result, MYSQLI_BOTH );
                      echo $row['c'];
                  ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                  
                  <h4 class="font-weight-normal mb-3">Toplam İlan Sayısı
                    <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php     
                      $query = "SELECT COUNT(*) c FROM ilan WHERE onay = 1";
                      $result = mysqli_query($link, $query) or die(mysqli_error($link));
                      $row = mysqli_fetch_array($result, MYSQLI_BOTH );
                      echo $row['c'];
                  ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                                    
                  <h4 class="font-weight-normal mb-3">Toplam Yorum Sayısı
                    <i class="mdi mdi-diamond mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php     
                      $query = "SELECT COUNT(*) c FROM yorum WHERE onay_durumu = 1";
                      $result = mysqli_query($link, $query) or die(mysqli_error($link));
                      $row = mysqli_fetch_array($result, MYSQLI_BOTH );
                      echo $row['c'];
                  ?></h2>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                  <h4 class="font-weight-normal mb-3">Onay Bekleyen Üye Sayısı
                    <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">          
                    <?php     
                      $query = "SELECT COUNT(*) c FROM ilanver WHERE onay = 0";
                      $result = mysqli_query($link, $query) or die(mysqli_error($link));
                      $row = mysqli_fetch_array($result, MYSQLI_BOTH );
                      echo $row['c'];
                  ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                  
                  <h4 class="font-weight-normal mb-3">Onay Bekleyen İlan Sayısı
                    <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php     
                      $query = "SELECT COUNT(*) c FROM ilan WHERE onay = 0";
                      $result = mysqli_query($link, $query) or die(mysqli_error($link));
                      $row = mysqli_fetch_array($result, MYSQLI_BOTH );
                      echo $row['c'];
                  ?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                                    
                  <h4 class="font-weight-normal mb-3">Onay Bekleyen Yorum Sayısı
                    <i class="mdi mdi-diamond mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?php     
                      $query = "SELECT COUNT(*) c FROM yorum WHERE onay_durumu = 0";
                      $result = mysqli_query($link, $query) or die(mysqli_error($link));
                      $row = mysqli_fetch_array($result, MYSQLI_BOTH );
                      echo $row['c'];
                  ?></h2>
                </div>
              </div>
            </div>
          </div>

  


        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


</body>

</html>
