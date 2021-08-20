<?php
  // memanggil file koneksi.php untuk membuat koneksi
  include '../database.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data mahasiswa dari database yang mempunyai id=$id
    $query = "SELECT * FROM prm_kontrakan WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    // mengecek apakah query gagal
    if(!$result){
      die ("Query Error: ".mysqli_errno($conn).
         " - ".mysqli_error($conn));
    }
    // mengambil data dari database dan membuat variabel" utk menampung data
    // variabel ini nantinya akan ditampilkan pada form
    $data = mysqli_fetch_assoc($result);
    $id = $data["id"];
    $nama = $data["nm_kontrakan"];
    $pemilik = $data["pemilik"];
    $nohp = $data["no_handphone"];
    $harga = $data["harga"];

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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
          <tr class="col-md-12">
          <td class="col-md-6">
          <div class="col-md-6">
            <!-- general form elements -->
            <!-- /.card -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pelanggan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="idPelanggan">Id Pelanggan</label>
                    <table>
                      <tr>
                        <td>
                        <input type="email" class="inline form-control" id="idPelanggan" name="idPelanggan" placeholder="0-9"></td>
                        <td>
                          <button type="button" class="btn btn-primary" id="pilih" name="pilih" onclick="pelanggan()">Pilih</button>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div id="Datatable" name="Datatable" style="display: none;">
                    <form>
                      <div class="card">
                        <div class="card-header ">
                          <h3 class="card-title">Data Pelanggan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Id Pelanggan</th>
                              <th>Nama</th>
                              <th>No.Handphone</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                                include '../database.php';
                                // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
                                $query = "SELECT * FROM prm_pelanggan ORDER BY nm_pelanggan ASC";
                                $result = mysqli_query($conn, $query);
                                //mengecek apakah ada error ketika menjalankan query
                                if(!$result){
                                  die ("Query Error: ".mysqli_errno($conn).
                                     " - ".mysqli_error($conn));
                                }

                                //buat perulangan untuk element tabel dari data mahasiswa
                                $no = 1; //variabel untuk membuat nomor urut
                                // hasil query akan disimpan dalam variabel $data dalam bentuk array
                                // kemudian dicetak dengan perulangan while
                                while($data = mysqli_fetch_assoc($result))
                                {
                                  // mencetak / menampilkan data
                                 echo "<tr>";
                                    echo "<td>$data[id_pelanggan]</td>"; //menampilkan data id
                                    echo "<td>$data[nm_pelanggan]</td>"; //menampilkan data nama
                                    echo "<td>$data[no_handphone]</td>"; //menampilkan data nohp
                                    echo "</tr>";
                                  $no++; // menambah nilai nomor urut
                                }
                              ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                    </form>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="namaPelanggan" name="namaPelanggan" placeholder="a-z">
                  </div>
                  <div class="form-group">
                    <label for="nohp">No.Handphone</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" class="form-control" id="nohpPelanggan" name="nohpPelanggan">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <input type="button" name="Simpan" class="btn btn-primary" value="Simpan" id="Simpan">
          </div>
          </td>
          <td class="col-md-6">
          <div class="col-md-6">
            <!-- general form elements -->
            <!-- /.card -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kontrakan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="idKaryawan">Id Kontrakan</label>
                    <input type="text" class="form-control" id="idKontrakan" name="idKontrakan" value="<?php echo $id?>">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Kontrakan</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                  </div>
                  <div class="form-group">
                    <label for="pemilik">Pemilik</label>
                    <input type="text" class="form-control" id="pemilik" name="pemilik" value="<?php echo $pemilik?>">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga?>">
                  </div>
                  <div class="form-group">
                    <label for="nohp">No.Handphone</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                      </div>
                      <input type="text" class="form-control" id="nohp" name="nohp" value="<?php echo $nohp?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                  </div>
                  <div class="form-group">
                    <label for="waktu">Waktu</label>
                    <input type="text" class="form-control" id="waktu" name="waktu" placeholder="berapa bulan">
                  </div>
                </div>
                </div>
              </form>

            </div>
          </div>
          </td>
          </tr>
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
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<script>
$(document).ready(function() {
  $('#Simpan').on('click', function() {
    $("#Simpan").attr("disabled", "disabled");
    var idPelanggan = $('#idPelanggan').val();
    var idKontrakan = $('#idKontrakan').val();
    var harga = $('#harga').val();
    var tanggal = $('#tanggal').val();
    var waktu = $('#waktu').val();
    if(idPelanggan!="" && idKontrakan!="" && harga!="" && tanggal!="" && waktu!=""){
      $.ajax({
        url: "_form.php",
        type: "POST",
        data: {
          open: 'tambah',
          idPelanggan: idPelanggan,
          idKontrakan: idKontrakan,
          harga: harga,
          tanggal: tanggal,
          waktu: waktu        
        },
        cache: false,
        success: function(dataResult){
          var dataResult = JSON.parse(dataResult);
          if(dataResult.statusCode==200){
            alert('Data Berhasil Disimpan');
            $.ajax({
              url: "print.php",
              type: "POST",
              data: {
                idKontrakan: idKontrakan
              },
              cache: false,
              success: function(pars){

              }
            })
            //window.print('print,php');
            var popupWin = window.open('print.php?idKontrakan='+idKontrakan);
					  popupWin.focus();
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(document).ready(function(){
    var table = $('#example1').DataTable();
    $('#example1 tbody').on( 'click', 'tr', function () {
        var t = table.row(this).data();
        $('#idPelanggan').val(t[0]);
        $('#namaPelanggan').val(t[1]);
        $('#nohpPelanggan').val(t[2]);
        var x = document.getElementById("Datatable");
        x.style.display = 'none';
    } );
  });

  function pelanggan(){
    var x = document.getElementById("Datatable");
    x.style.display = 'block';
  }
</script>
</body>
</html>
