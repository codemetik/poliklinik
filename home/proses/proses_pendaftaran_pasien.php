<?php 
include "../../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_user = $_POST['id_user'];
	$id_bagian = 'BG004';
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

	// $no_antrian = $_POST['no_antrian'];
	$hari = $_POST['hari'];


	$sqlrolus = mysqli_query($koneksi, "SELECT max(id_rols_user) AS maxCode FROM tb_rols_user");
	$dtrolus = mysqli_fetch_array($sqlrolus);
	$rolus = $dtrolus['maxCode'];
	$norolus = (int) substr($rolus, 4, 4);
	$norolus++; 
	$roluser = "ROLS";
	$id_rols_user = $roluser . sprintf("%04s", $norolus);

	date_default_timezone_set('Asia/Jakarta');
	$usernip = mysqli_query($koneksi, "SELECT max(no_antrian) AS maxCode FROM tb_pasien_baru");
	$idnip = mysqli_fetch_array($usernip);
	$id = $idnip['maxCode'];
	$nOn = (int) substr($id, 12, 4);
	$nOn++; 
	$date = date("Ymd");
	$an = "AN-".$date."-";
	$no_antrian = $an . sprintf("%04s", $nOn);

	$sql = mysqli_query($koneksi, "INSERT INTO tb_user(id_user, username, password, confirm_password, nama_user, jenis_kelamin, gol_darah, tempat_lahir, tanggal_lahir, agama, tgl_masuk) VALUES('$id_user','$username','$password','$confirm_password','$nama_user','$jenis_kelamin','$gol_darah','$tempat_lahir','$tanggal_lahir','$agama','$tgl_masuk')");

	$sql1 = mysqli_query($koneksi, "INSERT INTO tb_rols_user(id_rols_user, id_user, id_bagian, tgl_user_regis)VALUES('$id_rols_user','$id_user','$id_bagian','$tgl_masuk')");
	
	$pasien_baru = mysqli_query($koneksi, "INSERT INTO tb_pasien_baru(no_antrian, hari, id_user, tgl_user_regis) VALUES('$no_antrian','$hari','$id_user','$tgl_masuk')");

	if ($sql && $sql1 && $pasien_baru) {
		echo "<script>
		alert('Data Berhasil disimpan');
		document.location.href = '../../?page=pendaftaran';
		</script>";
	}else{
		echo "<script>
		alert('Data Berhasil disimpan');
		document.location.href = '../../?page=pendaftaran';
		</script>";
	}

}
?>