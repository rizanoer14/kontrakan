<?php
  include '../database.php';

  if($_POST['open'] == 'tambah'){

    $temp = "upload/";
    if (!file_exists($temp))
      mkdir($temp);

    $id             = $_POST['idKontrakan'];
    $nama           = $_POST['nama'];
    $alamat         = $_POST['alamat'];
    $nohp           = $_POST['nohp'];
    $pemilik        = $_POST['pemilik'];
    $harga          = $_POST['harga'];
    $status         = $_POST['status'];
    $lat            = $_POST['lat'];
    $long           = $_POST['long'];
    $fileupload     = $_FILES['fileupload']['tmp_name'];
    $ImageName      = $_FILES['fileupload']['name'];
    $ImageType      = $_FILES['fileupload']['type'];

    if (!empty($fileupload)){
      $acak           = rand(11111111, 99999999);
      $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
      $ImageExt       = str_replace('.','',$ImageExt); // Extension
      $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
      $NewImageName   = str_replace(' ', '', $acak.'.'.$ImageExt);

      move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp.$NewImageName); // Menyimpan file

      $sql = "INSERT INTO `prm_kontrakan`( `id`, `nm_kontrakan`, `pemilik`, `no_handphone`, `alamat`, `harga`, `gambar`, `status`, `lat`, `long`) 
      VALUES ('$id', '$nama', '$pemilik','$nohp','$alamat','$harga','$NewImageName','$status','$lat','$long')";
      
      if (mysqli_query($conn, $sql)) {
        echo json_encode(array("statusCode"=>200));
      } else {
        echo json_encode(array("statusCode"=>201));
      }
      mysqli_close($conn);
    } else {
      echo "Data Gagal Disimpan";
    }

  } else if ($_POST['open'] == 'edit'){
    $temp = "upload/";
    if (!file_exists($temp))
      mkdir($temp);

    $id             = $_POST['idKontrakan'];
    $nama           = $_POST['nama'];
    $alamat         = $_POST['alamat'];
    $nohp           = $_POST['nohp'];
    $pemilik        = $_POST['pemilik'];
    $harga          = $_POST['harga'];
    $status         = $_POST['status'];
    $lat            = $_POST['lat'];
    $long           = $_POST['long'];
    $fileupload     = $_FILES['fileupload']['tmp_name'];
    $ImageName      = $_FILES['fileupload']['name'];
    $ImageType      = $_FILES['fileupload']['type'];

    if (!empty($fileupload)){
      $acak           = rand(11111111, 99999999);
      $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
      $ImageExt       = str_replace('.','',$ImageExt); // Extension
      $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
      $NewImageName   = str_replace(' ', '', $acak.'.'.$ImageExt);

      move_uploaded_file($_FILES["fileupload"]["tmp_name"], $temp.$NewImageName); // Menyimpan file

      $query  = "UPDATE prm_kontrakan SET ";
      $query .= "nm_kontrakan = '$nama', pemilik = '$pemilik', no_handphone = '$nohp', ";
      $query .= "alamat = '$alamat', harga = '$harga',";
      $query .= "gambar = '$NewImageName', lat = '$lat', longit = '$long', status = '$status' ";
      $query .= "WHERE id = $id ";
      
      if (mysqli_query($conn, $query)) {
        echo json_encode(array("statusCode"=>200));
      } else {
        echo json_encode(array("statusCode"=>201));
      }
      mysqli_close($conn);
    } else {
      echo "Data Gagal Disimpan";
    }
  }

?>