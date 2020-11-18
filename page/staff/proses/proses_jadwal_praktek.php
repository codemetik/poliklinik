<?php 
include "../../../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_dokter = $_POST['id_dokter'];
	$id_specialis = $_POST['id_specialis'];
	$hari_awal = $_POST['hari_awal'];
	$hari_akhir = $_POST['hari_akhir'];
	$waktu_buka = $_POST['waktu_buka'];
	$waktu_tutup = $_POST['waktu_tutup'];

	$sql = mysqli_query($koneksi, "INSERT INTO tb_jadwal_praktek(id_dokter, id_specialis, hari_awal, hari_akhir, waktu_buka, waktu_tutup) VALUES('$id_dokter','$id_specialis','$hari_awal','$hari_akhir','$waktu_buka','$waktu_tutup')");

	if ($sql) {
		echo "<script>
		alert('Data Berhasil disimpan');
		document.location.href = '../../../staff.php?page=jadwal_praktek';
		</script>";
	}else{
		echo "<script>
		alert('Data Gagal disimpan');
		document.location.href = '../../../staff.php?page=jadwal_praktek';
		</script>";
	}
}
?>