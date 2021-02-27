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

	date_default_timezone_set('Asia/Jakarta');
	$tgl_periksa = date("Y-m-d");
	$waktu_mulai_antri = date('h:i:s');

	$sqlcek = mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE id_user = '".$id_user."'");
	$dcek = mysqli_num_rows($sqlcek);
	if ($dcek > 0) {
		//update pasien jika sudah ada nomor rekam medis
		$sql = mysqli_query($koneksi, "UPDATE tb_pasien SET id_dokter = '".$id_dokter."', no_antrian = '".$no_antrian."', no_rekam_medis = '".$no_rm."', waktu = '".$waktu_mulai_antri."', hari_periksa = '".$hari."', nomor_antri = '".$nomor_antrian."' WHERE id_user = '".$id_user."' ");
		//insert ke laporan
		$lap = mysqli_query($koneksi, "INSERT INTO tb_laporan(id_user, id_pasien, id_dokter, no_rekam_medis, no_antrian, hari_periksa_pasien, tgl_periksa, waktu_mulai_antri) VALUES('$id_user', '$id_pasien','$id_dokter','$no_rm','$no_antrian','$hari','$tgl_periksa','$waktu_mulai_antri')");

		if ($sql && $lap) {
			echo "<script>
			alert('Data periksa berhasil di Update');
			document.location.href = '../../../index.php?page=antrian_pasien';
			</script>";
		}else{
			echo "<script>
			alert('Data periksa berhasil di Update');
			document.location.href = '../../../index.php?page=pendaftaran_pasienlama';
			</script>";
		}

	}else{
		//insert baru
		$sql = mysqli_query($koneksi, "INSERT INTO tb_pasien(id_pasien, id_dokter, id_user,no_antrian, no_rekam_medis, waktu,hari_periksa, nomor_antri) VALUES('$id_pasien','$id_dokter','$id_user','$no_antrian','$no_rm','$waktu_mulai_antri','$hari','$nomor_antrian')");
		//insert ke laporan
		$lap = mysqli_query($koneksi, "INSERT INTO tb_laporan(id_user, id_pasien, id_dokter, no_rekam_medis, no_antrian, hari_periksa_pasien, tgl_periksa, waktu_mulai_antri) VALUES('$id_user', '$id_pasien','$id_dokter','$no_rm','$no_antrian','$hari','$tgl_periksa','$waktu_mulai_antri')");

		if ($sql && $lap) {
			echo "<script>
			alert('Data periksa berhasil diinput');
			document.location.href = '../../../index.php?page=antrian_pasien';
			</script>";
		}else{
			echo "<script>
			alert('Data periksa berhasil diinput');
			document.location.href = '../../../index.php?page=pendaftaran_pasienlama';
			</script>";
		}

	}

	
}
?>