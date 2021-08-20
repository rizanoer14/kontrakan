 <?php 
 // koneksi database
 include '../database.php';

  if (isset($_GET['idKontrakan'])) {
   $idKontrakan=$_GET['idKontrakan'];

    $query = "SELECT * FROM trx_kontrakan WHERE id_kontrakan='$idKontrakan' ORDER BY id_transaksi DESC";
    $result = mysqli_query($conn, $query);
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    $data = mysqli_fetch_assoc($result);
    $idTransaksi = $data["id_transaksi"];
    $idPelanggan = $data["id_pelanggan"];

    $query2 = "SELECT * FROM prm_pelanggan WHERE id_pelanggan='$idPelanggan'";
    $result2 = mysqli_query($conn, $query2);
    if(!$result2){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    $data2 = mysqli_fetch_assoc($result2);
    $nmPelanggan = $data2["nm_pelanggan"];

    $query3 = "SELECT * FROM prm_kontrakan WHERE id='$idKontrakan'";
    $result3 = mysqli_query($conn, $query3);
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    $data3 = mysqli_fetch_assoc($result3);
    $nmKontrakan = $data3["nm_kontrakan"];
    $alamat = $data3["alamat"];

    $total = $data["total"];
    $tanggal = $data["tanggal"];
    $waktu = $data["waktu"];

  } else {
    //header("location:index.php");use yii\base\Action
  }
 ?>

<!DOCTYPE html>
<html>
<head>
 <title>KWITANSI PEMBAYARAN</title>
</head>
<body>
   <style type="text/css">
      body {
            font-family: "Times New Roman", Times, serif;
         }
         
      th, td{
         border: 1px solid #3c3c3c;
         padding: 5px 8px;

      }
      table {
            border: 1px solid black;
            margin-left: auto;  
            margin-right: auto;  
        }
      .heading-style-with-line {
         border-bottom: 1px solid #ddd;
         font-weight: normal;
         padding-bottom: 0.5em;
         text-align: center;
      }
   </style>
   <h2 class="heading-style-with-line">KWITANSI PENYEWAAN KONTRAKAN</h2>
 <table>
 <tr>
    <td>
      Telah Diterima:<br><br>
      Dari<br>
      Sebesar<br>
      Untuk<br>
      Alamat<br>
      Tanggal<br>
      Periode<br>
    </td>
    <td>
       <br><br>
      :<br>
      :<br>
      :<br>
      :<br>
      :<br>
      :<br>
    </td>
    <td>
      <br><br>
      <?php echo $nmPelanggan ?><br>
      Rp. <?php echo $total ?>,-<br>
      Pembayaran sewa kontrakan <?php echo $nmKontrakan ?><br>
      <?php echo $alamat ?><br>
      <?php echo $tanggal ?><br>
      <?php echo $waktu ?> bulan <br>
    </td>
 </tr>
</table>
<table class='petugas'>
   <tr>
      <td>
         tes
      </td>
   </tr>
</table>
<script>
    window.print();
 </script>
</body>
</html>