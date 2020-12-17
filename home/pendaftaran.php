<div class="row mt-2">
	<div class="col-sm-12">
		<ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Pendaftaran</li>
        </ol>
	</div>
</div>
<div class="card">
	<div class="card-header bg-blue">
		<h5>Pendaftaran</h5>
	</div>
	<div class="card-body">
    <div class="row">
      <div class="col-sm-6">
        <?php 
        $sql = mysqli_query($koneksi, "SELECT * FROM posting_pendaftaran");
        while ($data = mysqli_fetch_array($sql)) { ?>
          <div class="callout callout-danger">
            <h5 class="text-primary"><?= $data['judul']; ?></h5>
            <p><?= $data['deskripsi']; ?></p>
          </div>
        <?php }
        ?>
      </div>
    </div>
  </div>
</div>