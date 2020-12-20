<?php 
include "../../../koneksi.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];

	$sql = mysqli_query($koneksi, "DELETE FROM tb_jadwal_praktek WHERE id_jadwal_praktek = '".$id."'");
	if ($sql) {
		echo "<script>
		alert('Jadwal Praktek Berhasil di Hapus');
		document.location.href = '../../../staff.php?page=jadwal_praktek';
		</script>";
	}else{
		echo "<script>
		alert('Jadwal Praktek Gagal di Hapus');
		document.location.href = '../../../staff.php?page=jadwal_praktek';
		</script>";
	}
}
?>