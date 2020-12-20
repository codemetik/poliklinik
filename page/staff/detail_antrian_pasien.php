<?php 
include "../../koneksi.php";

if ($_POST['rowid']) {
	$id = $_POST['rowid'];

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_pasien X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE y.id_user = '".$id."' GROUP BY nomor_antri DESC");
	$data = mysqli_fetch_array($sql);

?>

<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<label>ID User</label>
			<input type="text" name="id_user" class="form-control" value="<?= $data['id_user']; ?>" readonly>
		</div>
		<div class="form-group">
			<label>ID Pasien</label>
			<input type="text" name="id_pasien" class="form-control" value="<?= $data['id_pasien']; ?>" readonly>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<label>Nama Pasien</label>
			<input type="text" name="nama_pasien" class="form-control" value="<?= $data['nama_user']; ?>" readonly>
		</div>
		<div class="form-group">
			<label>Hari Periksa</label>
			<input type="text" name="hari_periksa" class="form-control" value="<?= $data['hari_periksa']; ?>" readonly>
		</div>
		<div class="form-group">
			<label>Waktu</label>
			<input type="text" name="waktu" class="form-control" value="<?= $data['waktu']; ?>" readonly>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="card row bg-gray">
			<div class="col-sm-12">
				<div class="form-group p-2">
					<label>Nomor Antri</label>
					<input type="text" name="nomor_antri" class="form-control" value="<?= $data['nomor_antri']; ?>" readonly>
				</div>
				<div class="form-group p-2">
					<label>No Rekam Medis</label>
					<input type="text" name="no_rekam_medis" class="form-control" value="<?= $data['no_rekam_medis']; ?>" readonly>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
}
?>