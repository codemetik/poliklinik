<?php 
include "../../koneksi.php";
if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = mysqli_query($koneksi, "SELECT id_pasien, id_dokter, x.id_user, nama_user, jenis_kelamin, gol_darah, tempat_lahir, tanggal_lahir, TIMESTAMPDIFF(YEAR,tanggal_lahir, NOW()) AS umur, agama, tgl_masuk, no_antrian, no_rekam_medis,hari,waktu FROM tb_user X LEFT JOIN tb_pasien Y ON y.id_user = x.id_user INNER JOIN tb_rols_user z ON z.id_user = x.id_user WHERE id_bagian = 'BG004' AND x.id_user = '$id' GROUP BY no_antrian DESC");
        while($data = mysqli_fetch_array($sql)) { ?>
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>ID User</label>
                        <input type="text" name="id_user" class="form-control" readonly value="<?= $data['id_user']; ?>">
                    </div>
                    <div class="form-group">
                        <label>ID Dokter</label>
                        <input type="text" name="id_dokter" class="form-control" readonly value="<?= $data['id_dokter']; ?>">
                    </div>
                    <div class="form-group">
                        <label>ID Pasien</label>
                        <input type="text" name="id_pasien" class="form-control" readonly value="<?= $data['id_pasien']; ?>">
                    </div>
                </div>
                <div class="col-sm-2">
                    <?php 
                    $sqlsp= mysqli_query($koneksi, "SELECT * FROM tb_dokter X INNER JOIN tb_specialis Y ON y.id_specialis = x.id_specialis INNER JOIN tb_jadwal_praktek a ON a.id_dokter = x.id_dokter INNER JOIN tb_user z ON z.id_user = x.id_user WHERE x.id_dokter = '".$data['id_dokter']."'");
                    $ddok = mysqli_fetch_array($sqlsp);
                    ?>
                    <div class="form-group">
                        <label>ID User Dokter</label>
                        <input type="text" name="id_user_dokter" class="form-control" readonly value="<?= $ddok['id_user']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama Dokter</label>
                        <input type="text" name="nama_dokter" class="form-control" readonly value="<?= $ddok['nama_user']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Specialis</label>
                        <input type="text" name="specialis" class="form-control" readonly value="<?= $ddok['specialis']; ?>">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Hari Praktek Dokter</label>
                        <input type="text" name="" class="form-control" readonly value="<?= $ddok['hari_awal'].'-'.$ddok['hari_akhir']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Waktu Praktek Dokter</label>
                        <input type="text" name="" class="form-control" readonly value="<?= $ddok['waktu_buka'].'-'.$ddok['waktu_tutup']; ?>">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Pasien</label>
                        <input type="text" name="nama_user_pasien" class="form-control" readonly value="<?= $data['nama_user']; ?>">
                    </div>        
                </div>
            </div>
        <?php
        }
    }
?>