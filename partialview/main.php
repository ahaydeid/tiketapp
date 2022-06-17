<?php
                  include "conf/conn.php";
                  if ($mysqli->connect_errno) {
                  echo "Failed to connect to MySQL: " . $mysqli->connect_error;
                  exit();
                  }
                  $query_tiket = mysqli_query($mysqli, "SELECT COUNT(notiket) as total FROM tiket");
                  $query_open = mysqli_query($mysqli, "SELECT COUNT(notiket) as total_open FROM tiket WHERE status= 'open'");
                  $query_close = mysqli_query($mysqli, "SELECT COUNT(notiket) as total_close FROM tiket WHERE status= 'Close'");
                  $query_users = mysqli_query($mysqli, "SELECT COUNT(username) as total_users FROM users");
                  $chart = mysqli_query($mysqli, "SELECT
                        kt.kategori,
                        count(kt.kategori) as total,
                        kt.warna
                        FROM
                        tiket tk INNER JOIN kategori kt  on tk.kodekategori = kt.kodekategori
                        GROUP BY tk.kodekategori");
                  $bar = mysqli_query($mysqli, "SELECT status, count(status) as total
                        FROM tiket
                        GROUP by status"); 
                  while ($row = mysqli_fetch_array($query_tiket, MYSQLI_ASSOC)) {
 ?>
  <?php
   $totaltiket = $row['total'];
    ?>
    <?php } ?>

    <?php
    while ($row = mysqli_fetch_array($query_open, MYSQLI_ASSOC)) {
      ?>
       <?php
       $totaltiket_open = $row['total_open'];
       ?>
           <?php } ?>

<?php
    while ($row = mysqli_fetch_array($query_close, MYSQLI_ASSOC)) {
      ?>
       <?php
       $totaltiket_close = $row['total_close'];
       ?>
           <?php } ?>

<?php
    while ($row = mysqli_fetch_array($query_users, MYSQLI_ASSOC)) {
      ?>
       <?php
       $total_users = $row['total_users'];
       ?>
           <?php } ?>

<?php
$datakategori = array();
$totalkategori = array();
$warna = array();
while ($row = mysqli_fetch_array($chart, MYSQLI_ASSOC)) {
?>
    <?php
    
    array_push($datakategori,$row['kategori']);
    array_push($totalkategori,$row['total']);
    array_push($warna,$row['warna']);
?>
<?php }
?>

<?php
$databarlabel = array();
$databartotal = array();
while ($row = mysqli_fetch_array($bar, MYSQLI_ASSOC)) {
?>
    <?php
    
    array_push($databarlabel,$row['status']);
    array_push($databartotal,$row['total']);
?>
<?php }
?>
    

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $totaltiket ?> </h3>

                <p>Tiket</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $totaltiket_open ?></h3>

                <p>Tiket Open</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $totaltiket_close ?></h3>

                <p>Tiket Close</p>
              </div>
              <div class="icon">
              <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $total_users ?></h3>

                <p>User</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
        <div class="row">
          <div class="col-md-6">
                      <!-- DONUT CHART -->
                      <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
          <div class="col-md-6">
              <!-- BAR CHART -->
                        <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <!-- /.card -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include "partialview/js.php"; ?>
<script type="text/javascript">
    $(document).ready(function() {
        generateDonut();
        generateBarChart();
    });

    function generateDonut() {
        var datakategori = <?php echo json_encode($datakategori) ?>;
        var totalkategori = <?php echo json_encode($totalkategori) ?>;
        var warna = <?php echo json_encode($warna) ?>;
       
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: datakategori,
            datasets: [{
                data: totalkategori,
                backgroundColor: warna,
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })
    };


    //BAR CHART
    function generateBarChart() {
        var  databarlabel = <?php echo json_encode($databarlabel) ?>;
        var  databartotal = <?php echo json_encode($databartotal) ?>;
        var areaChartData = {
      labels  : databarlabel,
      datasets: [{
          label               : 'Status',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : databartotal,
        }]
    }
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    barChartData.datasets[0] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false,
      scales:{
        xAxes:[{
            barPercentage: 0.4
        }]
      }
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
    };
</script>