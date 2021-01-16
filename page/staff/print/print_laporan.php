<?php 

session_start();
include "../../../koneksi.php";
if (!isset($_SESSION['id_user'])) {
  header("Location:login.php");
}
date_default_timezone_set('Asia/Jakarta');

$sql = mysqli_query($koneksi, "SELECT * FROM tb_laporan X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE id_laporan = '".$_GET['idlap']."'");
$data = mysqli_fetch_array($sql);

$sqldok = mysqli_query($koneksi, "SELECT *, TIMESTAMPDIFF(YEAR,tanggal_lahir,NOW()) AS umur FROM tb_dokter X 
INNER JOIN tb_specialis Y ON y.id_specialis = x.id_specialis
INNER JOIN tb_user z ON z.id_user = x.id_user WHERE id_dokter = '".$data['id_dokter']."'");
$dokter = mysqli_fetch_array($sqldok);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Klinik</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../../plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="../../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<!-- Isi Body-->

 <section class="">
   <div class="card card-body">
     <h5 class="text-center">POLIKLINIK</h5>
     <h5 class="text-center">Specialis <?= $dokter['specialis']; ?></h5><br><hr><br>
     <div class="row">
      <div class="col-sm-12"><h5>Data Pasien</h5><br></div>
       <div class="col-sm-6">
         <p>ID Laporan : <?= $data['id_laporan']; ?></p>
         <p>Nama Pasien : <?= $data['nama_user']; ?></p>
         <p>No Rekam Medis : <?= $data['no_rekam_medis']; ?></p>
         <p>No Antrian : <?= $data['no_antrian']; ?></p>
         <p>Hari & Tgl Periksa : <?= $data['hari_periksa_pasien'].", ".$data['tgl_periksa']; ?></p>
         <p>Waktu : <?= $data['waktu_mulai_antri']." - ".$data['waktu_selesai_periksa']; ?></p>
       </div>
       <div class="col-sm-6">
         <p>Jenis Kelamin : <?= $data['jenis_kelamin']; ?></p>
         <p>Gol Darah : <?= $data['gol_darah']; ?></p>
         <p>Tempat Lahir : <?= $data['tempat_lahir']; ?></p>
         <p>Tanggal Lahir : <?= $data['tanggal_lahir']; ?></p>
         <p>Agama : <?= $data['agama']; ?></p>
         <p>Tgl Masuk : <?= $data['tgl_masuk']; ?></p>
       </div>
       <div class="col-sm-12"><hr><br><h5>Data Dokter yang menangani</h5><br></div>
       <div class="col-sm-6">
         <p>Nama Dokter : <?= $dokter['nama_user']; ?></p>
         <p>Specialis Dokter : <?= $dokter['specialis']; ?></p>
         <p>Tempat Lahir : <?= $dokter['tempat_lahir']; ?></p>
         <p>Tanggal Lahir : <?= $dokter['tanggal_lahir']; ?></p>
         <p>Umur : <?= $dokter['umur']." th"; ?></p>
         <p>Agama : <?= $dokter['agama']; ?></p>
         <p>Tgl Masuk : <?= $dokter['tgl_masuk']; ?></p>
       </div>
     </div>
   </div>
 </section>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->

<script src="../../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../../../dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../../../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../../../plugins/raphael/raphael.min.js"></script>
<script src="../../../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../../../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../../../plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="../../../dist/js/pages/dashboard2.js"></script>
<script src="../../../plugins/select2/js/select2.min.js"></script>

<!-- date-range-picker -->
<script src="../../../plugins/daterangepicker/daterangepicker.js"></script>
<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>