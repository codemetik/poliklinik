<div class="row">
	<div class="col-sm-12">
		<div class="card mt-2">
			<div class="card-header bg-blue">
				<h5>Data Dokter</h5>
			</div>
			<div class="card-body">
				<div class="row">
				<div class="col-sm-6 mb-2">
					<a href="" class="btn bg-blue" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-user-plus"></i> Tambah Doker</a>
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
								<th>Nama Dokter</th>
								<th>Jenis kelamin</th>
								<th>Tempat Lahir</th>
								<th>Tanggal Lahir</th>
								<th>Agama</th>
								<th>Specialis</th>
								<th>Tanggal Masuk</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						if (isset($_POST['tampil'])) {
							$search = $_POST['search'];
							$sql = mysqli_query($koneksi, "SELECT * FROM tb_profile_dokter X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_bagian a ON a.id_bagian = z.id_bagian WHERE nama_dokter LIKE '%".$search."%'");
						}else{
							$sql = mysqli_query($koneksi, "SELECT * FROM tb_profile_dokter X INNER JOIN tb_user Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user INNER JOIN tb_bagian a ON a.id_bagian = z.id_bagian");
						}
						
						while ($data = mysqli_fetch_array($sql)) { ?>
							<tr>
								<td><?= $data['nama_dokter']; ?></td>
								<td><?= $data['jenis_kelamin']; ?></td>
								<td><?= $data['tempat_lahir']; ?></td>
								<td><?= $data['tanggal_lahir']; ?></td>
								<td><?= $data['agama']; ?></td>
								<td><?= $data['specialis']; ?></td>
								<td><?= $data['tgl_masuk']; ?></td>
								<td>
									<a href="" class="btn bg-blue"><i  class="fa fa-edit"></i></a> || <a href="" class="btn bg-danger"><i class="fa fa-trash-alt"></i></a>
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
      <h4 class="modal-title">Input Data Dokter Baru</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>One fine body&hellip;</p>
    </div>
    <div class="modal-footer justify-content-between">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save changes</button>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->