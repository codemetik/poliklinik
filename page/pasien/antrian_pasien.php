<div class="row mt-2">
	<div class="col-sm-12">
		<ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Antrian Pasien</li>
        </ol>
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		
	</div>
	<div class="col-sm-4">
		<div class="card">
			<div class="card-header bg-green">
				<h5 class="card-title"> Antrian Anda</h5>
			</div>
			<div class="card-body text-center">
				<?php 
				$minantri = mysqli_query($koneksi, "SELECT id_user, IF(nomor_antri = '','Tidak Ada',nomor_antri) AS nomer, 
IF(nomor_antri = '', 'Tidak Ada',
IF((SELECT MIN(nomor_antri) FROM tb_pasien WHERE nomor_antri != '') = nomor_antri, 'Sedang di Proses', 
CONCAT((SELECT COUNT(*) FROM tb_pasien WHERE nomor_antri != '') - 1,' Orang Lagi')
)
) AS keterangan_periksa,
IF(
(SELECT MIN(nomor_antri) FROM tb_pasien WHERE nomor_antri != '') = nomor_antri, 
'Sedang Proses Periksa ',IF(nomor_antri = '','Anda Sedang tidak dalam Antrian','Menunggu')
) AS status_periksa
FROM tb_pasien WHERE id_user = '".$_SESSION['id_user']."' ORDER BY id_pasien ASC");
            	$cek = mysqli_fetch_array($minantri);
				?>
				<p>Berikut ID User Anda : <b><?= $_SESSION['id_user']; ?></b></p>
				<p class="mb-0">Nomer Antrian :</p>
				<b><h2><?= $cek['nomer']; ?></h2></b>
				<p class="mb-0">Status Periksa :</p>
				<b><h2><?= $cek['status_periksa']; ?></h2></b>
				<p class="mb-0">Keterangan :</p>
				<b><h2><?= $cek['keterangan_periksa']; ?></h2></b>
			</div>
		</div>
		<div class="card card-body text-center">
			<h5><a href="page/pasien/proses/download_antrian.php" target="_blank"><i class="fa fa-download"></i> Download</a></h5>
		</div>
	</div>
	<div class="col-sm-4">
		
	</div>
</div>