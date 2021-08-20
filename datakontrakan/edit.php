<?php
  // memanggil file koneksi.php untuk membuat koneksi
  include '../database.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data mahasiswa dari database yang mempunyai id=$id
    $query = "SELECT * FROM prm_Kontrakan WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    // mengecek apakah query gagal
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    // mengambil data dari database dan membuat variabel" utk menampung data
    // variabel ini nantinya akan ditampilkan pada form
    $data = mysqli_fetch_assoc($result);
    $id=$data['id'];
    $nama=$data['nm_kontrakan'];
    $alamat=$data['alamat'];
    $nohp=$data['no_handphone'];
    $pemilik=$data['pemilik'];
    $harga=$data['harga'];
    $gambar=$data['gambar'];
    $status=$data['status'];
    $lat=$data['lat'];
    $long=$data['long'];

  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    header("location:index.php");
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include '../web/header.php'?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include '../web/sidebar.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Data karyawan</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <!-- /.card -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="idKontrakan">Id</label>
                    <input type="email" class="form-control" id="idKontrakan" name="idKontrakan" value="<?php echo $id ?>">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                  </div>
                  <div class="form-group">
                    <label for="pemilik">Pemilik</label>
                    <input type="text" class="form-control" id="pemilik" name="pemilik" value="<?php echo $pemilik ?>">
                  </div>
                  <div class="form-group">
                    <label for="nohp">No.Handphone</label>
                    <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo $nohp ?>">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga ?>">
                  </div>
                  <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" value="<?php echo $gambar ?>">
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control" id="status" name="status" value="<?php echo $status ?>">
                  </div>
                  <div class="form-group">
                    <label for="lat">Latitude</label>
                    <input type="text" class="form-control" id="lat" name="lat" value="<?php echo $lat ?>">
                  </div>
                  <div class="form-group">
                    <label for="long">Longitude</label>
                    <input type="text" class="form-control" id="long" name="long" value="<?php echo $long ?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="button" name="edit" class="btn btn-primary" value="Edit" id="edit">
                </div>
              </form>
            </div>
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include '../web/footer.php' ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
$(document).ready(function() {
  $('#edit').on('click', function() {
    $("#edit").attr("disabled", "disabled");
    var id = $('#idKontrakan').val();
    var nama = $('#nama').val();
    var pemilik = $('#pemilik').val();
    var nohp = $('#nohp').val();
    var alamat = $('#alamat').val();
    var harga = $('#harga').val();
    const fileupload = $('#gambar').prop('files')[0];
    var status = $('#status').val();
    var lang = $('#lat').val();
    var long = $('#long').val();

    let formData = new FormData();
      formData.append('open', 'edit');
      formData.append('fileupload', fileupload);
      formData.append('idKontrakan', id);
      formData.append('nama', nama);
      formData.append('pemilik', pemilik);
      formData.append('nohp', nohp);
      formData.append('alamat', alamat);
      formData.append('harga', harga);
      formData.append('status', status);
      formData.append('lat', lat);
      formData.append('long', long);
    
    if(id!="" && nama!="" && alamat!="" && nohp!="" && status!="" && pemilik!="" && harga!=""){
      $.ajax({
        type: 'POST',
        url: "_form.php",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        success: function(dataResult){
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            alert('Data Berhasil Disimpan');
            document.location = 'index.php';             
          }
          else if(dataResult.statusCode==201){
             alert("Data gagal Disimpan !");
             location.reload();
          }
        }
      });
    }
    else{
      alert('Harap isi semua !');
      $("#Simpan").removeAttr("disabled");
    }
  });
});
</script>
</body>
</html>
