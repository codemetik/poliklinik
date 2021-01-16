<div class="row mt-2">
	<div class="col-sm-12">
		<ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Poliklinik</li>
        </ol>
	</div>
</div>
<div class="card">
	<div class="card-header bg-blue">
		<h5>Informasi Poliklinik</h5>
	</div>
	<div class="card-body">
		<p class="text-left">Klinik dalam memberikan pelayanan menyediakan fasilitas dengan beberapa poliklinik. poliklinik yang ada pada klinik Dr. arvianti.</p>
		<ul>
			<?php 
			$sql = mysqli_query($koneksi, "SELECT * FROM tb_specialis");
			while ($data = mysqli_fetch_array($sql)) {
					echo "<li> Poliklinik ".$data['specialis']."</li>";
			}
			?>
		</ul>
	</div>
</div>