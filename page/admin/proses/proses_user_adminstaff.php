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
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$agama = $_POST['agama'];
	$tgl_masuk = $_POST['tgl_masuk'];

	$sql = mysqli_query($koneksi, "INSERT INTO tb_user(id_user, username, password, confirm_password,nama_user, jenis_kelamin, gol_darah,tempat_lahir, tanggal_lahir, agama,tgl_masuk) VALUES('$id_user', '$username','$password','$confirm_password','$nama_user','$jenis_kelamin','$gol_darah','$tempat_lahir','$tanggal_lahir','$agama','$tgl_masuk')");
	$sql1 = mysqli_query($koneksi, "INSERT INTO tb_rols_user(id_rols_user, id_user, id_bagian, tgl_user_regis) VALUES('$id_rols_user','$id_user','$id_bagian','$tgl_masuk')");

	if ($sql && $sql1) {
		echo "<script>
		alert('Data Berhasil disimpan');
		document.location.href = '../../../admin.php?page=staff';
		</script>";
	}else{
		echo "<script>
		alert('Data Gagal disimpan');
		document.location.href = '../../../admin.php?page=staff';
		</script>";
	}

}

?>