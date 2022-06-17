<!--- NO TIKET OTOMATIS --->
<?php
  include './conf/conn.php';
  $query = mysqli_query($mysqli, "SELECT max(notiket) as notiket FROM tiket");
  $data = mysqli_fetch_array($query);
  $notiket = $data ['notiket'];
  $urutan = (int) substr($notiket, 3, 3);
  $urutan++;
  $huruf = "TKT";
  $notiket = $huruf . sprintf("%03s", $urutan);

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

              <form role="form" method="post" action="pages/tiket/tiketadd_proses.php">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>No Tiket</label>
                                        <input type="text" name="notiket" id="notiket" class="form-control" placeholder="No Tiket" value="<?php echo $notiket ?>" required readonly>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>judul</label>
                                        <input type="text" name="judul" id="judul" class="form-control" placeholder="Judul" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Kode kategori</label>
                                        <select class="form-control select2" style="width: 100%;" id="kodekategori" name="kodekategori">
                                        <option selected="selected">Pilih Kategori</option>
                                        <?php             
                        $kon = mysqli_connect("localhost",'root',"","dbtiket");
                        if (!$kon){
                          die("Koneksi database gagal:".mysqli_connect_error());
                        }                         
                        $sql="select * from kategori order by kodekategori asc";
                        $hasil=mysqli_query($kon,$sql);
                        $no=0;
                        while ($data = mysqli_fetch_array($hasil)) {
                        $no++;
                      ?>
                        <option value="<?php echo $data['kodekategori'];?>"><?php echo $data['kategori'];?></option>
                      <?php 
                      }
                      ?>          
                                     </select>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="fa fa-save"></i> Simpan</button>
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