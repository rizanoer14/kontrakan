<?php
// buka koneksi dengan MySQL
  include("../database.php");

  //mengecek apakah di url ada GET id
  if (isset($_GET["id"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $id = $_GET["id"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM prm_kontrakan WHERE id='$id' ";
    $hasil_query = mysqli_query($conn, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($conn).
           " - ".mysqli_error($conn));
    }
  }
  // melakukan redirect ke halaman index.php
  header("location:index.php");
?>