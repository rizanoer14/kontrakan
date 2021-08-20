<?php
	include '../database.php';
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

?>