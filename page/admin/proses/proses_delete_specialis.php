<?php 
include "../../../koneksi.php";

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = mysqli_query($koneksi, "DELETE FROM tb_specialis WHERE id_specialis = '".$id."'");
	if ($sql) {
		echo "<script>
		alert('Data Berhasil dihapus');
		document.location.href = '../../../admin.php?page=dokter';
		</script>";
	}else{
		echo "<script>
		alert('Data Berhasil digagal');
		document.location.href = '../../../admin.php?page=dokter';
		</script>";
	}
}
?>