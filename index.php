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
          <a href="#" class="dropdown-item">
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
    <a href="index3.html" class="brand-link bg-dark">
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
            <a href="index.php" class="nav-link text-white">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <!-- <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Charts
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/charts/chartjs.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ChartJS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/flot.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Flot</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/charts/inline.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inline</p>
                </a>
              </li>
            </ul>
          </li> -->
        </ul>
        
        <?php 
        if (isset($_SESSION['id_user'])) { ?>
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="?page=dataku" class="nav-link text-white">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  My Data
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?page=jadwal" class="nav-link text-white">
                <i class="nav-icon fas fa-clipboard-list"></i>
                <p>
                  Jadwal
                </p>
              </a>
            </li>
          </ul>
          
        <?php }else{ ?>
          <hr class="bg-dark"> <!--buka pilihan-->
          <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item">
            <a href="?page=contact_us" class="nav-link text-white">
                Register
            </a>
          </li>
        </ul>
        <hr class="bg-dark">
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item"><a href="" class="nav-link text-white">Login</a></li>
          <form action="proses_login.php" method="POST">
            <div class="input-group mb-2">
              <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div> 
            <div class="input-group mb-2">
              <input type="password" class="form-control" name="password" placeholder="Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>  
            <div class="">
            <button type="submit" name="login" class="btn btn-primary btn-block"><i class="fa fa-sign-in-alt"></i> Login</button>
          </div>
          </form>
        </ul>

        <?php }
        ?>
        <hr class="bg-dark"> <!--tutup pilihan-->
        <ul class="nav nav-pills nav-sidebar flex-column">
          <li class="nav-item">
            <a href="?page=contact_us" class="nav-link text-white">
              
                Contact Us
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header bg-dark">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
              <li class="breadcrumb-item"><a href="?page=poliklinik">Poliklinik</a></li>
              <li class="breadcrumb-item"><a href="?page=jadwal_praktek">Jadwal Praktek</a></li>
              <?php 
              if (isset($_SESSION['id_user'])) {
                
              }else{ ?>
                <li class="breadcrumb-item"><a href="?page=pendaftaran">Pendaftaran</a></li>
              <?php }
              ?>
              <li class="breadcrumb-item"><a href="?page=layanan">Layanan</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- isi content -->
        <?php 
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
          switch ($page) {
            case 'home':
              include "home.php";
              break;
            case 'poliklinik':
              include "home/poliklinik.php";
              break;
            case 'jadwal_praktek':
              include "home/jadwal_praktek.php";
              break;
            case 'pendaftaran':
              include "home/pendaftaran_pasien.php";
              break;
            case 'layanan':
              include "home/informasi_pelayanan.php";
              break;
            case 'jadwal':
              include "page/pasien/jadwal.php";
              break;
            case 'contact_us':
              include "contact_us.php";
              break;
            case 'dataku':
              include "page/pasien/dataku.php";
              break;
            
            default:
              # code...
              break;
          }
        }else{
          include "home.php";
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