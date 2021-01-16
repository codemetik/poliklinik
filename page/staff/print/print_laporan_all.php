<?php 

session_start();
include "../../../koneksi.php";
if (!isset($_SESSION['id_user'])) {
  header("Location:login.php");
}
date_default_timezone_set('Asia/Jakarta');

$sqlget = mysqli_query($koneksi, "SELECT * FROM tb_laporan X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE tgl_periksa = '".$_GET['idlapall']."' GROUP BY tgl_periksa");
$dget = mysqli_fetch_array($sqlget);
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
     <h5 class="text-center">Laporan  <?= $dget['hari_periksa_pasien'].", ".$dget['tgl_periksa'] ?></h5><br>
     <div class="row">
      <div class="table-responsive">
        <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>ID Laporan</th>
                <th>Nama Pasien</th>
                <th>Dokter</th>
                <th>No Rekam Medis</th>
                <th>No Antrian</th>
                <th>Hari Periksa</th>
                <th>Tangga Periksa</th>
                <th>Waktu</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = mysqli_query($koneksi, "SELECT * FROM tb_laporan X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE tgl_periksa = '".$dget['tgl_periksa']."'");
              $no=1;
              while ($data = mysqli_fetch_array($sql)) { ?>
                <tr>
                  <th><?= $no++; ?></th>
                  <td><?= $data['id_laporan']; ?></td>
                  <td><?= $data['nama_user']; ?></td>
                  <td><?= $data['id_dokter']; ?></td>
                  <td><?= $data['no_rekam_medis']; ?></td>
                  <td><?= $data['no_antrian']; ?></td>
                  <td><?= $data['hari_periksa_pasien']; ?></td>
                  <td><?= $data['tgl_periksa']; ?></td>
                  <td><?= $data['waktu_mulai_antri']." - ".$data['waktu_selesai_periksa']; ?></td>
                </tr>
              <?php }
              ?>
            </tbody>
        </table>
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