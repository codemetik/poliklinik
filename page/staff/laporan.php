<div class="row">
	<div class="col-sm-12">
		<ol class="breadcrumb mt-2">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Laporan</li>
        </ol>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-blue">
				<h5 class="card-title">Laporan</h5>
				<div class="card-tools">
				<form action="" method="POST">
					<div class="input-group input-group-sm mb-2" style="width: 250px;">
						<input type="date" name="search" class="form-control float-right">

						<div class="input-group-append">
					      <button type="submit" name="tampil" class="btn btn-default"><i class="fas fa-search"></i></button>
					    </div>
				</form>
				<?php 
				if (isset($_POST['tampil'])) {
					$search = $_POST['search'];
					$sqlser = mysqli_query($koneksi, "SELECT * FROM tb_laporan X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE id_laporan LIKE '%".$search."%' OR nama_user LIKE '%".$search."%' OR tgl_periksa LIKE '%".$search."%' GROUP BY tgl_periksa");
					$dser = mysqli_fetch_array($sqlser);
				}
				?>
					    <div class="input-group-append">
					      <a href="page/staff/print/print_laporan_all.php?idlapall=<?= $dser['tgl_periksa']; ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i></a>
					    </div>

					</div> <!--tutup search form tgl-->
				
				<form action="" method="POST">
				  <div class="input-group input-group-sm" style="width: 150px;">
				    <input type="text" name="search" class="form-control float-right" placeholder="Search ..." autofocus>

				    <div class="input-group-append">
				      <button type="submit" name="tampil" class="btn btn-default"><i class="fas fa-search"></i></button>
				    </div>
				  </div>
				</form>
				</div>
			</div>
			<div class="card-body table-responsive p-0" style="height: 450px;">
				<table class="table table-head-fixed text-nowrap font-10">
					<thead>
						<tr>
							<th>ID Laporan</th>
							<th>Nama Pasien</th>
							<th>Dokter</th>
							<th>No Rekam Medis</th>
							<th>No Antrian</th>
							<th>Hari Periksa</th>
							<th>Tangga Periksa</th>
							<th>Waktu</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					if (isset($_POST['tampil'])) {
						$search = $_POST['search'];
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_laporan X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE id_laporan LIKE '%".$search."%' OR nama_user LIKE '%".$search."%' OR tgl_periksa LIKE '%".$search."%'");
					}else{
						$sql = mysqli_query($koneksi, "SELECT * FROM tb_laporan X INNER JOIN tb_user Y ON y.id_user = x.id_user");
					}
					while ($data = mysqli_fetch_array($sql)) { ?>
						<tr>
							<td><?= $data['id_laporan']; ?></td>
							<td><?= $data['nama_user']; ?></td>
							<td><?= $data['id_dokter']; ?></td>
							<td><?= $data['no_rekam_medis']; ?></td>
							<td><?= $data['no_antrian']; ?></td>
							<td><?= $data['hari_periksa_pasien']; ?></td>
							<td><?= $data['tgl_periksa']; ?></td>
							<td><?= $data['waktu_mulai_antri']." - ".$data['waktu_selesai_periksa']; ?></td>
							<td><a href="page/staff/print/print_laporan.php?idlap=<?= $data['id_laporan']; ?>" target="_blank" class="btn bg-blue"><i class="fa fa-print"></i></a></td>
						</tr>
					<?php }
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>