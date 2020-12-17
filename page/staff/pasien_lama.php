<div class="row">
	<div class="col-sm-12">
		<ol class="breadcrumb mt-2">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item">Data Pasien</li>
          <li class="breadcrumb-item active">Data Pasien Lama</li>
        </ol>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-blue">
				<h5 class="card-title">Data Pasien Lama</h5>
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
                                   <th>No</th>
							<th>No Antrian</th>
							<th>No Rekam Medis</th>
							<th>ID User</th>
							<th>Nama User</th>
							<th>Jenis Kelamin</th>
							<th>Gol Darah</th>
							<th>Tanggal Lahir</th>
							<th>Umur</th>
							<th>Agama</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sql = mysqli_query($koneksi, "SELECT no_antrian, no_rekam_medis, x.id_user, nama_user, jenis_kelamin, gol_darah, tanggal_lahir, TIMESTAMPDIFF(YEAR, tanggal_lahir, NOW()) AS usia, agama FROM tb_user X INNER JOIN tb_pasien Y ON y.id_user = x.id_user ORDER BY no_antrian DESC");
                         $no =1;
					while ($data = mysqli_fetch_array($sql)) { ?>
						<tr>
                                   <td><?= $no++; ?></td>
							<td><?= $data['no_antrian']; ?></td>
							<td><?= $data['no_rekam_medis']; ?></td>
							<td><?= $data['id_user']; ?></td>
							<td><?= $data['nama_user']; ?></td>
							<td><?= $data['jenis_kelamin']; ?></td>
							<td><?= $data['gol_darah']; ?></td>
							<td><?= $data['tanggal_lahir']; ?></td>
							<td><?= $data['usia'] ?></td>
							<td><?= $data['agama']; ?></td>
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
	<!-- <div class="col-sm-12">
		<div class="card">
			<div class="card-header bg-dark">
				<h5 class="card-title">Data Pasien Lama</h5>
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
							<th>No Rekam Medis</th>
							<th>Hari Periksa</th>
							<th>Waktu</th>
							<th>Nama Pasien</th>
							<th>Gol Darah</th>
							<th>Tanggal Lahir</th>
							<th>Umur</th>
							<th>Agama</th>
							<th>Tanggal Masuk</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
				</table>
			</div>
		</div>
	</div> -->
</div>

<div class="modal fade" id="pasien" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form action="page/staff/proses/proses_jadwal_periksa.php" method="POST">
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

<?php 
$cekhari = mysqli_query($koneksi, "SELECT IF(WEEKDAY(NOW())= '0','Senin',
IF(WEEKDAY(NOW())='1','Selasa',
IF(WEEKDAY(NOW())='2','Rabu',
IF(WEEKDAY(NOW())='3','Kamis',
IF(WEEKDAY(NOW())='4','Jumat',
IF(WEEKDAY(NOW())='5','Sabtu',
IF(WEEKDAY(NOW())='6','Minggu','Salah'))))))) 
AS hari");
$day = mysqli_fetch_array($cekhari);

if($day['hari'] == "Senin"){
	$senin = "active"; $sabtu=""; $selasa=""; $rabu=""; $kamis=""; $jumat=""; $minggu="";
	$showsenin = "show active"; $showsabtu=""; $showselasa=""; $showrabu=""; $showkamis=""; $showjumat=""; $showminggu="";
	$bgsenin = "bg-blue"; $bgselasa=""; $bgrabu =""; $bgkamis=""; $bgjumat=""; $bgsabtu=""; $bgminggu="";
}else if($day['hari'] == "Selasa"){
	$selasa = "active"; $senin=""; $sabtu=""; $rabu=""; $kamis=""; $jumat=""; $minggu="";
	$showselasa = "show active"; $showsenin=""; $showsabtu=""; $showrabu=""; $showkamis=""; $showjumat=""; $showminggu="";
	$bgselasa = "bg-blue"; $bgsenin=""; $bgrabu =""; $bgkamis=""; $bgjumat=""; $bgsabtu=""; $bgminggu="";
}else if($day['hari'] == "Rabu"){
	$rabu = "active"; $senin=""; $selasa=""; $sabtu=""; $kamis=""; $jumat=""; $minggu="";
	$showrabu = "show active"; $showsenin=""; $showsabtu=""; $showrabu=""; $showkamis=""; $showjumat=""; $showminggu="";
	$bgrabu = "bg-blue"; $bgselasa=""; $bgsenin=""; $bgkamis=""; $bgjumat=""; $bgsabtu=""; $bgminggu="";
}else if($day['hari'] == "Kamis"){
	$kamis = "active"; $senin=""; $selasa=""; $rabu=""; $sabtu=""; $jumat=""; $minggu="";
	$showkamis = "show active"; $showsenin=""; $showselasa=""; $showrabu=""; $showsabtu=""; $showjumat=""; $showminggu="";
	$bgkamis = "bg-blue"; $bgselasa=""; $bgrabu =""; $bgsenin=""; $bgjumat=""; $bgsabtu=""; $bgminggu="";
}else if($day['hari'] == "Jumat"){
	$jumat = "active"; $senin=""; $selasa=""; $rabu=""; $kamis=""; $sabtu=""; $minggu="";
	$showjumat = "show active"; $showsenin=""; $showselasa=""; $showrabu=""; $showkamis=""; $showsabtu=""; $showminggu="";
	$bgjumat = "bg-blue"; $bgselasa=""; $bgrabu =""; $bgkamis=""; $bgsenin=""; $bgsabtu=""; $bgminggu="";
}else if($day['hari'] == "Sabtu"){
	$sabtu = "active"; $senin=""; $selasa=""; $rabu=""; $kamis=""; $jumat=""; $minggu="";
	$showsabtu = "show active"; $showsenin=""; $showselasa=""; $showrabu=""; $showkamis=""; $showjumat=""; $showminggu="";
	$bgsabtu = "bg-blue"; $bgselasa=""; $bgrabu =""; $bgkamis=""; $bgjumat=""; $bgsenin=""; $bgminggu="";
}else if($day['hari'] == "Minggu"){
	$minggu = "active"; $senin=""; $selasa=""; $rabu=""; $kamis=""; $jumat=""; $sabtu="";
	$showminggu = "show active"; $showsenin=""; $showselasa=""; $showrabu=""; $showkamis=""; $showjumat=""; $showsabtu="";
	$bgminggu = "bg-blue"; $bgselasa=""; $bgrabu =""; $bgkamis=""; $bgjumat=""; $bgsabtu=""; $bgsenin="";
}
?>
<div class="card">
	<div class="card-header bg-blue">
		<h4>Data Pasien Mendaftar</h4>	
	</div>
    <div class="card-body">
		<div class="row">
      <div class="col-5 col-sm-3">
        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link <?= $senin." ".$bgsenin; ?>" id="vert-tabs-senin-tab" data-toggle="pill" href="#vert-tabs-senin" role="tab" aria-controls="vert-tabs-senin" aria-selected="true">Senin</a>
          <a class="nav-link <?= $selasa." ".$bgselasa; ?>" id="vert-tabs-selasa-tab" data-toggle="pill" href="#vert-tabs-selasa" role="tab" aria-controls="vert-tabs-selasa" aria-selected="false">Selasa</a>
          <a class="nav-link <?= $rabu." ".$bgrabu; ?>" id="vert-tabs-rabu-tab" data-toggle="pill" href="#vert-tabs-rabu" role="tab" aria-controls="vert-tabs-rabu" aria-selected="false">Rabu</a>
          <a class="nav-link <?= $kamis." ".$bgkamis; ?>" id="vert-tabs-kamis-tab" data-toggle="pill" href="#vert-tabs-kamis" role="tab" aria-controls="vert-tabs-kamis" aria-selected="false">Kamis</a>
          <a class="nav-link <?= $jumat." ".$bgjumat; ?>" id="vert-tabs-jumat-tab" data-toggle="pill" href="#vert-tabs-jumat" role="tab" aria-controls="vert-tabs-jumat" aria-selected="false">Jumat</a>
          <a class="nav-link <?= $sabtu." ".$bgsabtu; ?>" id="vert-tabs-sabtu-tab" data-toggle="pill" href="#vert-tabs-sabtu" role="tab" aria-controls="vert-tabs-sabtu" aria-selected="false">Sabtu</a>
          <a class="nav-link <?= $minggu." ".$bgminggu; ?>" id="vert-tabs-minggu-tab" data-toggle="pill" href="#vert-tabs-minggu" role="tab" aria-controls="vert-tabs-minggu" aria-selected="false">Minggu</a>
        </div>
      </div>
      <div class="col-7 col-sm-9">
        <div class="tab-content" id="vert-tabs-tabContent">
          <!-- Tab Senin -->
          <div class="tab-pane text-left fade <?= $showsenin; ?>" id="vert-tabs-senin" role="tabpanel" aria-labelledby="vert-tabs-senin-tab">
          <table class="table table-responsive p-0 table-hover" style="height: 350px;">
          	<thead class="bg-blue">
          		<tr>
          			<th>ID Pasien</th>
          			<th>Nama Pasien</th>
          			<th>Nomor Antri</th>
          			<th>No Rekam Medis</th>
          			<th>Hari Periksa</th>
          			<th>Waktu</th>
                         <th>Action</th>
          		</tr>
          	</thead>
          	<tbody>
          		<?php 
          		$sqla = mysqli_query($koneksi, "SELECT * FROM tb_pasien X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE hari_periksa = 'Senin' GROUP BY nomor_antri DESC");
          		while ($dta = mysqli_fetch_array($sqla)) {
          				echo "<tr>
          				<td>".$dta['id_pasien']."</td>
          				<td>".$dta['nama_user']."</td>
          				<td>".$dta['nomor_antri']."</td>
          				<td>".$dta['no_rekam_medis']."</td>
          				<td>".$dta['hari_periksa']."</td>
          				<td>".$dta['waktu']."</td>"; ?>
                              <td><a href="#antrian" data-toggle='modal' data-id="<?= $dta['id_user'] ?>" class="btn bg-blue"><i class="fa fa-edit"></i></a></td>
          				<?php echo "</tr>";
          		}
          		?>
          	</tbody>
          </table>
          </div> 
          <!-- /Tab Senin -->
          <!-- Tab Selasa -->
          <div class="tab-pane fade <?= $showselasa; ?>" id="vert-tabs-selasa" role="tabpanel" aria-labelledby="vert-tabs-selasa-tab">
          <table class="table table-responsive p-0 table-hover" style="height: 350px;">
          	<thead class="bg-blue">
          		<tr>
          			<th>ID Pasien</th>
          			<th>Nama Pasien</th>
          			<th>Nomor Antri</th>
          			<th>No Rekam Medis</th>
          			<th>Hari Periksa</th>
          			<th>Waktu</th>
                         <th>Action</th>
          		</tr>
          	</thead>
          	<tbody>
          		<?php 
          		$sqla = mysqli_query($koneksi, "SELECT * FROM tb_pasien X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE hari_periksa = 'Selasa' GROUP BY nomor_antri DESC");
          		while ($dta = mysqli_fetch_array($sqla)) {
          				echo "<tr>
          				<td>".$dta['id_pasien']."</td>
          				<td>".$dta['nama_user']."</td>
          				<td>".$dta['nomor_antri']."</td>
          				<td>".$dta['no_rekam_medis']."</td>
          				<td>".$dta['hari_periksa']."</td>
          				<td>".$dta['waktu']."</td>"; ?>
          				<td><a href="" class="btn bg-blue"><i class="fa fa-edit"></i></a></td>
                              <?php echo "</tr>";
          		}
          		?>
          	</tbody>
          </table>
          </div>
          <!-- /Tab Selasa -->
          <!-- Tab Rabu  -->
          <div class="tab-pane fade <?= $showrabu; ?>" id="vert-tabs-rabu" role="tabpanel" aria-labelledby="vert-tabs-rabu-tab">
          <table class="table table-responsive p-0 table-hover" style="height: 350px;">
          	<thead class="bg-blue">
          		<tr>
          			<th>ID Pasien</th>
          			<th>Nama Pasien</th>
          			<th>Nomor Antri</th>
          			<th>No Rekam Medis</th>
          			<th>Hari Periksa</th>
          			<th>Waktu</th>
                         <th>Action</th>
          		</tr>
          	</thead>
          	<tbody>
          		<?php 
          		$sqla = mysqli_query($koneksi, "SELECT * FROM tb_pasien X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE hari_periksa = 'Rabu' GROUP BY nomor_antri DESC");
          		while ($dta = mysqli_fetch_array($sqla)) {
          				echo "<tr>
          				<td>".$dta['id_pasien']."</td>
          				<td>".$dta['nama_user']."</td>
          				<td>".$dta['nomor_antri']."</td>
          				<td>".$dta['no_rekam_medis']."</td>
          				<td>".$dta['hari_periksa']."</td>
          				<td>".$dta['waktu']."</td>"; ?>
                              <td><a href="" class="btn bg-blue"><i class="fa fa-edit"></i></a></td>
          				<?php echo "</tr>";
          		}
          		?>
          	</tbody>
          </table>
          </div>
          <!-- /Tab Rabu  -->
          <!-- Tab Kamis -->
          <div class="tab-pane fade <?= $showkamis; ?>" id="vert-tabs-kamis" role="tabpanel" aria-labelledby="vert-tabs-kamis-tab">
          <table class="table table-responsive p-0 table-hover" style="height: 350px;">
          	<thead class="bg-blue">
          		<tr>
          			<th>ID Pasien</th>
          			<th>Nama Pasien</th>
          			<th>Nomor Antri</th>
          			<th>No Rekam Medis</th>
          			<th>Hari Periksa</th>
          			<th>Waktu</th>
                         <th>Action</th>
          		</tr>
          	</thead>
          	<tbody>
          		<?php 
          		$sqla = mysqli_query($koneksi, "SELECT * FROM tb_pasien X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE hari_periksa = 'Kamis' GROUP BY nomor_antri DESC");
          		while ($dta = mysqli_fetch_array($sqla)) {
          				echo "<tr>
          				<td>".$dta['id_pasien']."</td>
          				<td>".$dta['nama_user']."</td>
          				<td>".$dta['nomor_antri']."</td>
          				<td>".$dta['no_rekam_medis']."</td>
          				<td>".$dta['hari_periksa']."</td>
          				<td>".$dta['waktu']."</td>"; ?>
          				<td><a href="" data-toggle='modal' data-id="<?= $dta['id_user'] ?>" class="btn bg-blue"><i class="fa fa-edit"></i></a></td>
                              <?php echo "</tr>";
          		}
          		?>
          	</tbody>
          </table>
          </div>
          <!-- /Tab Kamis -->
          <!-- Tab Jumat -->
          <div class="tab-pane fade <?= $showjumat; ?>" id="vert-tabs-jumat" role="tabpanel" aria-labelledby="vert-tabs-jumat-tab">
          <table class="table table-responsive p-0 table-hover" style="height: 350px;">
          	<thead class="bg-blue">
          		<tr>
          			<th>ID Pasien</th>
          			<th>Nama Pasien</th>
          			<th>Nomor Antri</th>
          			<th>No Rekam Medis</th>
          			<th>Hari Periksa</th>
          			<th>Waktu</th>
                         <th>Action</th>
          		</tr>
          	</thead>
          	<tbody>
          		<?php 
          		$sqla = mysqli_query($koneksi, "SELECT * FROM tb_pasien X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE hari_periksa = 'Jumat' GROUP BY nomor_antri DESC");
          		while ($dta = mysqli_fetch_array($sqla)) {
          				echo "<tr>
          				<td>".$dta['id_pasien']."</td>
          				<td>".$dta['nama_user']."</td>
          				<td>".$dta['nomor_antri']."</td>
          				<td>".$dta['no_rekam_medis']."</td>
          				<td>".$dta['hari_periksa']."</td>
          				<td>".$dta['waktu']."</td>"; ?>
                              <td><a href="" class="btn bg-blue"><i class="fa fa-edit"></i></a></td>
          				<?php echo "</tr>";
          		}
          		?>
          	</tbody>
          </table>
          </div>
          <!-- /Tab Jumat -->
          <!-- Tab Sabtu -->
          <div class="tab-pane fade <?= $showsabtu; ?>" id="vert-tabs-sabtu" role="tabpanel" aria-labelledby="vert-tabs-sabtu-tab">
          <table class="table table-responsive p-0 table-hover" style="height: 350px;">
          	<thead class="bg-blue">
          		<tr>
          			<th>ID Pasien</th>
          			<th>Nama Pasien</th>
          			<th>Nomor Antri</th>
          			<th>No Rekam Medis</th>
          			<th>Hari Periksa</th>
          			<th>Waktu</th>
                         <th>Action</th>
          		</tr>
          	</thead>
          	<tbody>
          		<?php 
          		$sqla = mysqli_query($koneksi, "SELECT * FROM tb_pasien X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE hari_periksa = 'Sabtu' GROUP BY nomor_antri DESC");
          		while ($dta = mysqli_fetch_array($sqla)) {
          				echo "<tr>
          				<td>".$dta['id_pasien']."</td>
          				<td>".$dta['nama_user']."</td>
          				<td>".$dta['nomor_antri']."</td>
          				<td>".$dta['no_rekam_medis']."</td>
          				<td>".$dta['hari_periksa']."</td>
          				<td>".$dta['waktu']."</td>"; ?>
                              <td><a href="" class="btn bg-blue"><i class="fa fa-edit"></i></a></td>
          				<?php echo "</tr>";
          		}
          		?>
          	</tbody>
          </table>
          </div>
          <!-- /Tab Sabtu -->
          <!-- Tab Minggu -->
          <div class="tab-pane fade <?= $showminggu; ?>" id="vert-tabs-minggu" role="tabpanel" aria-labelledby="vert-tabs-minggu-tab">
          <table class="table table-responsive p-0 table-hover" style="height: 350px;">
          	<thead class="bg-blue">
          		<tr>
          			<th>ID Pasien</th>
          			<th>Nama Pasien</th>
          			<th>Nomor Antri</th>
          			<th>No Rekam Medis</th>
          			<th>Hari Periksa</th>
          			<th>Waktu</th>
                         <th>Action</th>
          		</tr>
          	</thead>
          	<tbody>
          		<?php 
          		$sqla = mysqli_query($koneksi, "SELECT * FROM tb_pasien X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE hari_periksa = 'Minggu' GROUP BY nomor_antri DESC");
          		while ($dta = mysqli_fetch_array($sqla)) {
          				echo "<tr>
          				<td>".$dta['id_pasien']."</td>
          				<td>".$dta['nama_user']."</td>
          				<td>".$dta['nomor_antri']."</td>
          				<td>".$dta['no_rekam_medis']."</td>
          				<td>".$dta['hari_periksa']."</td>
          				<td>".$dta['waktu']."</td>"; ?>
                              <td><a href="" class="btn bg-blue"><i class="fa fa-edit"></i></a></td>
          				<?php echo "</tr>";
          		}
          		?>
          	</tbody>
          </table>
          </div>
          <!-- /Tab Minggu -->
        </div>
      </div>
    </div>    	
    </div>
</div>

<div class="modal fade" id="antrian" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form action="page/staff/proses/proses_antrian_periksa.php" method="POST">
                    <div class="modal-header bg-blue">
                          <h4 class="modal-title">Input Jadwal Periksa</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    <div class="modal-body">
                        <div class="fetched-dataantrian">
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