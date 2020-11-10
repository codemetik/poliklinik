<?php 
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sqluser = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '".$username."' AND password = '".$password."'");
	$cekuser = mysqli_num_rows($sqluser);
	$dtuser = mysqli_fetch_array($sqluser);


	if ($cekuser > 0) {

		$sqlbg = mysqli_query($koneksi, "SELECT * FROM tb_user X INNER JOIN tb_rols_user Y ON y.id_user = x.id_user INNER JOIN tb_bagian z ON z.id_bagian = y.id_bagian WHERE x.id_user = '".$dtuser['id_user']."'");
		$dtbg = mysqli_fetch_array($sqlbg);
		$cekbg = mysqli_num_rows($sqlbg);

		if ($dtbg['id_bagian'] == 'BG004') {

			$_SESSION['id_user'] = $dtbg['id_user'];
			$_SESSION['username'] = $dtuser['username'];
			$_SESSION['nama_bagian'] = $dtbg['nama_bagian'];


			echo "<script>
			alert('Anda berhasil login');
			document.location.href = 'index.php';
			</script>";

		}else if($dtbg['id_bagian'] == 'BG003'){

			$_SESSION['id_user'] = $dtbg['id_user'];
			$_SESSION['username'] = $dtuser['username'];
			$_SESSION['nama_bagian'] = $dtbg['nama_bagian'];


			echo "<script>
			alert('Anda berhasil login');
			document.location.href = 'dokter.php';
			</script>";

		}else if($dtbg['id_bagian'] == 'BG002'){

			$_SESSION['id_user'] = $dtbg['id_user'];
			$_SESSION['username'] = $dtuser['username'];
			$_SESSION['nama_bagian'] = $dtbg['nama_bagian'];


			echo "<script>
			alert('Anda berhasil login');
			document.location.href = 'staff.php';
			</script>";

		}else{

			$_SESSION['id_user'] = $dtbg['id_user'];
			$_SESSION['username'] = $dtuser['username'];
			$_SESSION['nama_bagian'] = $dtbg['nama_bagian'];


			echo "<script>
			alert('Anda berhasil login');
			document.location.href = 'admin.php';
			</script>";

		}

	}else{
		echo "<script>
		alert('Maaf Anda gagal login');
		document.location.href = 'index.php';
		</script>";
	}
}
?>