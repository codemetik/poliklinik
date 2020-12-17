<?php 
include "../../koneksi.php";

if (isset($_POST['rowis'])) {
	$id = $_POST['rowis'];

	$sql = mysqli_query($koneksi, "SELECT * FROM tb_pasien X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE hari_periksa = 'Senin' AND y.id_user = '".$id."' GROUP BY nomor_antri DESC");
	$data = mysqli_fetch_array($sql);

?>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<label>ID Pasien</label>
			<input type="text" name="id_pasien" class="form-control" value="<?= $data['id_paisen']; ?>" readonly>
		</div>
	</div>
	<div class="col-sm-6">
		
	</div>
</div>

<?php
}
?>