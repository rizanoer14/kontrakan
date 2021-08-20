<?php
  include '../database.php';

  if($_POST['open'] == 'tambah'){
    $id=$_POST['id'];
    $nama=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $nohp=$_POST['nohp'];
    $sql = "INSERT INTO `prm_karyawan`( `id_karyawan`, `nm_karyawan`, `alamat`, `no_handphone`) 
    VALUES ('$id','$nama','$alamat','$nohp')";
    if (mysqli_query($conn, $sql)) {
      echo json_encode(array("statusCode"=>200));
    } 
    else {
      echo json_encode(array("statusCode"=>201));
    }
    mysqli_close($conn);
  } else if($_POST['open'] == 'edit'){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];

    //buat dan jalankan query UPDATE
    $query  = "UPDATE prm_karyawan SET ";
    $query .= "nm_karyawan = '$nama', alamat = '$alamat', ";
    $query .= "no_handphone ='$nohp' ";
    $query .= "WHERE id_karyawan = '$id'";
    if (mysqli_query($conn, $query)) {
    echo json_encode(array("statusCode"=>200));
    } 
    else {
      echo json_encode(array("statusCode"=>201));
    }
    mysqli_close($conn);
    }

?>