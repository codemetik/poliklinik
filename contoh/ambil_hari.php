<?php 
include "../koneksi.php";

$hari = date('Y-m-d');

$sql = mysqli_query($koneksi, "SELECT IF(WEEKDAY(NOW())= '0','Senin',
IF(WEEKDAY(NOW())='1','Selasa',
IF(WEEKDAY(NOW())='2','Rabu',
IF(WEEKDAY(NOW())='3','Kamis',
IF(WEEKDAY(NOW())='4','Jumat',
IF(WEEKDAY(NOW())='5','Sabtu',
IF(WEEKDAY(NOW())='6','Minggu','Salah'))))))) 
AS hari");
$data = mysqli_fetch_array($sql);

echo $data['hari'];
?>