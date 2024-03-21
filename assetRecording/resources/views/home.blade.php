@extends('layouts.admin')


@section('CSS')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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
                            {{ "$transportation_total" }}
                        </h3>

                        <p>Total transportasi dimiliki</p>
                    </div>
                    <div class="icon">
                        <i><ion-icon name="car-outline"></ion-icon></i>

                    </div>
                    <a href="{{ url('transportations') }}" class="small-box-footer">ke aset mobil <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-12">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>
                            {{ "$transportation_ready" }}
                        </h3>

                        <p>Transportasi siap dipakai</p>
                    </div>
                    <div class="icon">
                        <i><ion-icon name="thumbs-up-outline"></ion-icon></i>
                    </div>
                    <a href="{{ url('vehicleLends') }}" class="small-box-footer">ke peminjaman mobil <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-12">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>
                            {{ "$transportation_unready" }}
                        </h3>

                        <p>Transportasi sedang dipakai</p>
                    </div>
                    <div class="icon">
                        <i><ion-icon name="thumbs-down-outline"></ion-icon></i>
                    </div>
                    <a href="{{ url('vehicleReturns') }}" class="small-box-footer">ke pengembalian mobil <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>
                            {{ "$other_asset_total" }}
                        </h3>

                        <p>Total Asset</p>
                    </div>
                    <div class="icon">
                        <i><ion-icon name="reader-outline"></ion-icon></i>
                    </div>
                    <a href="{{ url('otherAssets') }}" class="small-box-footer">ke asset lainnya <i
                            class="fas fa-arrow-circle-right"></i></a>
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
            <a href="{{ url('print') }}" class="btn btn-primary"> cetak data</a>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection

@section('JS')
    <!-- jQuery -->
    <script src={{ asset('assets/plugins/jquery/jquery.min.js') }}></script>
    <!-- Bootstrap 4 -->

    <script src={{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}></script>
    <!-- ChartJS -->
    <script src={{ asset('assets/plugins/chart.js/Chart.min.js') }}></script>


    <script type="text/javascript">
        var data_bar = '{!! json_encode($data_bar) !!}';


        var areaChartData = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Agustus', 'September', 'October',
                'November', 'December'
            ],
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
    <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-start',
                showConfirmButton: false,
                timer: 20000,
                customClass: {
                    title: 'text-center'
                }
            });

            Toast.fire({
                icon: 'info',
                title: 'now you are loggin as ' + "{{ auth()->user()->name }}",
                html: `
                <h3>Pajak Mobil </h3>
                
                  @foreach ($transportation_for_toasts as $key => $transportation)
                  @if(date_left($transportation->tax_date) ==true )
                  <b> 
                    <td class="text-center">
                      {{ $transportation->brand }} -
                    </td>
                    <td class="text-center">
                      {{ $transportation->plate }} -
                    </td>
                    <td class="text-center">
                      {{ $transportation->tax_date}}
                    </td>
                    </br>
                  </b>
                  @endif
                  
                  @endforeach
                  <h3>Ganti Oli Mobil </h3>
                
                  @foreach ($transportation_for_toasts as $key => $transportation)
                  @if(date_left($transportation->oil_date) ==true )
                  <b> 
                    <td class="text-center">
                      {{ $transportation->brand }} -
                    </td>
                    <td class="text-center">
                      {{ $transportation->plate }} -
                    </td>
                    <td class="text-center">
                      {{ $transportation->oil_date}}
                    </td>
                    </br>
                  </b>
                  @endif
                  
                  @endforeach
                
                
                 </br> for update the data going to
                <a href="{{ url('transportations') }}"> Aseet Mobil <a>`,
            });

        });
    </script>
@endsection
