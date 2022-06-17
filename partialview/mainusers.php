<?php
include "conf/conn.php";
$username = $_SESSION["username"];
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
$query_tiket = mysqli_query($mysqli, "SELECT COUNT(notiket) as total FROM tiket WHERE username ='$username'");
$query_open = mysqli_query($mysqli, "SELECT COUNT(notiket) as total_open FROM tiket WHERE status = 'Open' and username ='$username'");
$query_close = mysqli_query($mysqli, "SELECT COUNT(notiket) as total_close FROM tiket WHERE status = 'Close' and username ='$username'");
$query_onprogress = mysqli_query($mysqli, "SELECT COUNT(notiket) as total_onprogress FROM tiket WHERE status = 'On Progress' and username ='$username'");
$chart = mysqli_query($mysqli, "SELECT	
                        kt.kategori,
                        count(kt.kategori) as total,
                        kt.warna
                        FROM
                        tiket tk INNER JOIN kategori kt  on tk.kodekategori = kt.kodekategori
                        WHERE
                        tk.username = '$username'
                        GROUP BY tk.kodekategori");
$bar = mysqli_query($mysqli, "SELECT status, count(status) AS total,
                        CASE
                            status
                            WHEN 'Open' THEN
                            '#3434eb'
                            WHEN 'On progres' THEN
                            '#ab6100' ELSE '#00ab53'
                            END as warna
                        FROM tiket where username = '$username'
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
<?php }
?>
<?php
while ($row = mysqli_fetch_array($query_close, MYSQLI_ASSOC)) {
?>
    <?php
    $totaltiket_close = $row['total_close'];
    ?>
<?php }
?>
<?php
while ($row = mysqli_fetch_array($query_onprogress, MYSQLI_ASSOC)) {
?>
    <?php
    $total_onprogress = $row['total_onprogress'];
    ?>
<?php }
?>

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
$databarwarna = array();
while ($row = mysqli_fetch_array($bar, MYSQLI_ASSOC)) {
?>
    <?php
    array_push($databarlabel,$row['status']);
    array_push($databartotal,$row['total']);
    array_push($databarwarna,$row['warna']);
?>
<?php }
?>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
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
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php
                                echo $totaltiket
                                ?></h3>

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
                            <h3><?php
                                echo $totaltiket_close
                                ?></h3>

                            <p>Tiket Close</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php
                                echo $total_onprogress  ?></h3>

                            <p>On Progress</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
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
                        <!-- /.card-body -->
                    </div>
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
</div>
<?php include "partialview/js.php"; ?>
<script type="text/javascript">
    $(document).ready(function() {
        generateDonut();
        GenerateBarNew();

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

    function GenerateBarNew() {
        var databarlabel = <?php echo json_encode($databarlabel) ?>;
        var databartotal = <?php echo json_encode($databartotal) ?>;
        var databarwarna = <?php echo json_encode($databarwarna) ?>;
        var config = {
            type: 'bar',
            data: {                
                labels: databarlabel,
                borderColor: "#fffff",
                datasets: [{
                    label: 'Status',
                    data: databartotal,
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    hoverBorderColor: "#000",
                    backgroundColor: databarwarna,
                    hoverBackgroundColor: databarwarna
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                            stepSize: 1,
                            fontColor: "#000",
                            fontSize: 10
                        },
                        gridLines: {
                            color: "#000",
                            lineWidth: 1,
                            zeroLineColor: "#000",
                            zeroLineWidth: 1
                        },
                        stacked: true
                    }],                    
                    xAxes: [{
                        ticks: {
                            fontColor: "#000",
                            fontSize: 10
                        },
                        gridLines: {
                            color: "#fff",
                            lineWidth: 0
                        },
                        barPercentage: 0.4
                    }],
                    
                },
                responsive: true,
                chartArea: {
                    backgroundColor: 'rgba(251, 85, 85, 0.4)'
                },                
                maintainAspectRatio: false,
                datasetFill: false,
            }
        };

        var ctx = document.getElementById("barChart").getContext("2d");
        new Chart(ctx, config);
    }

    
    
</script>