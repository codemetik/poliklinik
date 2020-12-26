<?php 
include "../../../koneksi.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = mysqli_query($koneksi, "UPDATE tb_pasien SET no_antrian = '', waktu = '', hari_periksa = '', nomor_antri = '' WHERE id_pasien = '".$id."' ");

	if ($sql) {
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