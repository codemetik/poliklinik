<div class="row">
	<div class="col-sm-12">
		<ol class="breadcrumb mt-2">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dokter dan Specialis</li>
        </ol>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-blue">
				<h5 class="card-title">Data Dokter & Specialis</h5>
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
				<table class="table table-head-fixed text-nowrap font-10">
					<thead>
						<tr>
							<th>Specialis</th>
							<th>Nama Dokter</th>
							<th>Jenis Kelamin</th>
							<th>Tanggal Lahir</th>
							<th>Umur</th>
							<th>Gol Darah</th>
							<th>Agama</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					if (isset($_POST['tampil'])) {
						$search = $_POST['search'];
						$sql = mysqli_query($koneksi, "SELECT x.id_specialis, specialis, IFNULL(z.id_user,'kosong') AS id_user ,IFNULL(id_dokter,'kosong') AS id_dokter, CONCAT('Dr. ',IFNULL(nama_user,'kosong')) AS nama_user, IFNULL(jenis_kelamin,'kosong') AS jenis_kelamin, IFNULL(TIMESTAMPDIFF(YEAR,tanggal_lahir,NOW()),'kosong') AS umur, IFNULL(gol_darah,'kosong') AS gol_darah, IFNULL(tempat_lahir,'kosong') AS tempat_lahir, IFNULL(tanggal_lahir,'kosong') AS tanggal_lahir, IFNULL(agama,'kosong') AS agama, IFNULL(tgl_masuk,'kosong') AS tgl_masuk FROM tb_specialis X LEFT JOIN tb_dokter Y ON y.id_specialis = x.id_specialis LEFT JOIN tb_user z ON z.id_user = y.id_user WHERE x.id_specialis LIKE '%".$search."%' OR specialis LIKE '%".$search."%' OR nama_user LIKE '%".$search."%'  ORDER BY id_specialis ASC");
					}else{
						$sql = mysqli_query($koneksi, "SELECT x.id_specialis, specialis, IFNULL(z.id_user,'kosong') AS id_user ,IFNULL(id_dokter,'kosong') AS id_dokter, CONCAT('Dr. ',IFNULL(nama_user,'kosong')) AS nama_user, IFNULL(jenis_kelamin,'kosong') AS jenis_kelamin, IFNULL(TIMESTAMPDIFF(YEAR,tanggal_lahir,NOW()),'kosong') AS umur, IFNULL(gol_darah,'kosong') AS gol_darah, IFNULL(tempat_lahir,'kosong') AS tempat_lahir, IFNULL(tanggal_lahir,'kosong') AS tanggal_lahir, IFNULL(agama,'kosong') AS agama, IFNULL(tgl_masuk,'kosong') AS tgl_masuk FROM tb_specialis X LEFT JOIN tb_dokter Y ON y.id_specialis = x.id_specialis LEFT JOIN tb_user z ON z.id_user = y.id_user ORDER BY id_specialis ASC");
					}

					while ($data = mysqli_fetch_array($sql)) { ?>
						<tr>
							<td><?= $data['specialis']; ?></td>
							<td><?= $data['nama_user']; ?></td>
							<td><?= $data['jenis_kelamin']; ?></td>
							<td><?= $data['tanggal_lahir']; ?></td>
							<td><?= $data['umur']; ?></td>
							<td><?= $data['gol_darah']; ?></td>
							<td><?= $data['agama']; ?></td>
						</tr>
					<?php }
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>