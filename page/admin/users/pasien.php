<div class="row">
	<div class="col-sm-12">
		<div class="card mt-2">
			<div class="card-header bg-blue">
				<h5>Data Pasien</h5>
			</div>
			<div class="card-body">
				<div class="row">
				<div class="col-sm-12 mb-2">
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
								<th>Nama Pasien</th>
								<th>Jenis kelamin</th>
								<th>Tempat Lahir</th>
								<th>Tanggal Lahir</th>
								<th>Agama</th>
								<th>Tanggal Masuk</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						if (isset($_POST['tampil'])) {
							$search = $_POST['search'];
							$sql = mysqli_query($koneksi, "SELECT * FROM tb_user X INNER JOIN tb_rols_user Y ON y.id_user = x.id_user INNER JOIN tb_bagian z ON z.id_bagian = y.id_bagian WHERE y.id_bagian = 'BG004' AND nama_user LIKE '%".$search."%'");
						}else{
							$sql = mysqli_query($koneksi, "SELECT * FROM tb_user X INNER JOIN tb_rols_user Y ON y.id_user = x.id_user INNER JOIN tb_bagian z ON z.id_bagian = y.id_bagian WHERE y.id_bagian = 'BG004'");
						}
						
						while ($data = mysqli_fetch_array($sql)) { ?>
							<tr>
								<td><?= $data['id_user']; ?></td>
								<td><?= $data['nama_user']; ?></td>
								<td><?= $data['jenis_kelamin']; ?></td>
								<td><?= $data['tempat_lahir']; ?></td>
								<td><?= $data['tanggal_lahir']; ?></td>
								<td><?= $data['agama']; ?></td>
								<td><?= $data['tgl_masuk']; ?></td>
								<td>
									<a href="#myPasien" id='custId' data-toggle='modal' data-id="<?= $data['id_user'] ?>" class="btn bg-blue"><i  class="fa fa-edit"></i></a> || <a href="page/admin/proses/proses_delete_pasien.php?id=<?= $data['id_user']; ?>" class="btn bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data pasien ini?')"><i class="fa fa-trash-alt"></i></a>
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

<div class="modal fade" id="myPasien" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="page/admin/proses/proses_edit_pasien.php" method="POST">
                    <div class="modal-header">
				      <h4 class="modal-title">Edit Data Pasien</h4>
				      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				        <span aria-hidden="true">&times;</span>
				      </button>
				    </div>
                    <div class="modal-body">
                        <div class="fetched-datapasien">
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