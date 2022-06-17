<?php
include 'conf/conn.php';
$query = mysqli_query($mysqli, "select * from users where username = '".$_GET['username']."'");
$row = mysqli_fetch_array($query);
?>

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
              <li class="breadcrumb-item active">Hapus User</li>
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
                <h3 class="card-title">Hapus User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <form role="form" method="post" action="pages/user/userhapus_proses.php">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="email" name="username" id="username" class="form-control" placeholder="Username" required value="<?php echo $row ['username']?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" required value="<?php echo $row ['nama']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Akses</label>
                                        <select class="form-control select2" style="width: 100%;" id="akses" name="akses">
                                        <option selected="selected">Admin</option>
                                        <option>user</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                <button type="submit" class="btn btn-danger" title="Hapus Data"> <i class="fa fa-trash"></i> Hapus</button>
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