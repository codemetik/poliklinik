<div class="row">
  <div class="col-sm-6">
    <div class="card mt-2 m-5">
    	<div class="card-header bg-blue">
    		<h5>Pengumuman</h5>
    	</div>
    	<div class="card-body">
    		<p class="text-justify">Praktek dokter umum dan gigi merupakan klinik yang memberikan pelayanan masyarakat dalam bidang kesehatan.</p>
    	</div>
    </div>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <div class="card mt-2 m-0">
      <div class="card-header bg-blue">
        <h5>Antrian Pasien</h5>
      </div>
      <div class="card-body">
        <!-- The time line -->
    <div class="timeline mt-2">
      <!-- timeline time label -->
      <div class="time-label">
        <?php 
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date('d-M-Y');
        ?>
        <span class="bg-red"><?= $tgl; ?></span>
      </div>
      <!-- /.timeline-label -->
      <!-- timeline item -->
      <?php 
      $sqlpasien = mysqli_query($koneksi, "SELECT * FROM tb_pasien X INNER JOIN tb_user Y ON y.id_user = x.id_user WHERE nomor_antri != '' ORDER BY nomor_antri ASC");
      while ($pasien = mysqli_fetch_array($sqlpasien)) { ?>
        <div>
            <i class="fas fa-user bg-gray"></i>
          <div class="timeline-item p-2">
            <?php 
            $minantri = mysqli_query($koneksi, "SELECT MIN(nomor_antri) as antri FROM tb_pasien WHERE nomor_antri != ''");
            $cek = mysqli_fetch_array($minantri);
            if ($pasien['nomor_antri'] == $cek['antri']) {
              echo '<a href="" class="btn bg-green float-right"><i class="fas fa-clock"></i> Sedang Proses Periksa</a>';
            }else{
              echo '<span class="time"><i class="fas fa-clock"></i> Menunggu</span>';
            }

            ?>
            <h3 class="timeline-header no-border"><a href="#"><?= $pasien['nomor_antri']; ?></a> / <?= $pasien['nama_user']; ?></h3>
          </div>
        </div>  
      <?php }
      ?>
      <!-- END timeline item -->
    
    </div>      
      </div>
    </div>
  </div>
</div><!-- /.row -->