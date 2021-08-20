<?php
  include '../database.php';

  if($_POST['open'] == 'tambah'){
    $id=$_POST['id'];
    $nama=$_POST['nama'];
    $nohp=$_POST['nohp'];
    $sql = "INSERT INTO `prm_pelanggan`( `id_pelanggan`, `nm_pelanggan`, `no_handphone`) 
    VALUES ('$id','$nama','$nohp')";
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
    $nohp = $_POST['nohp'];

    //buat dan jalankan query UPDATE
    $query  = "UPDATE prm_pelanggan SET ";
    $query .= "nm_pelanggan = '$nama', ";
    $query .= "no_handphone ='$nohp' ";
    $query .= "WHERE id_pelanggan = '$id'";
    if (mysqli_query($conn, $query)) {
    echo json_encode(array("statusCode"=>200));
    } 
    else {
      echo json_encode(array("statusCode"=>201));
    }
    mysqli_close($conn);
    }

?>