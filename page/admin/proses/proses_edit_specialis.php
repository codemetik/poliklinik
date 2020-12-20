<?php 
include "../../../koneksi.php";

if (isset($_POST['simpan_perubahan'])) {
	$id_specialis = $_POST['id_specialis'];
	$specialis = $_POST['specialis'];

	$sql = mysqli_query($koneksi, "UPDATE tb_specialis SET specialis = '".$specialis."' WHERE id_specialis = '".$id_specialis."'");
	if ($sql) {
		echo "<script>
	alert('Data Berhasil di Edit');
	document.location.href = '../../../admin.php?page=dokter';
	</script>";
	}else{
		echo "<script>
	alert('Data Gagal di Edit');
	document.location.href = '../../../admin.php?page=dokter';
	</script>";
	}
}
?>