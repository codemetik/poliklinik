<?php 
include "../koneksi.php";

$sql = mysqli_query($koneksi, "SELECT id_pasien, @ok:= CASE nomor_antri WHEN '' THEN 'kosong' WHEN nomor_antri THEN nomor_antri END AS nomer_antrian FROM tb_pasien");
$d = mysqli_fetch_assoc($sql);

echo count($d);
echo "<br><hr>";
date_default_timezone_set('Asia/Jakarta');
echo date('d-M-Y');
?>