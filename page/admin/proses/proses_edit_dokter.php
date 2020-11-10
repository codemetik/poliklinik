<?php 
include "../../../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_user = $_POST['id_user'];
	$id_rols_user = $_POST['id_rols_user'];
	$id_bagian = $_POST['id_bagian'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

	$nama_user = $_POST['nama_user'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$gol_darah = $_POST['gol_darah'];
	$id_specialis = $_POST['id_specialis'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$agama = $_POST['agama'];
	$tgl_masuk = $_POST['tgl_masuk'];

	$sql = mysqli_query($koneksi, "UPDATE tb_user SET username = '".$username."',password = '".$password."',confirm_password = '".$confirm_password."', nama_user = '".$nama_user."', jenis_kelamin= '".$jenis_kelamin."', gol_darah = '".$gol_darah."', tempat_lahir = '".$tempat_lahir."', tanggal_lahir = '".$tanggal_lahir."', agama= '".$agama."' WHERE id_user = '".$id_user."' ");
	$sql1 = mysqli_query($koneksi, "UPDATE tb_dokter SET id_specialis = '".$id_specialis."'	WHERE id_user = '".$id_user."'");

	if ($sql && $sql1) {
		echo "<script>
		alert('Data Berhasil disimpan');
		document.location.href = '../../../admin.php?page=dokter';
		</script>";
	}else{
		echo "<script>
		alert('Data Gagal disimpan');
		document.location.href = '../../../admin.php?page=dokter';
		</script>";
	}

}

?>