<?php 
include "../../koneksi.php";
if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_jadwal_praktek X INNER JOIN tb_dokter Y ON y.id_dokter = x.id_dokter INNER JOIN tb_specialis z ON z.id_specialis = x.id_specialis INNER JOIN tb_user a ON a.id_user = y.id_user WHERE x.id_dokter = '$id'");
        while($data = mysqli_fetch_array($sql)) { ?>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>ID Jadwal Praktek</label>
                        <input type="text" name="id_jadwal_praktek" class="form-control" readonly value="<?= $data['id_jadwal_praktek']; ?>">
                    </div>
                    <div class="form-group">
                        <label>ID Dokter</label>
                        <input type="text" name="id_dokter" class="form-control" readonly value="<?= $data['id_dokter']; ?>">
                    </div>
                    <div class="form-group">
                        <label>ID Specialis</label>
                        <input type="text" name="id_specialis" class="form-control" readonly value="<?= $data['id_specialis']; ?>">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Nama Dokter</label>
                        <input type="text" name="nama_user" class="form-control" readonly value="<?= $data['nama_user']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Specialis</label>
                        <input type="text" name="specialis" class="form-control" readonly value="<?= $data['specialis']; ?>">
                    </div>    
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Hari</label>
                        <div class="row">
                            <div class="col-sm-6">
                            <select class="form-control" name="hari_awal">
                                <?php 
                                $hr = mysqli_query($koneksi, "SELECT * FROM tb_hari");
                                while ($dh = mysqli_fetch_array($hr)) {
                                    if ($data['hari_awal'] == $dh['nama_hari']) {
                                        $select = "selected";
                                    }else{
                                        $select = "";
                                    }
                                    echo "<option value='".$dh['nama_hari']."' ".$select.">".$dh['nama_hari']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select class="form-control" name="hari_akhir">
                                <?php 
                                $hr = mysqli_query($koneksi, "SELECT * FROM tb_hari");
                                while ($dh = mysqli_fetch_array($hr)) {
                                    if ($data['hari_akhir'] == $dh['nama_hari']) {
                                        $select = "selected";
                                    }else{
                                        $select = "";
                                    }
                                    echo "<option value='".$dh['nama_hari']."' ".$select.">".$dh['nama_hari']."</option>";
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
                                <input type="time" name="waktu_buka" class="form-control" required value="<?= $data['waktu_buka']; ?>">
                            </div>
                            <div class="col-sm-6">
                                <input type="time" name="waktu_tutup" class="form-control" required value="<?= $data['waktu_tutup']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
    }
?>