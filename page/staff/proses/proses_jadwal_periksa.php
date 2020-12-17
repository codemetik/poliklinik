<?php 
include "../../../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_pasien = $_POST['id_pasien'];
	$id_user = $_POST['id_user'];
	$no_antri = $_POST['no_antrian'];
	$hari = $_POST['hari'];
	$waktu = $_POST['waktu'];

	$sql = mysqli_query($koneksi, "UPDATE tb_pasien SET no_antrian = '', waktu = '".$waktu."', hari_periksa = '".$hari."', nomor_antri = '".$no_antri."' WHERE id_pasien = '".$id_pasien."'");

	if ($sql) {
		echo "<script>
		alert('Data Berhasil diupdate');
		document.location.href = '../../../staff.php?page=pasien_lama';
		</script>";
	}else{
		echo "<script>
		alert('Data Gagal diupdate');
		document.location.href = '../../../staff.php?page=pasien_lama';
		</script>";
	}
}
?>