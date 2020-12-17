<div class="row">
	<div class="col-sm-12">
		<ol class="breadcrumb mt-2">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Data Pasien</li>
          <li class="breadcrumb-item active">Data Pasien Baru</li>
        </ol>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-blue">
				<h5 class="card-title">Data Pasien Baru</h5>
				<div class="card-tools">
				<form action="" method="POST">
				  <div class="input-group input-group-sm" style="width: 150px;">
				    <input type="text" name="search" class="form-control float-right" placeholder="Search specialis">

				    <div class="input-group-append">
				      <button type="submit" name="tampil" class="btn btn-default"><i class="fas fa-search"></i></button>
				    </div>
				  </div>
				</form>
				</div>
			</div>
			<div class="card-body table-responsive p-0" style="height: 450px;">
				<table class="table table-head-fixed text-nowrap table-hover table-bordered font-10">
					<thead>
						<tr>
							<th>No Antrian</th>
							<th>Hari Daftar</th>
							<th>Nama Pasien</th>
							<th>Jenis Kelamin</th>
							<th>Gol Darah</th>
							<th>Tanggal Lahir</th>
							<th>Umur</th>
							<th>Agama</th>
							<th>Tanggal Masuk</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sql = mysqli_query($koneksi, "SELECT x.id_user,no_antrian, hari AS hari_daftar,username, PASSWORD, confirm_password, nama_user, jenis_kelamin, gol_darah, tempat_lahir, tanggal_lahir, TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) AS usia, agama, tgl_masuk, id_rols_user, id_bagian, y.tgl_user_regis FROM tb_user X INNER JOIN tb_rols_user Y ON y.id_user = x.id_user INNER JOIN tb_pasien_baru z ON z.id_user = x.id_user WHERE id_bagian = 'BG004' GROUP BY no_antrian DESC");
					while ($data = mysqli_fetch_array($sql)) { ?>
						<tr>
							<td><?= $data['no_antrian']; ?></td>
							<td><?= $data['hari_daftar']; ?></td>
							<td><?= $data['nama_user']; ?></td>
							<td><?= $data['jenis_kelamin']; ?></td>
							<td><?= $data['gol_darah']; ?></td>
							<td><?= $data['tanggal_lahir']; ?></td>
							<td><?= $data['usia'] ?></td>
							<td><?= $data['agama']; ?></td>
							<td><?= $data['tgl_masuk']; ?></td>
						</tr>
					<?php }
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>