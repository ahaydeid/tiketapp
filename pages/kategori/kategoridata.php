<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
              <li class="breadcrumb-item active">Kategori</li>
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
        <div class="row">
          <div class="col-12">

          <a href="index.php?page=add_kategori" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> Tambah</a>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Kategori</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Kategori</th>
                    <th>Kategori</th>
                    <th>Action</th>
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
                  $no = 0;
                  $query = mysqli_query($mysqli, "SELECT * FROM kategori");
                  while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                  ?>

                  <tr>
                    <td><?php echo $no = $no + 1?></td>
                    <td><?php echo $row ['kodekategori']?></td>
                    <td><?php echo $row ['kategori']?></td>
                    <td>

                    <a href="index.php?page=ubah_kategori&kodekategori=<?= $row['kodekategori']; ?>" class="btn btn-success" role="button" title="Ubah Data"><i class="fa fa-edit"></i></a>   

                    <a href="index.php?page=hapus_kategori&kodekategori=<?= $row['kodekategori']; ?>" class="btn btn-danger" role="button" title="Hapus Data"><i class="fa fa-trash"></i></a>  
                    
                    

                    </td>  
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