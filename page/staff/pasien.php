<div class="row">
	<div class="col-sm-12">
		<ol class="breadcrumb mt-2">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Data Pasien</li>
        </ol>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-blue">
				<h5 class="card-title">Data Pasien</h5>
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
							<th>Nama Pasien</th>
							<th>Jenis Kelamin</th>
							<th>Gol Darah</th>
							<th>Tanggal Lahir</th>
							<th>Umur</th>
							<th>Agama</th>
							<th>Tanggal Masuk</th>
							<th>No Antrian</th>
							<th>No Rekam Medis</th>
							<th>Hari</th>
							<th>Waktu</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sql = mysqli_query($koneksi, "SELECT id_pasien, id_dokter, x.id_user, nama_user, jenis_kelamin, gol_darah, tempat_lahir, tanggal_lahir, TIMESTAMPDIFF(YEAR,tanggal_lahir, NOW()) AS umur, agama, tgl_masuk, no_antrian, no_rekam_medis,hari,waktu FROM tb_user X LEFT JOIN tb_pasien Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user WHERE id_bagian = 'BG004' GROUP BY no_antrian DESC");
					while ($data = mysqli_fetch_array($sql)) { ?>
						<tr>
							<td><?= $data['nama_user']; ?></td>
							<td><?= $data['jenis_kelamin']; ?></td>
							<td><?= $data['gol_darah']; ?></td>
							<td><?= $data['tanggal_lahir']; ?></td>
							<td><?= $data['umur'] ?></td>
							<td><?= $data['agama']; ?></td>
							<td><?= $data['tgl_masuk']; ?></td>
							<td><?= $data['no_antrian']; ?></td>
							<td><?= $data['no_rekam_medis']; ?></td>
							<td><?= $data['hari']; ?></td>
							<td><?= $data['waktu']; ?></td>
							<td>
								<a href="#pasien" id='custId' data-toggle='modal' data-id="<?= $data['id_user'] ?>" class="btn bg-blue"><i class="fa fa-edit"></i></a>
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

<div class="modal fade" id="pasien" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form action="page/admin/proses/proses_edit_dokter.php" method="POST">
                    <div class="modal-header bg-blue">
				      <h4 class="modal-title">Input Jadwal Periksa</h4>
				      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				        <span aria-hidden="true">&times;</span>
				      </button>
				    </div>
                    <div class="modal-body">
                        <div class="fetched-dataperiksapasien">
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