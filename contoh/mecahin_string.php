<?php 
date_default_timezone_set('Asia/Jakarta'); 
$d =  date('Y-m-d h:i:s')."0";
echo "<br><hr>";
$date= date('Y-m-d h:i:s');
echo "<br><hr>";
$text = "Mangga Apel Durian";
$pecah = explode(" ", $date);
// $pecah = str_split($date);
echo $pecah[0];
echo "<br><hr>";
echo $d;
?>