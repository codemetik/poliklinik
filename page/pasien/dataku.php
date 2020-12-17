<?php
$sql = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '".$_SESSION['id_user']."'");
$id_us = mysqli_fetch_array($sql);
?>
<div class="row mt-2">
	<div class="col-sm-12">
		<ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">My Data</li>
        </ol>
	</div>
</div>
<div class="card">
	<div class="card-header">
		<h5>SETTING MY PROFIL</h5>
	</div>
	<div class="card-body">
	<form action="page/pasien/proses/proses_edit_pasien.php" method="POST">
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<label>ID User</label>
					<input type="text" name="id_user" class="form-control" value="<?= $id_us['id_user']; ?>" readonly>
				</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" value="<?= $id_us['username']; ?>" required>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" value="<?= $id_us['password']; ?>" required>
				</div>
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" name="confirm_password" class="form-control" value="<?= $id_us['confirm_password']; ?>" required>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>Nama Lengkap Pasien</label>
					<input type="text" name="nama_user" class="form-control" value="<?= $id_us['nama_user']; ?>">
				</div>
				<div class="form-group">
					<label>Gol Darah</label>
					<input type="text" name="gol_darah" class="form-control" value="<?= $id_us['gol_darah']; ?>">
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select class="form-control" name="jenis_kelamin">
					<?php 
					$jk = mysqli_query($koneksi, "SELECT * FROM tb_jenis_kelamin");
					while ($djk = mysqli_fetch_array($jk)) {
						if ($id_us['jenis_kelamin'] == $djk['jenis_kelamin']) {
							$select = "selected";
						}else{
							$select = "";
						}
						echo "<option value='".$djk['jenis_kelamin']."' ".$select.">".$djk['jenis_kelamin']."</option>";
					}
					?>
					</select>
				</div>
				<div class="form-group">
					<label>Tempat Lahir</label>
					<input type="text" name="tempat_lahir" class="form-control" value="<?= $id_us['tempat_lahir']; ?>">
				</div>
			</div>
			<div class="col-sm-3">
				<div class="form-group">
					<label>Tanggal Lahir</label>
					<input type="date" name="tanggal_lahir" class="form-control" value="<?= $id_us['tanggal_lahir']; ?>">
				</div>
				<div class="form-group">
					<label>Agama</label>
					<input type="text" name="agama" class="form-control" value="<?= $id_us['agama']; ?>">
				</div>
				<?php 
	      		date_default_timezone_set('Asia/Jakarta'); 
				$tgl_masuk = date("Y-m-d h:i:s");
	      		?>
				<div class="form-group">
					<label>Tgl Daftar</label>
					<input type="text" name="tgl_masuk" class="form-control" value="<?= $id_us['tgl_masuk']; ?>"readonly>
				</div>
			</div>
			<div class="col-sm-12">
				<button class="btn bg-blue" name="simpan" type="submit"><i class="fa fa-save"></i> Simpan Perubahan</button>
			</div>
		</div>
	</form>
	</div>
</div>