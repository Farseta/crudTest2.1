@extends('layouts.admin')


@section('CSS')
@endsection

@section('title')
    Home
@endsection

@section('sideTitle')
    {{ url('home') }}
@endsection

@section('content')
    <div id="controller">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-12">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>
                    {{("$transportation_total")}}
                  </h3>
  
                  <p>Total transportasi dimiliki</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-12">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>
                    {{("$transportation_ready")}}
                  </h3>
  
                  <p>Transportasi siap dipakai</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-12">
                <!-- small box -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <h3>
                      {{("$transportation_unready")}}
                    </h3>
    
                    <p>Transportasi sedang dipakai</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-12">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3>
                      {{("$other_asset_total")}}
                    </h3>
    
                    <p>Total Asset</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
            <!-- ./col -->
          </div>
        <!-- BAR CHART -->
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Grafik Peminjaman Dan Pengembalian</h3>

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
                    <canvas id="barChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection

@section('JS')
<!-- jQuery -->
<script src={{ asset("assets/plugins/jquery/jquery.min.js")}}></script>
<!-- Bootstrap 4 -->

<script src={{ asset("plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
 <!-- ChartJS -->
<script src={{ asset("assets/plugins/chart.js/Chart.min.js")}}></script>


    <script type="text/javascript">
    var data_bar = '{!! json_encode($data_bar)!!}';
    

    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','Agustus','September','October','November','December'],
      datasets: JSON.parse(data_bar),
    }

    
        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        // var temp0 = areaChartData.datasets[0]
        // var temp1 = areaChartData.datasets[1]
        // barChartData.datasets[0] = temp1
        // barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetFill: false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
    </script>
@endsection
