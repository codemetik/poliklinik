<?php 
$sqlus = mysqli_query($koneksi, "SELECT max(id_user) AS maxCode FROM tb_user");
$dtus = mysqli_fetch_array($sqlus);
$us = $dtus['maxCode'];
$nous = (int) substr($us, 3, 4);
$nous++; 
$user = "USR";
$id_user = $user . sprintf("%04s", $nous);

$sqlrolus = mysqli_query($koneksi, "SELECT max(id_rols_user) AS maxCode FROM tb_rols_user");
$dtrolus = mysqli_fetch_array($sqlrolus);
$rolus = $dtrolus['maxCode'];
$norolus = (int) substr($rolus, 4, 4);
$norolus++; 
$roluser = "ROLS";
$id_rols_user = $roluser . sprintf("%04s", $norolus);

$sqlspc = mysqli_query($koneksi, "SELECT max(id_specialis) AS maxCode FROM tb_specialis");
$dtspc = mysqli_fetch_array($sqlspc);
$spc = $dtspc['maxCode'];
$nospc = (int) substr($spc, 3, 3);
$nospc++; 
$spcuser = "SPC";
$id_specialis = $spcuser . sprintf("%03s", $nospc);
?>
<div class="row">
	<div class="col-sm-12">
		<div class="card mt-2">
			<div class="card-header bg-blue">
				<h5>Data Dokter</h5>
			</div>
			<div class="card-body">
				<div class="row">
				<div class="col-sm-6 mb-2">
					<a href="" class="btn bg-blue" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-user-plus"></i> Add Dokter</a>
					<a href="" class="btn bg-blue" data-toggle="modal" data-target="#modal-sm"><i class="fa fa-plus"></i> Add Specialis</a>
          <a href="" class="btn bg-blue" data-toggle="modal" data-target="#specialis">Table Specialis</a>
				</div>
				<div class="col-sm-6 mb-2">
					<form class="float-right" action="" method="POST">
				      <div class="input-group input-group-sm">
				        <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search name" aria-label="Search">
				        <div class="input-group-append">
				          <button class="btn bg-blue" type="submit" name="tampil">
				            <i class="fas fa-search"></i>
				          </button>
				        </div>
				      </div>
				    </form>
				</div>	
				</div>
				<div class="table-responsive" style="height: 450px;">
					<table class="table table-hover table-bordered">
						<thead class="bg-success">
							<tr>
								<th>ID User</th>
								<th>Nama User</th>
								<th>Jenis kelamin</th>
								<th>Tempat Lahir</th>
								<th>Tanggal Lahir</th>
								<th>Agama</th>
								<th>Gol Darah</th>
								<th>Specialis</th>
								<th>Tanggal Masuk</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						if (isset($_POST['tampil'])) {
							$search = $_POST['search'];
							$sql = mysqli_query($koneksi, "SELECT * FROM tb_user X INNER JOIN tb_dokter Y ON y.id_user = x.id_user INNER JOIN tb_specialis z ON z.id_specialis = y.id_specialis WHERE nama_user LIKE '%".$search."%'");
						}else{
							$sql = mysqli_query($koneksi, "SELECT * FROM tb_user X INNER JOIN tb_dokter Y ON y.id_user = x.id_user INNER JOIN tb_specialis z ON z.id_specialis = y.id_specialis");
						}
						
						while ($data = mysqli_fetch_array($sql)) { ?>
							<tr>
								<td><?= $data['id_user']; ?></td>
								<td><?= $data['nama_user']; ?></td>
								<td><?= $data['jenis_kelamin']; ?></td>
								<td><?= $data['tempat_lahir']; ?></td>
								<td><?= $data['tanggal_lahir']; ?></td>
								<td><?= $data['agama']; ?></td>
								<td><?= $data['gol_darah']; ?></td>
								<td><?= "Specialis ".$data['specialis']; ?></td>
								<td><?= $data['tgl_masuk']; ?></td>
								<td>
									<!-- <a href="admin.php?page=edit_dokter&id=" class="btn bg-blue"><i  class="fa fa-edit"></i></a> -->
									<a href="#myDokter" id='custId' data-toggle='modal' data-id="<?= $data['id_user'] ?>" class="btn bg-blue"><i  class="fa fa-edit"></i></a> || <a href="page/admin/proses/proses_delete_dokter.php?id=<?= $data['id_user']; ?>" class="btn bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data dokter ini?')"><i class="fa fa-trash-alt"></i></a>
								</td>
							</tr>
						<?php }
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-lg">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Input Dokter Baru</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="page/admin/proses/proses_user_dokter.php" method="POST">
    <div class="modal-body">
      <div class="row">
      	<div class="col-sm-3">
      		<div class="form-group">
      			<label>ID User</label>
      			<input type="text" name="id_user" class="form-control" value="<?= $id_user; ?>" readonly>
      		</div>
      		<div class="form-group">
      			<label>ID Rols User</label>
      			<input type="text" name="id_rols_user" class="form-control" value="<?= $id_rols_user; ?>" readonly>
      		</div>
      		<div class="form-group">
      			<label>Bagian</label>
      			<select class="form-control" name="id_bagian">
      				<?php 
      				$sqlbg = mysqli_query($koneksi, "SELECT * FROM tb_bagian");
      				while ($bg = mysqli_fetch_array($sqlbg)) { 
  					if ($bg['id_bagian'] == 'BG003') { ?>
  						<option value="<?= $bg['id_bagian']; ?>"><?= $bg['nama_bagian']; ?></option>
  					<?php }
      				} ?>
      			</select>
      		</div>
      	</div>
      	<div class="col-sm-3">
      		<div class="form-group">
      			<label>Username</label>
      			<input type="text" name="username" class="form-control" placeholder="username" required>
      		</div>
      		<div class="form-group">
      			<label>Password</label>
      			<input type="password" name="password" class="form-control" placeholder="password" required>
      		</div>
      		<div class="form-group">
      			<label>Password Confirm</label>
      			<input type="password" name="confirm_password" class="form-control" placeholder="confirm_password" required>
      		</div>
      	</div>
      	<div class="col-sm-3">
      		<div class="form-group">
      			<label>Nama Dokter</label>
      			<input type="text" name="nama_user" class="form-control" placeholder="nama dokter" required>
      		</div>
      		<div class="form-group">
      			<label>Jenis Kelamin</label>
      			<select name="jenis_kelamin" class="form-control" required>
      				<option>-- Pilih --</option>
      				<option value="Laki-laki">Laki-laki</option>
      				<option value="Perempuan">Perempuan</option>
      			</select>
      		</div>
      		<div class="form-group">
      			<label>Gol Darah</label>
      			<input type="text" name="gol_darah" class="form-control" placeholder="gol darah">
      		</div>
      		<div class="form-group">
      			<label>Specialis</label>
      			<select name="id_specialis" class="form-control-sm select2" style="width: 100%;" required>
  				<?php 
  				$dok = mysqli_query($koneksi, "SELECT * FROM tb_specialis");
  				while ($ddok = mysqli_fetch_array($dok)) { ?>
  					<option value="<?= $ddok['id_specialis']; ?>"><?= $ddok['specialis']; ?></option>
  				<?php }
  				?>
      			</select>
      		</div>
      	</div>
      	<div class="col-sm-3">
      		<div class="form-group">
      			<label>Tempal Lahir</label>
      			<input type="text" name="tempat_lahir" class="form-control" placeholder="tempat_lahir">
      		</div>
      		<div class="form-group">
      			<label>Tanggal Lahir</label>
      			<input type="date" name="tanggal_lahir" class="form-control">
      		</div>
      		<div class="form-group">
      			<label>Agama</label>
      			<input type="text" name="agama" class="form-control" placeholder="agama">
      		</div>
      		<?php 
      		date_default_timezone_set('Asia/Jakarta'); 
			$tgl_masuk = date("Y-m-d h:i:s");
      		?>
      		<div class="form-group">
      			<label>Tgl Masuk</label>
      			<input type="text" name="tgl_masuk" class="form-control" value="<?= $tgl_masuk; ?>" readonly>
      		</div>
      	</div>
      </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
    </div>
	</form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-sm">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Input Specialis Dokter</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="" method="POST">
    <div class="modal-body">
      <div class="form-group">
      	<label>ID Specialis</label>
      	<input type="text" name="id_specialis" class="form-control" value="<?= $id_specialis; ?>" readonly>
      </div>
      <div class="form-group">
      	<label>Specialis</label>
      	<input type="text" name="specialis" class="form-control" placeholder="Specialis">
      </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" name="simpan_specialis" class="btn btn-primary">Save changes</button>
    </div>
	</form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php 
