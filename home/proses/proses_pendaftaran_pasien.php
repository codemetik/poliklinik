<?php 
include "../../koneksi.php";

if (isset($_POST['simpan'])) {
	$id_user = $_POST['id_user'];
	// $id_rols_user = $_POST['id_rols_user'];
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
	$id_dokter = $_POST['id_dokter'];


	$sqlrolus = mysqli_query($koneksi, "SELECT max(id_rols_user) AS maxCode FROM tb_rols_user");
	$dtrolus = mysqli_fetch_array($sqlrolus);
	$rolus = $dtrolus['maxCode'];
	$norolus = (int) substr($rolus, 4, 4);
	$norolus++; 
	$roluser = "ROLS";
	$id_rols_user = $roluser . sprintf("%04s", $norolus);

	$sqlp = mysqli_query($koneksi, "SELECT max(id_pasien) AS maxCode FROM tb_pasien");
	$dtp = mysqli_fetch_array($sqlp);
	$rolp = $dtp['maxCode'];
	$nop = (int) substr($rolp, 3, 4);
	$nop++; 
	$rolp = "PSN";
	$id_pasien = $rolp . sprintf("%04s", $nop);

	$pasien = mysqli_query($koneksi, "SELECT max(no_antrian) AS maxCode, max(no_rekam_medis) AS maxrm FROM tb_pasien");
	$ps = mysqli_fetch_array($pasien);
	$p = $ps['maxCode'];
	$pe = $ps['maxrm'];
	$pas = (int) substr($p, 2, 4);
	$pasi = (int) substr($pe, 2, 4);
	$pas++; 
	$pasi++;
	date_default_timezone_set('Asia/Jakarta'); 
	$psi = "AN";
	$pi = "RM";
	$no_antrian = $psi . sprintf("%04s", $pas);
	$no_rm = $pi . sprintf("%04s", $pasi);

	$sql = mysqli_query($koneksi, "INSERT INTO tb_user(id_user, username, password, confirm_password, nama_user, jenis_kelamin, gol_darah, tempat_lahir, tanggal_lahir, agama, tgl_masuk) VALUES('$id_user','$username','$password','$confirm_password','$nama_user','$jenis_kelamin','$gol_darah','$tempat_lahir','$tanggal_lahir','$agama','$tgl_masuk')");

	$sql1 = mysqli_query($koneksi, "INSERT INTO tb_rols_user(id_rols_user, id_user, id_bagian, tgl_user_regis)VALUES('$id_rols_user','$id_user','$id_bagian','$tgl_masuk')");

	$sql2 = mysqli_query($koneksi, "INSERT INTO tb_pasien(id_pasien, id_dokter, id_user, no_antrian, no_rekam_medis) VALUES('$id_pasien','$id_dokter','$id_user','$no_antrian','$no_rm')");

	if ($sql && $sql1 && $sql2) {
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