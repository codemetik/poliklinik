<?php 
include "../../../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_user = $_POST['id_user'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

	$nama_user = $_POST['nama_user'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$gol_darah = $_POST['gol_darah'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$agama = $_POST['agama'];
	$tgl_masuk = $_POST['tgl_masuk'];

	$sql = mysqli_query($koneksi, "UPDATE tb_user SET username = '".$username."',password = '".$password."',confirm_password = '".$confirm_password."', nama_user = '".$nama_user."', jenis_kelamin= '".$jenis_kelamin."', gol_darah = '".$gol_darah."', tempat_lahir = '".$tempat_lahir."', tanggal_lahir = '".$tanggal_lahir."', agama= '".$agama."' WHERE id_user = '".$id_user."' ");

	if ($sql) {
		echo "<script>
		alert('Data Berhasil disimpan');
		document.location.href = '../../../dokter.php?page=dataku';
		</script>";
	}else{
		echo "<script>
		alert('Data Gagal disimpan');
		document.location.href = '../../../dokter.php?page=dataku';
		</script>";
	}

}

?>