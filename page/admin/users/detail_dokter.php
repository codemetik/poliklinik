<?php 
include "../../../koneksi.php";
if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_user X INNER JOIN tb_rols_user a ON a.id_user = x.id_user INNER JOIN tb_dokter Y ON y.id_user = x.id_user INNER JOIN tb_specialis z ON z.id_specialis = y.id_specialis WHERE x.id_user = '$id' ");
        while($data = mysqli_fetch_array($sql)) { ?>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>ID User</label>
                        <input type="text" name="id_user" class="form-control" value="<?= $data['id_user']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>ID Rols User</label>
                        <input type="text" name="id_rols_user" class="form-control" value="<?= $data['id_rols_user']; ?>" readonly>
                    </div>
                    <div class="form-groupm">
                        <label>Bagian</label>
                        <input type="text" name="id_bagian" class="form-control" value="<?= $data['id_bagian']; ?>" readonly>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $data['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" value="<?= $data['password']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirm_password" class="form-control" value="<?= $data['confirm_password']; ?>">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Nama Dokter</label>
                        <input type="text" name="nama_user" class="form-control" value="<?= $data['nama_user']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin">
                            <?php 
                            $jk = mysqli_query($koneksi, "SELECT * FROM tb_jenis_kelamin");
                            while ($djk = mysqli_fetch_array($jk)) {
                                if ($data['jenis_kelamin'] == $djk['jenis_kelamin']) {
                                    $select = "selected";
                                }else{
                                    $select = "";
                                } 
                                echo "<option value='".$djk['jenis_kelamin']."' ".$select.">".$djk['jenis_kelamin']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gol Darah</label>
                        <input type="text" name="gol_darah" class="form-control" value="<?= $data['gol_darah']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Specialis</label>
                        <select name="id_specialis" class="form-control-sm select2" style="width: 100%;">
                            <?php 
                            $sp = mysqli_query($koneksi, "SELECT * FROM tb_specialis");
                            while ($dsp = mysqli_fetch_array($sp)) {
                                if ($data['id_specialis'] == $dsp['id_specialis']) {
                                    $select1 = "selected"; 
                                }else{
                                    $select1 = "";
                                }
                                echo "<option value='".$dsp['id_specialis']."' ".$select1.">".$dsp['specialis']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="<?= $data['tempat_lahir']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="<?= $data['tanggal_lahir']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Agama</label>
                        <input type="text" name="agama" class="form-control" value="<?= $data['agama']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tgl Masuk</label>
                        <input type="text" name="tgl_masuk" class="form-control" value="<?= $data['tgl_masuk']; ?>" readonly>
                    </div>
                </div>
            </div>
        <?php
        }
    }
?>

<script src="../../plugins/daterangepicker/daterangepicker.js"></script>
<script>
$(function () {
    $('.select2').select2()

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

})
</script>