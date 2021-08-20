
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
            <h1>Data Pelanggan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Data Pelanggan</a></li>
              <li class="breadcrumb-item active">Tambah</li>
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
                <h3 class="card-title">Tambah Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="idPelanggan">Id Pelanggan</label>
                    <input type="email" class="form-control" id="idPelanggan" name="idPelanggan" placeholder="0-9">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="a-z">
                  </div>
                  <div class="form-group">
                    <label for="nohp">No.Handphone</label>
                    <input type="text" class="form-control" id="nohp" name="nohp" placeholder="0-9">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="button" name="Simpan" class="btn btn-primary" value="Simpan" id="Simpan">
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
  $('#Simpan').on('click', function() {
    $("#Simpan").attr("disabled", "disabled");
    var id = $('#idPelanggan').val();
    var nama = $('#nama').val();
    var nohp = $('#nohp').val();
    if(id!="" && nama!="" && nohp!=""){
      $.ajax({
        url: "_form.php",
        type: "POST",
        data: {
          open: 'tambah',
          id: id,
          nama: nama,
          nohp: nohp        
        },
        cache: false,
        success: function(dataResult){
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            alert('Data Berhasil Disimpan');
            document.location = 'index.php';             
          }
          else if(dataResult.statusCode==201){
             alert("Data gagal disimpan !");
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
