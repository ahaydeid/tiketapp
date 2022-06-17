<?php
                  include "conf/conn.php";
                  $query = mysqli_query($mysqli, "SELECT
                  tiket.notiket, 
                  tiket.tanggal, 
                  tiket.judul, 
                  tiket.deskripsi, 
                  kategori.kategori, 
                  tiket.kodekategori, 
                  tiket.username, 
                  tiket.status,
                  kategori.kategori
              FROM
                  tiket
                  INNER JOIN
                  kategori
                  ON 
                      kategori.kodekategori = tiket.kodekategori
             WHERE tiket.notiket = '".$_GET['notiket']."'");
                  $row = mysqli_fetch_array($query);
                  ?>

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
        <div class="row">
          <div class="col-6">

          

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Buat Tiket</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <form role="form" method="post" action="pages/tiket/tikethapus_proses.php">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>No Tiket</label>
                                        <input type="text" name="notiket" id="notiket" class="form-control" placeholder="No Tiket" value="<?php echo $row ['notiket'] ?>" required readonly>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>judul</label>
                                        <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul" value="<?php echo $row ['judul']?>" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5" readonly><?php echo $row ['deskripsi'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Kategori</label>
                                    <input type="text" name="kategori" id="kategori" class="form-control" palceholder="Kategori" value="<?php echo $row ['kategori']?>"required readonly>
                                    </div>
                                    <div class="form-group">
                                      <label>Status</label>
                                      <input type="text" name="status" id="status" class="form-control" palceholder value="<?php echo $row ['status']?>" required readonly>
                                    </select>
                                    </div>
                                 </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="delete" class="btn btn-danger" title="Hapus Data"> <i class="fa fa-refresh"></i> Hapus</button>
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
  <!-- partialview untuk js -->
 <?php include "partialview/js.php"; ?>
  <script>
    $(function () {
      $('.select2').select2();
    });
  </script>
 
  <!-- /.content-wrapper -->