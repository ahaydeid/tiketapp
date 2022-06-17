<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Hadi cust</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard Tiket</p>
                </a>
              </li>
            </ul>
          </li>
          
          
          <li class="nav-header">Data</li>
          <?php
          if($_SESSION['akses'] == "Admin")
          {
          
          ?>
          
          <li class="nav-item">
            <a href="./index.php?page=data_kategori" class="nav-link">
              <i class="nav-icon far fa-bookmark"></i>
              <p>
                Kategori
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./index.php?page=data_tiket" class="nav-link">
              <i class="nav-icon fa fa-tags"></i>
              <p>
                Tiket
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./index.php?page=data_user" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="./index.php?page=report_tiket_admin&tanggalawal=''&tanggalakhir=''" class="nav-link">
              <i class="nav-icon fa fa-print"></i>
              <p>
                Report Tiket
              </p>
            </a>

          <?php
          }

          else
        {
          ?>
          
          <li class="nav-item">
            <a href="./index.php?page=datatiket_users" class="nav-link">
              <i class="nav-icon fa fa-tags"></i>
              <p>
                Tiketing
              </p>
            </a>
            <li class="nav-item">
            <a href="./index.php?page=report_tiket_users&tanggalawal=''&tanggalakhir=''" class="nav-link">
              <i class="nav-icon fa fa-print"></i>
              <p>
                Report Tiket
              </p>
            </a>
          </li>

          <?php
        }
        ?>
          <li class="nav-item">
            <a href="action-logout.php" class="nav-link">
              <i class="nav-icon fa fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>