<?php
  include '../database.php';

  if($_POST['open'] == 'tambah'){
    $idPelanggan=$_POST['idPelanggan'];
    $idKontrakan=$_POST['idKontrakan'];
    $harga=$_POST['harga'];
    $tanggal=$_POST['tanggal'];
    //$tanggal_baru = date('Y-m-d', $tanggal);
    $waktu=$_POST['waktu'];
    $biaya=$harga * $waktu;
    $total=$biaya;
    $sql = "INSERT INTO `trx_kontrakan`( `id_kontrakan`, `id_pelanggan`, `harga`, `tanggal`, `waktu`, `total`) 
    VALUES ('$idKontrakan','$idPelanggan','$harga','$tanggal','$waktu','$total')";

    $sqlupdate = "UPDATE prm_kontrakan SET status = 'tidak tersedia' WHERE id = '$idKontrakan' ";
    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sqlupdate)) {
      echo json_encode(array("statusCode"=>200));
    } 
    else {
      echo json_encode(array("statusCode"=>201));
    }
    mysqli_close($conn);
  } 
  // else if($_POST['open'] == 'edit'){
  //   $id = $_POST['id'];
  //   $nama = $_POST['nama'];
  //   $alamat = $_POST['alamat'];
  //   $nohp = $_POST['nohp'];

  //   //buat dan jalankan query UPDATE
  //   $query  = "UPDATE prm_karyawan SET ";
  //   $query .= "nm_karyawan = '$nama', alamat = '$alamat', ";
  //   $query .= "no_handphone ='$nohp' ";
  //   $query .= "WHERE id_karyawan = '$id'";
  //   if (mysqli_query($conn, $query)) {
  //   echo json_encode(array("statusCode"=>200));
  //   } 
  //   else {
  //     echo json_encode(array("statusCode"=>201));
  //   }
  //   mysqli_close($conn);
  //   }

?>