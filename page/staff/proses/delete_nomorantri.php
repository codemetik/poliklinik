<?php 
include "../../../koneksi.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	date_default_timezone_set('Asia/Jakarta');
	$tgl = date("Y-m-d");
    $waktu_selesai = date('h:i:s');

	$sql = mysqli_query($koneksi, "UPDATE tb_pasien SET no_antrian = '', waktu = '', hari_periksa = '', nomor_antri = '' WHERE id_pasien = '".$id."' ");
	$insertlap  = mysqli_query($koneksi, "UPDATE tb_laporan SET waktu_selesai_periksa = '".$waktu_selesai."' WHERE id_pasien = '".$id."' AND tgl_periksa = '".$tgl."'");

	if ($sql && $insertlap) {
		echo "<script>
		alert('Anda Berhasil Melanjutkan Antrian');
		document.location.href = '../../../staff.php?page=home_staff';
		</script>";
	}else{
		echo "<script>
		alert('Anda Gagal Melanjutkan Antrian');
		document.location.href = '../../../staff.php?page=home_staff';
		</script>";
	}
}
?>