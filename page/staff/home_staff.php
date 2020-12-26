<div class="row">
  <div class="col-sm-12">
    <ol class="breadcrumb mt-2">
          <li class="breadcrumb-item active"><a href="#">Home</a></li>
        </ol>
  </div>
</div>
<div class="row">
  <div class="col-sm-8">
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
            if ($pasien['nomor_antri'] == $cek['antri']) { ?>
              <a href="page/staff/proses/delete_nomorantri.php?id=<?= $pasien['id_pasien']; ?>" class="btn bg-blue float-right" onclick="return confirm('Annda akan melanjutkan antrian!')"><i class="fas fa-clock"></i> Next</a>
            <?php }else{
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
  <div class="col-sm-4">
    <div class="card mt-2">
      <div class="card-header bg-blue">
        <h5>Control Antrian Hari ini Jika Penuh</h5>
      </div>
      <div class="card-body">
        <div class="form-group">
          <?php 
          $sqlon = mysqli_query($koneksi, "SELECT * FROM tb_control");
          $sqloff = mysqli_fetch_array($sqlon);

            if ($sqloff['status'] == 'On') {
              $isi = "Pendaftaran telah Buka";
            }else{
              $isi = 'Pendaftaran telah Tutup';
            }
            echo "<p>".$isi."</p>";
          
          ?>
        </div>
        <form action="" method="POST">
          <div class="form-group">
            <select class="form-control" name="onoff">
              <?php 
              $panel = array('On','Off');
              // $sqlon = mysqli_query($koneksi, "SELECT * FROM tb_control");
              // $sqloff = mysqli_fetch_array($sqlon);
              foreach ($panel as $key) {
                if ($key == $sqloff['status']) {
                 $select = 'selected';
                }else{
                  $select = '';
                }
                echo "<option value='".$key."' ".$select.">".$key."</option>"; 
              }
              ?>
            </select>
          </div>
          <div class="form-group text-center">
            <button type="submit" class="btn bg-blue">Kirim</button>
          </div>
        </form>
      </div>
    </div>
    
  </div>
</div><!-- /.row -->

<?php 
if (isset($_POST['onoff'])) {
  $kirim = $_POST['onoff'];

  if ($kirim == 'On') {
    $isi = "Pendaftaran telah di Buka";
  }else{
    $isi = 'Pendaftaran Telah di Tutup';
  }

  $up = mysqli_query($koneksi, "UPDATE tb_control SET status = '".$kirim."' WHERE id = '1'");
  if ($up) {
    echo "<script>
    alert('".$isi."');
    document.location.href = 'staff.php';
    </script>";
  }else{
    echo "<script>
    alert('Gagal');
    document.location.href = 'staff.php';
    </script>";
  }
}

?>
