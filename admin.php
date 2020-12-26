<?php include "header.php"; ?>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <!-- <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <ul class="navbar-nav ml-auto">
      <?php 
      if (isset($_SESSION['id_user'])) { ?>
        
        <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">SETTINGS</span>
          <div class="dropdown-divider"></div>
          <a href="admin.php?page=myadmin" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> <?= $_SESSION['username']; ?>
          </a>
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item">
            <i class="fa fa-sign-out-alt mr-2"></i> Logout
          </a>
          <a href="#" class="dropdown-item dropdown-footer">-</a>
        </div>
      </li>
          
      <?php }else{ 

      }
      ?>
      
    </ul>
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 bg-primary">
    <!-- Brand Logo -->
    <a href="admin.php?page=home_admin" class="brand-link bg-dark">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text text-white">Klinik</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="admin.php?page=home_admin" class="nav-link text-white">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link text-white">
              <i class="nav-icon fa fa-users"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin.php?page=dokter" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dokter</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin.php?page=pasien" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pasien</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin.php?page=staff" class="nav-link text-white">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staff Pendaftaran</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- isi content -->
        <?php 
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
          switch ($page) {
            case 'home_admin':
              include "page/admin/home_admin.php";
              break;
            case 'dokter':
              include "page/admin/users/dokter.php";
              break;
            case 'pasien':
              include "page/admin/users/pasien.php";
              break;
            case 'staff':
              include "page/admin/users/staff.php";
              break;
            case 'myadmin':
              include "page/admin/myadmin.php";
              break;
            case 'contact_us':
              include "contact_us.php";
              break;
            
            default:
              # code...
              break;
          }
        }else{
          include "page/admin/home_admin.php";
        }
        ?>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div> <!--/.wrapper-->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <?php include "footer.php"; ?>