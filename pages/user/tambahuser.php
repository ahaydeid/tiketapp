<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                <h3 class="card-title">Tambah User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <form role="form" method="post" action="pages/user/tambahuser_proses.php">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="email" name="username" id="username" class="form-control" placeholder="Username" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Akses</label>
                                        <select class="form-control select2" style="width: 100%;" id="akses" name="akses">
                                        <option selected="selected">Admin</option>
                                        <option>User</option>
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