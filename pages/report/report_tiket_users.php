<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tiket</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        <li class="breadcrumb-item active">Tiket</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Filter Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Periode Awal :</label>
                                <div class="input-group date" id="startdate" data-target-input="nearest">
                                    <input type="text" id="periodestart" class="form-control datetimepicker-input" data-target="#startdate" />
                                    <div class="input-group-append" data-target="#startdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <label for="exampleInputEmail1">Periode Akhir :</label>
                                <div class="input-group date" id="enddate" data-target-input="nearest">
                                    <input type="text" id="periodeend" class="form-control datetimepicker-input" data-target="#enddate" />
                                    <div class="input-group-append" data-target="#enddate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="button" class="btn btn-primary" onclick="tampilkan()">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Tiket <?php echo $_SESSION["username"] ?></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Tiket</th>
                                            <th>Tanggal</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Kategori</th>
                                            <th>Pembuat</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "conf/conn.php";
                                        if ($mysqli->connect_errno) {
                                            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
                                            exit();
                                        }
                                        $no = 0;
                                        $tanggalawal = $_GET['tanggalawal'];
                                        $tanggalakhir = $_GET['tanggalakhir'];
                                        $username = $_SESSION["username"];
                                        $query = mysqli_query($mysqli, "SELECT
                                    tiket.notiket, 
                                    tiket.tanggal, 
                                    tiket.judul, 
                                    tiket.deskripsi, 
                                    tiket.kodekategori, 
                                    tiket.username, 
                                    tiket.status, 
                                    kategori.kategori, 
                                    users.nama
                                FROM
                                    tiket
                                    INNER JOIN
                                    kategori
                                    ON 
                                        tiket.kodekategori = kategori.kodekategori
                                    INNER JOIN
                                    users
                                    ON 
                                        tiket.username = users.username WHERE tiket.username = '$username' and tiket.tanggal >= '$tanggalawal' and tiket.tanggal <= '$tanggalakhir'");
                                        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no = $no + 1 ?></td>
                                                <td><?php echo $row['notiket'] ?>
                                                </td>
                                                <td><?php echo $row['tanggal'] ?></td>
                                                <td><?php echo $row['judul'] ?></td>
                                                <td><?php echo $row['deskripsi'] ?></td>
                                                <td><?php echo $row['kategori'] ?></td>
                                                <td><?php echo $row['nama'] ?></td>
                                                <td><?php echo $row['status'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <!-- /.row (main row) -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php include "partialview/js.php"; ?>
<script>
    $(function() {
        $('#startdate').datetimepicker({
            format: 'L'
        });
        $('#enddate').datetimepicker({
            format: 'L'
        });
        $("#example2").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,
        "buttons": ["csv","excel","pdf","print"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

    })
</script>

<script type="text/javascript">
  function submitFunction() {
      alert("example");
  }
  
  function tampilkan(){
            var startdate =document.getElementById("periodestart").value;  
            var enddate =document.getElementById("periodeend").value;
            var sdate = format(startdate);
            var edate = format(enddate);            
            window.location = "./index.php?page=report_tiket_users&tanggalawal=" + sdate + "&tanggalakhir=" + edate + "";
        }

        function format(date) {
            date = new Date(date);

            var day = ('0' + date.getDate()).slice(-2);
            var month = ('0' + (date.getMonth() + 1)).slice(-2);
            var year = date.getFullYear();

            return year + '-' + month + '-' + day;
            }
</script>