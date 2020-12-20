<div class="row">
	<div class="col-sm-12">
		<ol class="breadcrumb mt-2">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Jadwal Praktek</li>
        </ol>
	</div>
</div>
<div class="card">
	<div class="card-header bg-blue">
		<h5 class="card-title">Jadwal Praktek</h5>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12 mb-2">
				<a href="" class="btn bg-blue" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus"></i> Add Jadwal</a>
			</div>
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
								<th>Action</th>
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
								<td>
									<a href="#jadwalPraktek" id='custId' data-toggle='modal' data-id="<?= $ds['id_dokter'] ?>" class="btn bg-blue"><i class="fa fa-edit"></i></a> || <a href="page/staff/proses/delete_jadwal_praktek.php?id=<?= $ds['id_jadwal_praktek']; ?>" class="btn bg-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data jadwal praktek ini?')"><i class="fa fa-trash-alt"></i></a>
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

<div class="modal fade" id="modal-lg" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="page/staff/proses/proses_jadwal_praktek.php" method="POST">
                <div class="modal-header">
			      <h4 class="modal-title">Input Jadwal Praktek</h4>
			      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			        <span aria-hidden="true">&times;</span>
			      </button>
			    </div>
                <div class="modal-body">
                    <div class="row">
                    	<div class="col-sm-6">
                    		<div class="form-group">
                    			<label>ID Dokter</label>
                    			<select name="id_dokter" class="form-control-sm select2" style="width: 100%;" onchange='changeValue(this.value)'>
                    				<option>--Pilih--</option>
                    				<?php 
                    				$sql = mysqli_query($koneksi, "SELECT * FROM tb_specialis X INNER JOIN tb_dokter Y ON y.id_specialis = x.id_specialis INNER JOIN tb_user z ON z.id_user = y.id_user");
                    				$jsArray = "var prdName = new Array();\n";
                    				while ($dok = mysqli_fetch_array($sql)) { ?>
                    					<option value="<?= $dok['id_dokter']; ?>"><?= $dok['id_dokter']." | ".$dok['nama_user']; ?></option>
                    				<?php 
                    				$jsArray .= "prdName['" . $dok['id_dokter'] . "'] = {id_specialis:'" . addslashes($dok['id_specialis'])."', specialis:'" . addslashes($dok['specialis'])."'};\n";
                    				}
                    				?>
                    			</select>
                    		</div>
                    		<div class="form-group" hidden>
                    			<label>ID Specialis</label>
                    			<input type="text" name="id_specialis" id="id_specialis" placeholder="id specialis" class="form-control">
                    		</div>
                    		<div class="form-group">
                    			<label>Specialis</label>
                    			<input type="text" name="specialis" id="specialis" placeholder="Specialis" class="form-control" readonly>
                    		</div>
                    	</div>
                    	<div class="col-sm-6">
                    		<div class="form-group">
                    			<label>Hari</label>
                    			<div class="row">
                    				<div class="col-sm-6">
		                    			<select class="form-control" name="hari_awal" required>
		                    				<?php 
		                    				$hr = mysqli_query($koneksi, "SELECT * FROM tb_hari");
		                    				while ($dh = mysqli_fetch_array($hr)) {
		                    					echo "<option value='".$dh['nama_hari']."'>".$dh['nama_hari']."</option>";
		                    				}
		                    				?>
		                    			</select>
                    				</div>
                    				<div class="col-sm-6">
		                    			<select class="form-control" name="hari_akhir" required>
		                    				<?php 
		                    				$hr = mysqli_query($koneksi, "SELECT * FROM tb_hari");
		                    				while ($dh = mysqli_fetch_array($hr)) {
		                    					echo "<option value='".$dh['nama_hari']."'>".$dh['nama_hari']."</option>";
		                    				}
		                    				?>
		                    			</select>
                    				</div>
                    			</div>
                    		</div>
                    		<div class="form-group">
                    			<label>Waktu</label>
                    			<div class="row">
                    				<div class="col-sm-6">
                    					<input type="time" name="waktu_buka" class="form-control" required>
                    				</div>
                    				<div class="col-sm-6">
                    					<input type="time" name="waktu_tutup" class="form-control" required>
                    				</div>
                    			</div>
                    		</div>
			            </div>
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

<div class="modal fade" id="jadwalPraktek" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form action="page/staff/proses/proses_edit_jadwal_praktek.php" method="POST">
                    <div class="modal-header bg-blue">
				      <h4 class="modal-title">Edit Jadwal Praktek</h4>
				      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				        <span aria-hidden="true">&times;</span>
				      </button>
				    </div>
                    <div class="modal-body">
                        <div class="fetched-datajadwalPraktek">
                        	<!-- isi form -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn bg-blue" name="simpan_perubahan" value="Save Changes">
                        <button class="btn bg-red" data-dismiss="modal">Cancel</button>
                    </div>        
                </form>
            </div>
        </div>
    </div>

<script type="text/javascript">
	<?php echo $jsArray; ?>
	function changeValue(id){
	    document.getElementById('id_specialis').value = prdName[id].id_specialis;
	    document.getElementById('specialis').value = prdName[id].specialis;
	};
</script>