if (isset($_POST['simpan_specialis'])) {
	$id_specialis = $_POST['id_specialis'];
	$specialis = $_POST['specialis'];

	$sql = mysqli_query($koneksi, "INSERT INTO tb_specialis(id_specialis, specialis) VALUES('$id_specialis','$specialis')");
	if ($sql) {
		echo "<script>
		alert('Data berhasil disimpan');
		document.location.href = 'admin.php?page=dokter';
		</script>";
	}else{
		echo "<script>
		alert('Data gagal disimpan');
		document.location.href = 'admin.php?page=dokter';
		</script>";
	}
}
?>

<div class="modal fade" id="myDokter" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="page/admin/proses/proses_edit_dokter.php" method="POST">
                    <div class="modal-header">
				      <h4 class="modal-title">Edit Data Dokter</h4>
				      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				        <span aria-hidden="true">&times;</span>
				      </button>
				    </div>
                    <div class="modal-body">
                        <div class="fetched-datadokter">
                        	<!-- isi form -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn bg-blue" name="simpan" value="Save Changes">
                        <button class="btn bg-red" data-dismiss="modal">Cancel</button>
                    </div>        
                </form>
            </div>
        </div>
    </div>


<div class="modal fade" id="specialis">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Table Specialis</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="" method="POST">
    <div class="modal-body">
      <div class="card">
        <div class="card-header table-responsive p-0" style="height: 450px;">
          <table class="table table-head-fixed text-nowrap font-10">
            <thead>
              <tr>
                <th>ID Specialis</th>
                <th>Specialis</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $sp = mysqli_query($koneksi, "SELECT * FROM tb_specialis");
              while ($dpc = mysqli_fetch_array($sp)) { ?>
                <tr>
                  <td><?= $dpc['id_specialis']; ?></td>
                  <td><?= $dpc['specialis']; ?></td>
                  <td><a href="#editspecialis" data-toggle="modal" data-id="<?= $dpc['id_specialis']; ?>" class="btn bg-blue"><i class="fa fa-edit"></i></a> || <a href="page/admin/proses/proses_delete_specialis.php?id=<?= $dpc['id_specialis']; ?>" class="btn bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data specialis ini?')"><i class="fa fa-trash-alt"></i></a></td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="modal-footer justify-content-between">
      <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" name="simpan_specialis" class="btn btn-primary">Save changes</button> -->
    </div>
  </form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="editspecialis">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Edit Specialis</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form action="page/admin/proses/proses_edit_specialis.php" method="POST">
    <div class="modal-body">
        <div class="fetched-editspecialis">
          <!-- isi form -->
        </div>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" name="simpan_perubahan" class="btn btn-primary">Save changes</button>
    </div>
  </form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->