<!DOCTYPE html>
<html lang="en">
<head><?php require_once "header.php";?>
<script type="text/javascript">
function onaylama(clicked_id)
{
    window.location.href = "http://localhost/web_projesi/admin/yorum.php?id=" +clicked_id;


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
    padding:15px;
  }
  td{
    border-bottom: 1px solid #ddd;
    text-align: center;
    padding:7px;
  }

</style>

</head>
<body>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>                 
              </span>
              Yorum Kabul
            </h3>

          </div>
        <!-- buraya yazdımmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->
        


<?php 


if(isset($_GET['id'])){
  $id=$_GET['id'];
  $query = "UPDATE yorum SET onay_durumu=1 Where yorum_id='$id'";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  
}
   
?>


<div class="row">
    <div class="col-10">
      <table style="width:1000px;align:center;margin-left: auto;margin-right: auto;">
        <tr>
        <td colspan="4" width="100"><h3>Onay Bekleyen Yorumlar</h3></td>
        </tr>
        <tr>
        <td>Yorum İd'si</td>
        <td>ilan İd</td>
        <td>Kullanıcı Adı</td>
        <td>Yorumu</td>
        <td>Onay Numarası</td>
        <td>Onaylama Butonu</td>
        </tr>
        <tr>
        <form>
        <?php 
        $a=0;
        $query = "SELECT * FROM yorum Where onay_durumu=0 ORDER BY yorum_id DESC";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH )) {
          $id = $row['yorum_id'];
          $ilan_id = $row['ilan_id'];
          $kullanici = $row['kAdi'];
          $yorumlar = $row['yorumlar'];        
          $onay= $row['onay_durumu'];
          if($a<1){
            echo'<td>'.$id.'</td>
            <td>'.$ilan_id.'</td>
            <td>'.$kullanici.'</td>
            <td>'.$yorumlar.'</td>
            <td>'.$onay.'</td>
            <td>
            <input type="button"'.$id.' class="btn btn-info" onclick="onaylama( '.$id.')" value="Onayla">';}  
          else{
            echo'</tr>';
            echo'<td>'.$id.'</td>
            <td>'.$ilan_id.'</td>
            <td>'.$kullanici.'</td>
            <td>'.$yorumlar.'</td>
            <td>'.$onay.'</td>
            <td><input type="button"'.$id.' class="btn btn-info" onclick="onaylama( '.$id.')" value="Onayla">';}  
           
         $a++; 
        }
        ?>
          <input type="hidden" id="gonder" >
        </form>
        </tr>
    </table>
    </div>


        <!-- buraya yazdımmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->
        <!-- partial -->
        <?php require_once "yorum_silme.php" ?>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->


</body>

</html>
