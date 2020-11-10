<?php 
include "../../../koneksi.php";

$sql = mysqli_query($koneksi, "DELETE FROM tb_user WHERE id_user = '".$_GET['id']."'");

if ($sql) {
	echo "<script>
	alert('Data Berhasil dihapus');
	document.location.href = '../../../admin.php?page=dokter';
	</script>";
}else{
	echo "<script>
	alert('Data Berhasil dihapus');
	document.location.href = '../../../admin.php?page=dokter';
	</script>";
}
?>