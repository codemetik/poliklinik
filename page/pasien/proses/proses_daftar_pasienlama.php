<?php 

include "../../../koneksi.php";

if (isset($_POST['daftar'])) {
	$id_user = $_POST['id_user'];
	$id_dokter = $_POST['id_dokter'];
	$id_pasien = $_POST['id_pasien'];
	$no_antrian = $_POST['no_antrian'];
	$no_rm = $_POST['no_rm'];
	$hari = $_POST['hari'];
	$nomor_antrian = $_POST['nomor_antrian'];

	$sqlcek = mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE id_user = '".$id_user."'");
	$dcek = mysqli_num_rows($sqlcek);
	if ($dcek > 0) {
		//update pasien jika sudah ada nomor rekam medis
		$sql = mysqli_query($koneksi, "UPDATE tb_pasien SET id_dokter = '".$id_dokter."', no_antrian = '".$no_antrian."', no_rekam_medis = '".$no_rm."', hari_periksa = '".$hari."', nomor_antri = '".$nomor_antrian."' WHERE id_user = '".$id_user."' ");
		if ($sql) {
			echo "<script>
			alert('Data periksa berhasil di Updatte');
			document.location.href = '../../../index.php?page=jadwal';
			</script>";
		}else{
			echo "<script>
			alert('Data periksa berhasil di Update');
			document.location.href = '../../../index.php?page=jadwal';
			</script>";
		}

	}else{
		//insert baru
		$sql = mysqli_query($koneksi, "INSERT INTO tb_pasien(id_pasien, id_dokter, id_user,no_antrian, no_rekam_medis, hari_periksa, nomor_antri) VALUES('$id_pasien','$id_dokter','$id_user','$no_antrian','$no_rm','$hari','$nomor_antrian')");
		if ($sql) {
			echo "<script>
			alert('Data periksa berhasil diinput');
			document.location.href = '../../../index.php?page=jadwal';
			</script>";
		}else{
			echo "<script>
			alert('Data periksa berhasil diinput');
			document.location.href = '../../../index.php?page=jadwal';
			</script>";
		}

	}

	
}
?>