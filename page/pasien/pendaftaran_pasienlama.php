<?php 
// $pasien = mysqli_query($koneksi, "SELECT max(id_pasien) AS maxid, max(no_rekam_medis) AS maxrm FROM tb_pasien");
// $ps = mysqli_fetch_array($pasien);
// $pe = $ps['maxrm'];
// $pasi = (int) substr($pe, 2, 4);
// $pasi++;
// date_default_timezone_set('Asia/Jakarta'); 
// $pi = "RM-";
// $date = date('Ymd');
// $no_rm = $pi. $date ."-". sprintf("%04s", $pasi);

date_default_timezone_set('Asia/Jakarta'); 
$usernip = mysqli_query($koneksi, "SELECT max(no_antrian) AS no_antri, max(no_rekam_medis) AS maxCode FROM tb_pasien");
$idnip = mysqli_fetch_array($usernip);
$a = $idnip['no_antri'];
$id = $idnip['maxCode'];
$nOan = (int) substr($a, 12, 4);
$nOn = (int) substr($id, 12, 4);
$nOn++;
$nOan++; 
$date = date("Ymd");
$an = "AN-".$date."-";
$rm = "RM-".$date."-";
$no_antrian = $an . sprintf("%04s", $nOan);
$no_rm = $rm . sprintf("%04s", $nOn);

$cek_hari = mysqli_query($koneksi, "SELECT IF(WEEKDAY(".$date.")= '0','Senin',
IF(WEEKDAY(".$date.")='1','Selasa',
IF(WEEKDAY(".$date.")='2','Rabu',
IF(WEEKDAY(".$date.")='3','Kamis',
IF(WEEKDAY(".$date.")='4','Jumat',
IF(WEEKDAY(".$date.")='5','Sabtu',
IF(WEEKDAY(".$date.")='6','Minggu','Salah'))))))) 
AS hari");
$dhari = mysqli_fetch_array($cek_hari);

$sqlrolus = mysqli_query($koneksi, "SELECT max(id_pasien) AS maxCode FROM tb_pasien");
$dtrolus = mysqli_fetch_array($sqlrolus);
$rolus = $dtrolus['maxCode'];
$norolus = (int) substr($rolus, 3, 4);
$norolus++; 
$roluser = "PSN";
$id_pasien = $roluser . sprintf("%04s", $norolus);

$sqps = mysqli_query($koneksi, "SELECT * FROM tb_pasien_baru WHERE id_user = '".$_SESSION['id_user']."'");
$dpas = mysqli_fetch_array($sqps);

?>
<div class="row mt-2">
	<div class="col-sm-12">
		<ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pendaftarn Pasien</li>
        </ol>
	</div>
</div>
<div class="card">
	<div class="card-header bg-blue">
		<h5 class="card-title">Pendaftaran Pasien Periksa</h5>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<table class="table table-responsive">
					<tr>
						<th><button class="btn bg-danger">No Antrian dan No RM</button></th>
						<td>Menandakan Pasien Baru</td>
					</tr>
					<tr>
						<th><button class="btn bg-green">No Antrian dan No RM</button></th>
						<td>Menandakan Pasien Lama</td>
					</tr>
				</table>
			</div>
			<div class="col-sm-6">
				<div class="alert bg-gray">
					Jika <i>"No Rekam Medis"</i> Terdapat Warna <button class="btn bg-success">Hijau</button> maka Pasien menandakan user Lama.
				</div>
			</div>		
		</div>
	<form action="page/pasien/proses/proses_daftar_pasienlama.php" method="POST">
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label>ID User</label>
					<input type="text" name="id_user" class="form-control" readonly value="<?= $_SESSION['id_user']; ?>">
				</div>
				<div class="form-group">
					<label>ID Pasien</label>
					<?php
					$sqlid = mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE id_user = '".$_SESSION['id_user']."'");
					$did = mysqli_num_rows($sqlid);
					$sqlid = mysqli_fetch_array($sqlid);
					if ($did > 0) { ?>
						<input type="text" name="id_pasien" class="form-control" readonly value="<?= $sqlid['id_pasien']; ?>">	
					<?php }else{ ?>
						<input type="text" name="id_pasien" class="form-control" readonly value="<?= $id_pasien; ?>">
					<?php }
					?>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="form-group">
					<label>No Antrian</label>
					<?php 
					$cekps = mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE id_user = '".$_SESSION['id_user']."'");
					$dcek = mysqli_num_rows($cekps);
					$dataps = mysqli_fetch_array($cekps);
					if ($dcek > 0 ) {
						
						if ($dataps['no_antrian'] == "") { ?>
							<input type="text" name="no_antrian" class="form-control bg-danger" readonly value="<?= $no_antrian; ?>">
						<?php }else{ ?>
							<input type="text" name="no_antrian" class="form-control bg-green" readonly value="<?= $dataps['no_antrian']; ?>">
						<?php }

					}else{ ?>
						<input type="text" name="no_antrian" class="form-control bg-danger" value="<?= $dpas['no_antrian']; ?>">
					<?php }

					?>
				</div>
				<div class="form-group">
					<label>Dokter</label>
					<select name="id_dokter" class="form-control-sm select2" style="width: 100%;" required>
					<?php 
					$sql = mysqli_query($koneksi, "SELECT x.id_specialis, specialis, IFNULL(z.id_user,'Kosong') AS id_user , CONCAT('Dr. ',IFNULL(nama_user,'Kosong')) AS nama_user, IFNULL(id_dokter,'Kosong') AS id_dokter FROM tb_specialis X LEFT JOIN tb_dokter Y ON y.id_specialis = x.id_specialis LEFT JOIN tb_user z ON z.id_user = y.id_user GROUP BY id_specialis ASC");
					while ($data = mysqli_fetch_array($sql)) { ?>
						<option value="<?= $data['id_dokter']; ?>"><?= $data['specialis']." || ".$data['nama_user']; ?></option>
					<?php }
					?>
					</select>
				</div>	
			</div>
			<div class="col-sm-4">
				<div class="card">
					<div class="card-header bg-danger">
						<center><h5>No RM</h5></center>
					</div>
					<div class="card-body">
						<?php 
						$cekps = mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE id_user = '".$_SESSION['id_user']."'");
						$dcek = mysqli_num_rows($cekps);
						$dataps = mysqli_fetch_array($cekps);
						if ($dcek > 0) { ?>
							<center><h3><input type="text" name="no_rm" class="form-control bg-green" value="<?= $dataps['no_rekam_medis']; ?>" readonly></h3></center>
						<?php }else{ ?>
							<center><h3><input type="text" name="no_rm" class="form-control bg-danger" value="<?= $no_rm; ?>" readonly></h3></center>
						<?php }
						?>
					</div>
					<div class="card-body">
						<center><h3><input type="text" name="hari" class="form-control" value="<?= $dhari['hari']; ?>" readonly></h3></center>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<?php 
					$cekps = mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE id_user = '".$_SESSION['id_user']."'");
					$dcek = mysqli_num_rows($cekps);
					$dataps = mysqli_fetch_array($cekps);
					if ($dcek > 0) {
						
						if ($dataps['no_antrian'] == "") { ?>
							<button type="submit" name="daftar" class="form-control bg-blue">Daftar</button>
						<?php }else{ ?>
							
						<?php }

					}else{ ?>
						<button type="submit" name="daftar" class="form-control bg-blue">Daftar</button>
					<?php }
					?>
			</div>
		</div>
	</form>
	</div>
</div>