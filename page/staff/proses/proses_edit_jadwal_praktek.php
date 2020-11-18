<?php 
include "../../../koneksi.php";

if (isset($_POST['simpan_perubahan'])) {
	$id_dokter = $_POST['id_dokter'];
	$id_specialis = $_POST['id_specialis'];
	$hari_awal = $_POST['hari_awal'];
	$hari_akhir = $_POST['hari_akhir'];
	$waktu_buka = $_POST['waktu_buka'];
	$waktu_tutup = $_POST['waktu_tutup'];

	$sql = mysqli_query($koneksi, "UPDATE tb_jadwal_praktek SET hari_awal = '".$hari_awal."', hari_akhir = '".$hari_akhir."', waktu_buka ='".$waktu_buka."', waktu_tutup ='".$waktu_tutup."' WHERE id_dokter = '".$id_dokter."'");
	if ($sql) {
		echo "<script>
		alert('Data Berhasil diupdate');
		document.location.href = '../../../staff.php?page=jadwal_praktek';
		</script>";
	}else{
		echo "<script>
		alert('Data Gagal diupdate');
		document.location.href = '../../../staff.php?page=jadwal_praktek';
		</script>";
	}
}
?>