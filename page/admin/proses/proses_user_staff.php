<?php 
include "../../../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_user = $_POST['id_user'];
	$id_rols_user = $_POST['id_rols_user'];
	$id_admin = $_POST['id_admin'];
	$id_bagian = 'BG002'; //bagian staff_admin BG002
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

	$nama_admin = $_POST['nama_admin'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tempat_lahir = $_POST['tempat_lahir'];
	$tanggal_lahir = $_POST['tanggal_lahir'];
	$agama = $_POST['agama'];
	$tgl_masuk = $_POST['tgl_masuk'];

	$sql = mysqli_query($koneksi, "INSERT INTO tb_user(id_user, username, password, confirm_password) VALUES('$id_user', '$username','$password','$confirm_password')");
	$sql1 = mysqli_query($koneksi, "INSERT INTO tb_rols_user(id_rols_user, id_user, id_bagian, tgl_user_regis) VALUES('$id_rols_user','$id_user','$id_bagian','$tgl_masuk')");
	$sql2 = mysqli_query($koneksi, "INSERT INTO tb_profile_admin(id_admin, id_user, nama_admin, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, tgl_masuk) VALUES('$id_dokter','$id_user','$nama_admin','$jenis_kelamin','$tempat_lahir','$tanggal_lahir','$agama','$tgl_masuk')");

	if ($sql && $sql1 && $sql2) {
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