<?php 
$sqlus = mysqli_query($koneksi, "SELECT max(id_user) AS maxCode FROM tb_user");
$dtus = mysqli_fetch_array($sqlus);
$us = $dtus['maxCode'];
$nous = (int) substr($us, 3, 4);
$nous++; 
$user = "USR";
$id_user = $user . sprintf("%04s", $nous);



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
?>
<div class="row mt-2">
	<div class="col-sm-12">
		<ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pendaftaran Pasien</li>
        </ol>
	</div>
</div>
<div class="card">
	<div class="card-header bg-blue">
		<h5>Pendaftaran Pasien</h5>
	</div>
	<div class="card-body">
	<form action="home/proses/proses_pendaftaran_pasien.php" method="POST">
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label>ID User</label>
					<input type="text" name="id_user" class="form-control" value="<?= $id_user; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" placeholder="username" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" placeholder="password" required>
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" name="confirm_password" class="form-control" placeholder="confirm password" required>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>Nama Lengkap Pasien</label>
					<input type="text" name="nama_user" class="form-control" placeholder="nama lengkap pasien">
				</div>
				<div class="form-group">
					<label>Gol Darah</label>
					<input type="text" name="gol_darah" class="form-control" placeholder="gol darah">
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select class="form-control" name="jenis_kelamin">
					<?php 
					$jk = mysqli_query($koneksi, "SELECT * FROM tb_jenis_kelamin");
					while ($djk = mysqli_fetch_array($jk)) {
						echo "<option value='".$djk['jenis_kelamin']."'>".$djk['jenis_kelamin']."</option>";
					}
					?>
					</select>
				</div>
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input type="text" name="tempat_lahir" class="form-control" placeholder="tempat lahir">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" name="tanggal_lahir" class="form-control">
				</div>
				<div class="form-group">
					<label>Agama</label>
					<input type="text" name="agama" class="form-control" placeholder="agama">
				</div>
				<div class="form-group">
					<label>Pilih Specialis</label>
					<select name="id_dokter" class="form-control-sm select2" style="width: 100%;" required>
					<?php 
					$sql = mysqli_query($koneksi, "SELECT x.id_specialis, specialis, IFNULL(z.id_user,'Kosong') AS id_user , CONCAT('Dr. ',IFNULL(nama_user,'Kosong')) AS nama_user, IFNULL(id_dokter,'Kosong') AS id_dokter FROM tb_specialis X LEFT JOIN tb_dokter Y ON y.id_specialis = x.id_specialis LEFT JOIN tb_user z ON z.id_user = y.id_user GROUP BY id_specialis ASC");
					while ($data = mysqli_fetch_array($sql)) { ?>
						<option value="<?= $data['id_dokter']; ?>"><?= $data['specialis']." || ".$data['nama_user']; ?></option>
					<?php }
					?>
					</select>
				</div>
				<?php 
	      		date_default_timezone_set('Asia/Jakarta'); 
				$tgl_masuk = date("Y-m-d h:i:s");
	      		?>
				<div class="form-group">
					<label>Tgl Daftar</label>
					<input type="text" name="tgl_masuk" class="form-control" value="<?= $tgl_masuk; ?>" readonly>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="card">
					<div class="card-header bg-danger">
						<center><h5>No Antrian</h5></center>
					</div>
					<div class="card-body">
						<center><h3><input type="text" name="no_antrian" class="form-control" value="<?= $no_antrian; ?>" readonly></h3></center>
					</div>
				</div>
				<div class="card">
					<div class="card-header bg-danger">
						<center><h5>No RM</h5></center>
					</div>
					<div class="card-body">
						<center><h3><input type="text" name="no_rm" class="form-control" value="<?= $no_rm; ?>" readonly></h3></center>
					</div>
				</div>
			</div>
			<div class="col-sm-12">
				<button class="btn bg-blue" name="simpan" type="submit"><i class="fa fa-save"></i> Simpan</button>
			</div>
		</div>
	</form>
	</div>
</div>