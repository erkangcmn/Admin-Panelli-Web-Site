<!DOCTYPE html>
<html lang="en">
<head><?php require_once "header.php";?></head>
<body>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="page-header">
            <h3 class="page-title">
              <span class="mdi mdi-chart-bar menu-icon">               
              </span>
              İlan Kabul
            </h3>

          </div>
        <!-- buraya yazdımmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->
        
        <script type="text/javascript">
function onaylama(clicked_id)
{
    window.location.href = "http://localhost/web_projesi/admin/ilan_onay.php?id=" +clicked_id;


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
<?php 


if(isset($_GET['id'])){
  $id=$_GET['id'];
  $query = "UPDATE ilan SET onay=1 Where ilan_id='$id'";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  
}
   
?>


<div class="row">
    <div class="col-10">
      <table style="width:1000px;align:center;margin-left: auto;margin-right: auto;">
        <tr>
        <td colspan="4" width="100"><h3>Onay Bekleyen İlanlar</h3></td>
        </tr>
        <tr>
        <td>İlan İd'si</td>
        <td>İlan Sahibi</td>
        <td>İlan Adı</td>
        <td>Kullanıcı İd</td>
        <td>Onay Numarsı</td>
        <td>Onaylama Butonu</td>
        </tr>
        <tr>
        <form>
        <?php 
        $a=0;
        $query = "SELECT * FROM ilan Where onay=0 ORDER BY ilan_id DESC";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        while ($row = mysqli_fetch_array($result, MYSQLI_BOTH )) {
          $id = $row['ilan_id'];
          $ilan_sah = $row['ilan_sahibi'];
          $ilan_adi = $row['ilan_adi'];
          $kullanici = $row['kullanici_id'];        
          $onay= $row['onay'];
          if($a<1){
            echo'<td>'.$id.'</td>
            <td>'.$ilan_sah.'</td>
            <td>'.$ilan_adi.'</td>
            <td>'.$kullanici.'</td>
            <td>'.$onay.'</td>
            <td>
            <input type="button" class="btn btn-info" onclick="onaylama( '.$id.')" value="Onayla">';}  
          else{
            echo'</tr>';
            echo'<td>'.$id.'</td>
            <td>'.$ilan_sah.'</td>
            <td>'.$ilan_adi.'</td>
            <td>'.$kullanici.'</td>
            <td>'.$onay.'</td>
            <td><input type="button" class="btn btn-info" onclick="onaylama( '.$id.')" value="Onayla">';}  
           
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
        <?php require_once "ilan_silme.php" ?>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

</body>

</html>
