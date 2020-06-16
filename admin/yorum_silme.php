<!DOCTYPE html>
<html lang="en">
<head><?php require_once "header.php";?>
<script type="text/javascript">
function sil(clicked_id)
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

        <!-- buraya yazdımmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->  


<?php 


if(isset($_GET['id'])){
  $id=$_GET['id'];
  
  $query = "DELETE FROM yorum Where yorum_id='$id'";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  
}
   
?>


<div class="row">
    <div class="col-10">
      <table style="width:1000px;align:center;margin-left: auto;margin-right: auto;">
        <tr>
        <td colspan="4" width="100"><h3>Tüm Yorumlar</h3></td>
        </tr>
        <tr>
        <td>Yorum İd'si</td>
        <td>ilan İd</td>
        <td>Kullanıcı Adı</td>
        <td>Yorumu</td>
        <td>Onay Numarası</td>
        <td>Silme Butonu</td>
        </tr>
        <tr>
        <form>
        <?php 
        $a=0;
        $query = "SELECT * FROM yorum ORDER BY yorum_id DESC";
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
            <input type="button"'.$id.' class="btn btn-danger" onclick="sil( '.$id.')" value="Sil">';}  
          else{
            echo'</tr>';
            echo'<td>'.$id.'</td>
            <td>'.$ilan_id.'</td>
            <td>'.$kullanici.'</td>
            <td>'.$yorumlar.'</td>
            <td>'.$onay.'</td>
            <td><input type="button"'.$id.' class="btn btn-danger" onclick="sil( '.$id.')" value="Sil">';}  
           
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
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

</body>

</html>
