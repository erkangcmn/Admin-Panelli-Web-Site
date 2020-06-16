<!DOCTYPE html>
<html lang="en">
<head></head>
<body>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

        <!-- buraya yazdımmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm -->
        
        <script type="text/javascript">
function sil(clicked_id)
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
  $query = "DELETE FROM ilanver Where id='$id'";
  $result = mysqli_query($link, $query) or die(mysqli_error($link));
  
}
   
?>
<div class="row">


    <div class="col-10">
      <table style="width:1000px;align:center;margin-left: auto;margin-right: auto;">
        <tr>
        <td colspan="4" width="100"><h3>Tüm Üyeler</h3></td>
        </tr>
        <tr>
        <td>İd'si</td>
        <td>Kullanıcı Adı</td>
        <td>Kayıt Olma Tarihi</td>
        <td>Onay Numarası</td>
        <td>Silme Butonu</td>
        </tr>
        <tr>
        <form >
        <?php 
        $a=0;
        $query = "SELECT * FROM ilanver Where onay=1 or onay=0 ORDER BY id DESC";
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
            <input type="button"'.$id.' class="btn btn-danger" onclick="sil( '.$id.')" value="Sil">';}  
          else{
            echo'</tr>';
            echo'<td>'.$id.'</td>
            <td>'.$kullanici.'</td>
            <td>'.$kayit.'</td>
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

</body>

</html>
