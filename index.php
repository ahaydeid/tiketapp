<?php
  session_start();
  if (!isset($_SESSION['username'])){
      header("Location: login.php");
  }
  include "conf/conn.php";

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tiketku | <?php echo $_SESSION['nama'];?> </title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/font-awsome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

<!-- select2 -->
<link rel="stylesheet" href="plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- partialview untuk header -->
  <?php include "partialview/header.php"; ?>
  <!-- partialview untuk sidebar -->
  <?php include "partialview/sidebar.php"; ?>
  
  <!-- partialview untuk main -->
  <?php
            if (isset($_GET['page'])) {
            $page = $_GET['page'];
            switch ($page) {
                // Kategori
                case 'data_kategori':
                include 'pages/kategori/kategoridata.php';
                break; 

                case 'add_kategori':
                include 'pages/kategori/kategoriadd.php';
                break;

                case 'ubah_kategori':
                  include 'pages/kategori/kategoriubah.php';
                  break;

                case 'hapus_kategori':
                  include 'pages/kategori/kategorihapus.php';
                  break;
                
                // User
                case 'data_user':
                  include 'pages/user/datauser.php';
                  break;
                case 'tambah_user':
                  include 'pages/user/tambahuser.php';
                  break;  
                case 'ubah_user':
                  include 'pages/user/ubahuser.php';
                  break;
                case 'hapus_user':
                  include 'pages/user/userhapus.php';
                    break;

                // Tiket
                case 'data_tiket':
                  include 'pages/tiket/datatiket.php';
                  break;
                
                case 'datatiket_users':
                    include 'pages/tiket/datatiket_users.php';
                    break;
                case 'add_tiket':
                      include 'pages/tiket/tiketadd.php';
                      break;
                case 'ubah_tiket':
                        include 'pages/tiket/tiketubah.php';
                        break;
                case 'hapus_tiket':
                          include 'pages/tiket/tikethapus.php';
                          break;

                // Report
                case 'report_tiket_users':
                  include 'pages/report/report_tiket_users.php';
                  break;

                // Report Tiket Admin
                 case 'report_tiket_admin':
                 include 'pages/report/report_tiket_admin.php';
                 break;
                


            }
            } else {

              if($_SESSION['akses'] == 'Admin'){
                include "partialview/main.php";
              } else{
                include "partialview/mainusers.php";
              }
            }
            ?>

  
  <!-- partialview untuk footer -->
  <?php include "partialview/footer.php"; ?>
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
 <!-- partialview untuk js -->
 <?php include "partialview/js.php"; ?>
</body>
</html>
