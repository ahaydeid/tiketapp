
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tiket</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
              <li class="breadcrumb-item active">Tiket</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <a href="index.php?page=add_tiket" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Tiket</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nomor Tiket</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Kode Kategori</th>
                    <th>Username</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <!-- Manggil Database -->
                  <?php
                  include "conf/conn.php";
                  if ($mysqli->connect_errno) {
                  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
                  exit();
                  }
                  $no=0;
                  $username = $_SESSION['username'];
                  $query = mysqli_query($mysqli, "SELECT
                  tiket.notiket, 
                  tiket.tanggal, 
                  tiket.judul, 
                  tiket.deskripsi, 
                  kategori.kategori, 
                  tiket.kodekategori, 
                  tiket.username, 
                  users.nama, 
                  tiket.status
              FROM
                  kategori
                  INNER JOIN
                  tiket
                  ON 
                      kategori.kodekategori = tiket.kodekategori
                  INNER JOIN
                  users
                  ON 
                      tiket.username = users.username WHERE tiket.username = '$username'");
                  while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                  ?>

                  <tr>
                    <td><?php echo $no= $no + 1?></td>
                    <td><?php echo $row ['notiket']?></td>
                    <td><?php echo $row ['tanggal']?></td>
                    <td><?php echo $row ['judul']?></td>
                    <td><?php echo $row ['deskripsi']?></td>
                    <td><?php echo $row ['kodekategori']?></td>
                    <td><?php echo $row ['username']?></td>
                    <td><?php echo $row ['status']?></td>
                  </tr>
                  <?php } ?>
                  </tbody> 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->