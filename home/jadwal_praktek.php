<div class="row mt-2">
	<div class="col-sm-12">
		<ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Jadwal Paraktek</li>
        </ol>
	</div>
</div>
<div class="card">
	<div class="card-header bg-blue">
		<h5 class="card-title">Jadwal Praktek</h5>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
				<div class="table-responsive p-0" style="height: 450px;">
					<table class="table table-head-fixed text-nowrap font-10">
						<thead>
							<tr>
								<th>ID Dokter</th>
								<th>Nama Dokter</th>
								<th>Specialis</th>
								<th>Hari</th>
								<th>Waktu</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$sqls = mysqli_query($koneksi, "SELECT * FROM tb_jadwal_praktek X INNER JOIN tb_dokter Y ON y.id_dokter = x.id_dokter INNER JOIN tb_specialis z ON z.id_specialis = x.id_specialis INNER JOIN tb_user a ON a.id_user = y.id_user");
						while ($ds = mysqli_fetch_array($sqls)) { ?>
							<tr>
								<td><?= $ds['id_dokter']; ?></td>
								<td><?= $ds['nama_user']; ?></td>
								<td><?= $ds['specialis']; ?></td>
								<td><?= $ds['hari_awal']." - ".$ds['hari_akhir']; ?></td>
								<td><?= $ds['waktu_buka']." - ".$ds['waktu_tutup']; ?></td>
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