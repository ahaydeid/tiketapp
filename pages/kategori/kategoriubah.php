<?php
include 'conf/conn.php';
$query = mysqli_query($mysqli, "select * from kategori where kodekategori = '".$_GET['kodekategori']."'");
$row = mysqli_fetch_array($query);
?>

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
              <li class="breadcrumb-item active">Ubah Kategori</li>
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

          

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ubah Kategori</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <form role="form" method="post" action="pages/kategori/kategoriubah_proses.php">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Kode</label>
                                        <input type="text" name="kodekategori" id="kodekategori" class="form-control" placeholder="Kode" required value="<?php echo $row ['kodekategori']?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <input type="text" name="kategori" id="kategori" class="form-control" placeholder="Nama" required value="<?php echo $row ['kategori']?>">
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-success" title="Update Data"> <i class="fa fa-refresh"></i>Update</button>
                                </div>
                            </form>
               
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