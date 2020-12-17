  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020-2021 <a href="#">Poliklinik</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.0.1
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->

<script src="plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
        $('#myDokter').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'page/admin/users/detail_dokter.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-datadokter').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
        $('#myAdmin').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'page/admin/users/detail_adminstaff.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-dataadmindanstaff').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
        $('#myPasien').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'page/admin/users/detail_pasien.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-datapasien').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
        $('#pasien').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'page/staff/detail_pasien.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-dataperiksapasien').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
        $('#jadwalPraktek').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'page/staff/detail_jadwal_praktek.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-datajadwalPraktek').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });

    $(document).ready(function(){
        $('#antrian').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'page/staff/detail_antrian_pasien.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-dataantrian').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
</script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="dist/js/pages/dashboard2.js"></script>
<script src="plugins/select2/js/select2.min.js"></script>

<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script>
$(function () {
    $('.select2').select2()

    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

})
</script>
</body>
</html>