<?php 

session_start();
include "../../../koneksi.php";
if (!isset($_SESSION['id_user'])) {
  header("Location:login.php");
}
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PBU</title>
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
   <div class="card">
      <div class="card-header bg-gray text-center">
        <h5>Antrian Anda</h5>
      </div>
      <div class="card-body text-center">
        <?php 
        $minantri = mysqli_query($koneksi, "SELECT id_user, IF(nomor_antri = '','Tidak Ada',nomor_antri) AS nomer, 
IF(nomor_antri = '', 'Tidak Ada',
IF((SELECT MIN(nomor_antri) FROM tb_pasien WHERE nomor_antri != '') = nomor_antri, 'Sedang di Proses', 
CONCAT((SELECT COUNT(*) FROM tb_pasien WHERE nomor_antri != '') - 1,' Orang Lagi')
)
) AS keterangan_periksa,
IF(
(SELECT MIN(nomor_antri) FROM tb_pasien WHERE nomor_antri != '') = nomor_antri, 
'Sedang Proses Periksa ',IF(nomor_antri = '','Anda Sedang tidak dalam Antrian','Menunggu')
) AS status_periksa
FROM tb_pasien WHERE id_user = '".$_SESSION['id_user']."' ORDER BY id_pasien");
              $cek = mysqli_fetch_array($minantri);
        ?>
        <p>Berikut ID User Anda : <b><?= $_SESSION['id_user']; ?></b></p>
        <p class="mb-0">Nomer Antrian :</p>
        <b><h2><?= $cek['nomer']; ?></h2></b>
        <p class="mb-0">Status Periksa :</p>
        <b><h2><?= $cek['status_periksa']; ?></h2></b>
        <p class="mb-0">Keterangan :</p>
        <b><h2><?= $cek['keterangan_periksa']; ?></h2></b>
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