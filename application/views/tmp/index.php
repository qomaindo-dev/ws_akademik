<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pengelolaan Nilai</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/flat/blue.css');?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/morris/morris.css');?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css');?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css');?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker-bs3.css');?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!--Datables-->
  <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css');?>">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-secondary navbar-dark border-bottom">
        <?php
    if (isset($guru)) {
        foreach ($guru as $data) {
?>
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link"> <b> <?php echo $judul; ?></b></a>
      </li>

    </ul>
    <ul class="navbar-nav ml-auto">
       <li class="nav-item dropdown ">
         <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" width="25px" height="25px" src="<?php echo base_url('assets/images/img/default-profile-image.png')?>" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="<?php echo base_url('assets/images/img/default-profile-image.png')?>" alt="Profile image">
                  <p class="mb-5 mt-3 font-weight-semibold"><?php echo $data->role ?></p>
                  <p class="font-weight-light text-muted mb-0"><?php echo $data->nama ?></p>
                </div>
                <!-- <a href="<?php echo base_url()?>profile/Profile" class="dropdown-item nnavbar-expand bg-primary">Profile<i class="dropdown-item-icon ti-dashboard"></i></a> -->
                <a href="<?php echo base_url()?>login/Login/logout" class="dropdown-item navbar-expand bg-primary">Keluar<i class="dropdown-item-icon ti-power-off"></i></a>
              </div>
       </li>
       <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
    <?php } ?>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-secondary elevation-4">
<!--    
       <?php
      if ($this->session->userdata('role')=='Admin') {
        echo '<a href="' . base_url() . 'dsb/admin" class="logo">';
      }
    ?> -->

   <Brand Logo>
     <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('assets/front/img/tutwuri.png');?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $data->role; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
           <?php if (isset($data->photo)): ?>
              <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url()?>assets/images/guru/<?php echo $data->photo?>" alt="User profile picture">
            <?php else: ?>
             <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url('assets/images/img/default-profile-image.png')?>" alt="User profile picture">

            <?php endif; ?>
        </div>
        <div class="info">
          <a href="<?php echo base_url(); ?>" class="d-block"><?php echo $data->nama ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <?php if($this->session->userdata('role') == "Guru"){ ?>
           <li class="nav-item">
            <a href="<?php echo base_url()?>Beranda" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="<?php echo base_url('JadwalGuru')?>" class="nav-link">
               <i class="fa fa-list-alt nav-icon"></i>
               <p>Jadwal Mengajar</p>
            </a>
          </li> -->
          <li class="nav-item">
            <a href="<?php echo base_url()?>Siswa/datasiswa" class="nav-link">
               <i class="fa fa-id-card nav-icon"></i>
               <p>Daftar Siswa</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>nilai/Nilai" class="nav-link">
               <i class="fa fa-table nav-icon"></i>
               <p>Nilai</p>
            </a>
          </li>
          
            
          <?php }
          else if($this->session->userdata('role') == "Admin"){ 
          ?>
          <li class="nav-item">
            <a href="<?php echo base_url()?>dsb/home" class="nav-link active">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                Master Data
                <i class="right fa fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url()?>Guru" class="nav-link">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Guru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>page_admin/Siswa" class="nav-link">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>Ruang" class="nav-link">
                  <i class="fa fa-university nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
            </ul>
            
         
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-th-large"></i>
              <p>
                Tabel Sekolah
                <i class="right fa fa-angle-right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?php echo base_url()?>Mapel" class="nav-link">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Mata Pelajaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>Jadwal" class="nav-link">
              <i class="nav-icon fa fa-list-alt"></i>
              <p>
                Jadwal Mengajar
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url()?>page_admin/Nilai" class="nav-link">
              <i class="fa fa-file-excel-o nav-icon"></i>
              <p>
               Data Nilai
              </p>
            </a>
          </li>
        </ul>
          
          <li class="nav-item">
            <a href="<?php echo base_url()?>Petugas" class="nav-link">
              <i class="fa fa-user-circle nav-icon"></i>
              <p>
                Petugas
              </p>
            </a>
          </li>


          <?php }else if($this->session->userdata('role') == "Siswa"){ 
          ?>
          <li class="nav-item">
            <a href="<?php echo base_url()?>Petugas" class="nav-link">
              <i class="fa fa-user-circle nav-icon"></i>
              <p>
                Beranda
              </p>
            </a>
          </li>
                    <li class="nav-item">
            <a href="<?php echo base_url()?>Petugas" class="nav-link">
              <i class="fa fa-user-circle nav-icon"></i>
              <p>
                Data Diri
              </p>
            </a>
          </li>
                    <li class="nav-item">
            <a href="<?php echo base_url()?>Petugas" class="nav-link">
              <i class="fa fa-user-circle nav-icon"></i>
              <p>
                Nilai
              </p>
            </a>
          </li>
        

        </ul>
     <?php
        }
    }
?>   
        <!-- /.ul nav-->
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

   
  <!-- Contains page content -->
  <?php echo $content; ?>
  <!-- /.content-page -->
  
  <!-- <footer class="main-footer"><center>
    <strong><a href="#">NNS</a> : 2019</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.0-alpha
    </div></center>
  </footer> -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });  
</script>

<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/jquery/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- Morris.js');?> charts -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js');?>"></script> -->
<script src="<?php echo base_url('assets/plugins/morris/morris.min.js');?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/plugins/sparkline/jquery.sparkline.min.js');?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');?>"></script>
<script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/plugins/knob/jquery.knob.js');?>"></script>
<!-- daterangepicker -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js'"></script> -->
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js');?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js');?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/plugins/fastclick/fastclick.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/dist/js/pages/dashboard.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js');?>"></script>
<!--Datables-->
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
 
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.js')?>"></script>
</body>
</html>
