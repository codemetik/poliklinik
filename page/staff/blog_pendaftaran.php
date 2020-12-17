<div class="row">
	<div class="col-sm-12">
		<ol class="breadcrumb mt-2">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">SETTING PENDAFTARAN</li>
        </ol>
	</div>
</div>
<div class="row">
	<?php 
$sql = mysqli_query($koneksi, "SELECT * FROM posting_pendaftaran WHERE judul = 'Pasien Baru'");
while ($data = mysqli_fetch_array($sql)) { ?>
	<div class="col-sm-6">
		<div class="card-body">
		<form action="" method="POST">
			<div class="form-group">
				<input type="text" name="pasien_baru" class="form-control bg-blue" value="<?= $data['judul']; ?>" readonly>
			</div>
			<div class="form-group">
				<textarea class="form-control" name="des1" style="height: 150px;" value="<?= $data['deskripsi']; ?>"><?= $data['deskripsi']; ?></textarea>
			</div>
			<div class="form-group">
				<button class="btn bg-blue" name="judul_baru" type="submit">Simpan Perubahan</button>
			</div>
		</form>
		</div>
	</div>	
<?php }

$sql = mysqli_query($koneksi, "SELECT * FROM posting_pendaftaran WHERE judul = 'Pasien Lama'");
while ($data = mysqli_fetch_array($sql)) { ?>
	<div class="col-sm-6">
		<div class="card-body">
		<form action="" method="POST">
			<div class="form-group">
				<input type="text" name="pasien_lama" class="form-control bg-blue" value="<?= $data['judul']; ?>" readonly>
			</div>
			<div class="form-group">
				<textarea class="form-control" name="des2" style="height: 150px;" value="<?= $data['deskripsi']; ?>"><?= $data['deskripsi']; ?></textarea>
			</div>
			<div class="form-group">
				<button class="btn bg-blue" name="judul_lama" type="submit">Simpan Perubahan</button>
			</div>
		</form>
		</div>
	</div>	
<?php }
?>
</div>


<?php 
//simpan judul baru
if (isset($_POST['judul_baru'])) {
	$pasien_baru = $_POST['pasien_baru'];
	$des1 = $_POST['des1'];

	$sqlup = mysqli_query($koneksi, "UPDATE posting_pendaftaran SET deskripsi = '".$des1."' WHERE judul = '".$pasien_baru."'");
	if ($sqlup) {
		echo "<script>
		alert('Berhasil disimpan');
		document.location.href = 'staff.php?page=posting_pendaftaran';
		</script>";
	}

}else if(isset($_POST['judul_lama'])){
	$pasien_lama = $_POST['pasien_lama'];
	$des2 = $_POST['des2'];

	$sqlup1 = mysqli_query($koneksi, "UPDATE posting_pendaftaran SET deskripsi = '".$des2."' WHERE judul = '".$pasien_lama."'");
	if ($sqlup1) {
		echo "<script>
		alert('Berhasil disimpan');
		document.location.href = 'staff.php?page=posting_pendaftaran';
		</script>";
	}
}
?>