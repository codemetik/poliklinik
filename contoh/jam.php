<?php 
include "../koneksi.php";
// date_default_timezone_set('Asia/Jakarta');
$sqlrolus = mysqli_query($koneksi, "SELECT waktu_buka, max(waktu_buka) as buka FROM tb_pasien X
INNER JOIN tb_jadwal_praktek Y ON y.id_dokter = x.id_dokter WHERE x.id_dokter = '5'");
$dtrolus = mysqli_fetch_array($sqlrolus);
$pecah = explode(":", $dtrolus['waktu_buka']);
$pecah[0]++;
if ($dtrolus['waktu_buka'] == "") {
	echo $pecah[0];
}else{
	echo sprintf("%02s", $pecah[0]);
}
// $cari_kd=mysqli_query($koneksi, "SELECT max(nomor_antri) AS kode FROM tb_pasien");
// $tm_cari=mysqli_fetch_array($cari_kd);
// $kode=(int)substr($tm_cari['kode'], 1,4);
// $tambah=$kode+1;
// if ($tambah<10) {
// 		$id="00:0".$tambah;
// 	}else{
// 		$id="00:".$tambah;
// 	}
// echo $id;
?>