<?php 
include "../../../koneksi.php";

if (isset($_POST['rowid'])) {
	$id = $_POST['rowid'];

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_specialis WHERE id_specialis = '".$id."'");
	$data = mysqli_fetch_array($sql);
?>
<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<label>ID Specialis</label>
			<input type="text" name="id_specialis" class="form-control" value="<?= $data['id_specialis'] ?>" readonly>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group">
			<label>Nama Specialis</label>
			<input type="text" name="specialis" class="form-control" value="<?= $data['specialis']; ?>">
		</div>
	</div>
</div>
<?php 
}
?>