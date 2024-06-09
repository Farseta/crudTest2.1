@extends('layouts.admin')


@section('CSS')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <a href="{{ url('transportations') }}" class="small-box bg-info">
                    <div class="inner">
                        <h3>
                            {{ "$transportation_total" }}
                        </h3>

                        <p>Total transportasi dimiliki</p>
                    </div>
                    <div class="icon">
                        <i><ion-icon name="car-outline"></ion-icon></i>

                    </div>
                    <div class="small-box-footer">Aset Mobil <i class="fas fa-arrow-circle-right"></i></div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-12">
                <!-- small box -->
                <a href="{{ url('vehicleLends') }}" class="small-box bg-info">
                    <div class="inner">
                        <h3>
                            {{ "$transportation_ready" }}
                        </h3>

                        <p>Transportasi siap dipakai</p>
                    </div>
                    <div class="icon">
                        <i><ion-icon name="thumbs-up-outline"></ion-icon></i>
                    </div>
                    <div class="small-box-footer">Peminjaman Mobil <i class="fas fa-arrow-circle-right"></i></div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-12">
                <!-- small box -->
                <a href="{{ url('vehicleReturns') }}" class="small-box bg-info">
                    <div class="inner">
                        <h3>
                            {{ "$transportation_unready" }}
                        </h3>

                        <p>Transportasi sedang dipakai</p>
                    </div>
                    <div class="icon">
                        <i><ion-icon name="thumbs-down-outline"></ion-icon></i>
                    </div>
                    <div class="small-box-footer">Pengembalian Mobil <i class="fas fa-arrow-circle-right"></i></div>
                </a>
            </div>
            <div class="col-lg-3 col-12">
                <!-- small box -->
                <a href="{{ url('otherAssets') }}" class="small-box bg-info">
                    <div class="inner">
                        <h3>
                            {{ "$other_asset_total" }}
                        </h3>

                        <p>Total Asset</p>
                    </div>
                    <div class="icon">
                        <i><ion-icon name="reader-outline"></ion-icon></i>
                    </div>
                    <div class="small-box-footer">Asset Lainnya <i class="fas fa-arrow-circle-right"></i></div>
                </a>
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
            <a href="{{ url('print') }}" class="btn btn-primary"> Cetak Data</a>
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
    {{-- <script>
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
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
                  @if (date_left($transportation->tax_date) == true)
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
                  @if (date_left($transportation->oil_date) == true)
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
    </script> --}}
    <script>
        function dateLeft(value) {
            var dateParts = value.split("-");
            var year = parseInt(dateParts[0], 10);
            var month = parseInt(dateParts[1], 10);
            var day = parseInt(dateParts[2], 10);

            var date1 = new Date(year, month - 1, day); // Month in JavaScript is 0-indexed
            var date2 = new Date(); // Current date
            // console.log("date3=" + date1);
            var diff = Math.floor((date1 - date2) / (1000 * 60 * 60 * 24)); // Difference in days
            console.log("diff=" + diff);
            // return false
            if (diff >= 0 && diff < 30) {
                return true;
            } else {
                return false;
            }
        }

        function dateLeft2(value) {
            var dateParts = value.split("-");
            var year = parseInt(dateParts[0], 10);
            var month = parseInt(dateParts[1], 10);
            var day = parseInt(dateParts[2], 10);

            var date1 = new Date(year, month - 1, day); // Month in JavaScript is 0-indexed
            var date2 = new Date(); // Current date
            // console.log("date1=" + date1);
            // console.log("date2=" + date2);
            var diff = Math.floor((date1 - date2) / (1000 * 60 * 60 * 24)); // Difference in days
            console.log("diff2=" + diff);
            if (diff < 0) {
                return true; // Lebih dari 30 hari atau tanggal yang diberikan lebih besar dari tanggal saat ini
            } else {
                return false; // Tidak lebih dari 30 hari
            }
            // return false
        }

        var transportation_tax_date = `
                <h3>Pajak Mobil </h3>

          @foreach ($transportation_for_toasts as $key => $transportation)
          @if (date_left($transportation->tax_date) == true)

            <td class="text-center">
              {{ $transportation->brand }} -
            </td>
            <td class="text-center">
              {{ $transportation->plate }} -
            </td>
            <td class="text-center">
              {{ $transportation->tax_date }}
            </td>
            </br>

          @endif

          @endforeach
          <hr>`;
        var transportation_oil_date = `   <h3>Ganti Oli Mobil </h3>

   @foreach ($transportation_for_toasts as $key => $transportation)
   @if (date_left($transportation->oil_date) == true)

     <td class="text-center">
        | {{ $transportation->brand }} |
     </td>
     <td class="text-center">
       {{ $transportation->plate }} |
     </td>
     <td class="text-center">
      {{ $transportation->oil_date }} |
   </td>
   </br>

  @endif

  @endforeach
  <hr>`;
        var transportation_oil_date_late =`<h3 style="color: #f40a0a">Ganti Oli Kendaraan Terlambat</h3>
    @foreach ($transportation_for_toasts as $key => $transportation)
        @if (date_left2($transportation->oil_date) == true)

                <td>
                   | {{ $transportation->brand }} |
                </td>
                <td>
                    {{ $transportation->plate }} |
                </td>
                <td>
                    {{ $transportation->oil_date }} |
                </td>
            </br>

        @endif
    @endforeach`; 
        var transportation_tax_date_late = `  <h3 style="color: #f40a0a">Pajak Kendaraan Terlambat</h3>
       @foreach ($transportation_for_toasts as $key => $transportation)
         @if (date_left2($transportation->tax_date) == true)

                 <td>
                     | {{ $transportation->brand }} |
                 </td>
                 <td>
                     {{ $transportation->plate }} |
                 </td>
                <td>
                     {{ $transportation->tax_date }} |
                 </td>
                 </br>

         @endif
     @endforeach
     <hr>`;

        var pushHtml = '';
        var ea1 = false;
        var ea2 = false;
        var ea3 = false;
        var ea4 = false;
        var transportation_for_toasts = @json($transportation_for_toasts);

        transportation_for_toasts.forEach(function(transportation) {
            console.log(dateLeft(transportation.tax_date) === true || dateLeft(transportation.oil_date) === true);
            console.log(dateLeft2(transportation.tax_date) === true || dateLeft2(transportation.oil_date) === true);
            if (dateLeft(transportation.tax_date) === true || dateLeft(transportation.oil_date) === true ||
                dateLeft2(transportation.tax_date) === true || dateLeft2(transportation.oil_date) === true) {
                if (dateLeft(transportation.oil_date) === true) {
                    console.log("oil pas"+transportation.plate)
                    ea1 = true
                } 
                else if (dateLeft2(transportation.oil_date) === true) {
                    console.log("oiltelat"+transportation.plate)
                    ea2 = true

                } 
                if (dateLeft(transportation.tax_date) === true) {
                    console.log("pajakpas"+transportation.plate)
                    ea3 = true

                } 
                else if (dateLeft2(transportation.tax_date) === true) {
                    console.log("pajaktelat"+transportation.plate)
                    ea4 = true

                }
            }
        });
        if (ea1 == true) {
            pushHtml = pushHtml + transportation_oil_date;
        }
        if (ea3 == true) {
            pushHtml = pushHtml + transportation_tax_date;
        }
        if (ea2 == true) {
            pushHtml = pushHtml + transportation_oil_date_late;
        }
        if (ea4 == true) {
            pushHtml = pushHtml + transportation_tax_date_late;
        }
        pushHtml = pushHtml +
            `</br> Untuk mengupdate data pergi ke <a href="{{ url('transportations') }}"> Aseet Mobil <a>`;
        Swal.fire({
            icon: 'info',
            title: 'Selamat datang ' + "{{ auth()->user()->name }}",
            html: pushHtml,
        });

        // if ((dateLeft(transportation.tax_date) === true || dateLeft(transportation.oil_date) === true) && (
        //         dateLeft2(transportation.tax_date) === true || dateLeft2(transportation.oil_date) === true)) {

        // Swal.fire({
        //     icon: 'info',
        //     title: 'Selamat datang ' + "{{ auth()->user()->name }}",
        //     html: `
    // <h3>Pajak Mobil </h3>

    //   @foreach ($transportation_for_toasts as $key => $transportation)
    //   @if (date_left($transportation->tax_date) == true)

    //     <td class="text-center">
    //       {{ $transportation->brand }} -
    //     </td>
    //     <td class="text-center">
    //       {{ $transportation->plate }} -
    //     </td>
    //     <td class="text-center">
    //       {{ $transportation->tax_date }}
    //     </td>
    //     </br>

    //   @endif

    //   @endforeach
    //   <hr>
    //   <h3>Ganti Oli Mobil </h3>

    //   @foreach ($transportation_for_toasts as $key => $transportation)
    //   @if (date_left($transportation->oil_date) == true)

    //     <td class="text-center">
    //        | {{ $transportation->brand }} |
    //     </td>
    //     <td class="text-center">
    //       {{ $transportation->plate }} |
    //     </td>
    //     <td class="text-center">
    //       {{ $transportation->oil_date }} |
    //     </td>
    //     </br>

    //   @endif

    //   @endforeach
    //   <hr>
    //   <h3 style="color: #f40a0a">Pajak Kendaraan Terlambat</h3>
    //   @foreach ($transportation_for_toasts as $key => $transportation)
    //     @if (date_left2($transportation->tax_date) == true)

    //             <td>
    //                 | {{ $transportation->brand }} |
    //             </td>
    //             <td>
    //                 {{ $transportation->plate }} |
    //             </td>
    //             <td>
    //                 {{ $transportation->tax_date }} |
    //             </td>
    //             </br>

    //     @endif
    // @endforeach
    // <hr>
    // <h3 style="color: #f40a0a">Ganti Oli Kendaraan Terlambat</h3>
    // @foreach ($transportation_for_toasts as $key => $transportation)
    //     @if (date_left2($transportation->oil_date) == true)

    //             <td>
    //                | {{ $transportation->brand }} |
    //             </td>
    //             <td>
    //                 {{ $transportation->plate }} |
    //             </td>
    //             <td>
    //                 {{ $transportation->oil_date }} |
    //             </td>
    //         </br>

    //     @endif
    // @endforeach
    //  </br> Untuk mengupdate data pergi ke 
    // <a href="{{ url('transportations') }}"> Aseet Mobil <a>`,
        // });
        // } else if (dateLeft(transportation.tax_date) === true || dateLeft(transportation.oil_date) === true) {

        //     Swal.fire({
        //         icon: 'info',
        //         title: 'Selamat datang ' + "{{ auth()->user()->name }}",
        //         html: ` <h3>Pajak Mobil </h3>

    //     @foreach ($transportation_for_toasts as $key => $transportation)
    //     @if (date_left($transportation->tax_date) == true)

    //       <td class="text-center">
    //         {{ $transportation->brand }} -
    //       </td>
    //       <td class="text-center">
    //         {{ $transportation->plate }} -
    //       </td>
    //       <td class="text-center">
    //         {{ $transportation->tax_date }}
    //       </td>
    //       </br>

    //     @endif

    //     @endforeach
    //     <hr>
    //     <h3>Ganti Oli Mobil </h3>

    //     @foreach ($transportation_for_toasts as $key => $transportation)
    //     @if (date_left($transportation->oil_date) == true)

    //       <td class="text-center">
    //          | {{ $transportation->brand }} |
    //       </td>
    //       <td class="text-center">
    //         {{ $transportation->plate }} |
    //       </td>
    //       <td class="text-center">
    //         {{ $transportation->oil_date }} |
    //       </td>
    //       </br>

    //     @endif

    //     @endforeach
    //     <hr>
    //     `,
        //     });

        // } else if (dateLeft2(transportation.tax_date) == true || dateLeft2(transportation.oil_date) == true) {
        //     Swal.fire({
        //         icon: 'info',
        //         tittle: 'Selamat datang ' + "{{ auth()->user()->name }}",
        //         html: ` <h3 style="color: #f40a0a">Pajak Kendaraan Terlambat</h3>
    //       @foreach ($transportation_for_toasts as $key => $transportation)
    //         @if (date_left2($transportation->tax_date) == true)

    //                 <td>
    //                     | {{ $transportation->brand }} |
    //                 </td>
    //                 <td>
    //                     {{ $transportation->plate }} |
    //                 </td>
    //                 <td>
    //                     {{ $transportation->tax_date }} |
    //                 </td>
    //                 </br>

    //         @endif
    //     @endforeach
    //     <hr>
    //     <h3 style="color: #f40a0a">Ganti Oli Kendaraan Terlambat</h3>
    //     @foreach ($transportation_for_toasts as $key => $transportation)
    //         @if (date_left2($transportation->oil_date) == true)

    //                 <td>
    //                    | {{ $transportation->brand }} |
    //                 </td>
    //                 <td>
    //                     {{ $transportation->plate }} |
    //                 </td>
    //                 <td>
    //                     {{ $transportation->oil_date }} |
    //                 </td>
    //             </br>

    //         @endif
    //     @endforeach
    //      </br> Untuk mengupdate data pergi ke 
    //     <a href="{{ url('transportations') }}"> Aseet Mobil <a>`,
        //     })
        // }

        // Swal.fire({
        //     icon: 'info',
        //     title: 'Selamat datang ' + "{{ auth()->user()->name }}",
        //     html: `
    //         <h3>Pajak Mobil </h3>

    //           @foreach ($transportation_for_toasts as $key => $transportation)
    //           @if (date_left($transportation->tax_date) == true)

    //             <td class="text-center">
    //               {{ $transportation->brand }} -
    //             </td>
    //             <td class="text-center">
    //               {{ $transportation->plate }} -
    //             </td>
    //             <td class="text-center">
    //               {{ $transportation->tax_date }}
    //             </td>
    //             </br>

    //           @endif

    //           @endforeach
    //           <hr>
    //           <h3>Ganti Oli Mobil </h3>

    //           @foreach ($transportation_for_toasts as $key => $transportation)
    //           @if (date_left($transportation->oil_date) == true)

    //             <td class="text-center">
    //                | {{ $transportation->brand }} |
    //             </td>
    //             <td class="text-center">
    //               {{ $transportation->plate }} |
    //             </td>
    //             <td class="text-center">
    //               {{ $transportation->oil_date }} |
    //             </td>
    //             </br>

    //           @endif

    //           @endforeach
    //           <hr>
    //           <h3 style="color: #f40a0a">Pajak Kendaraan Terlambat</h3>
    //           @foreach ($transportation_for_toasts as $key => $transportation)
    //             @if (date_left2($transportation->tax_date) == true)

    //                     <td>
    //                         | {{ $transportation->brand }} |
    //                     </td>
    //                     <td>
    //                         {{ $transportation->plate }} |
    //                     </td>
    //                     <td>
    //                         {{ $transportation->tax_date }} |
    //                     </td>
    //                     </br>

    //             @endif
    //         @endforeach
    //         <hr>
    //         <h3 style="color: #f40a0a">Ganti Oli Kendaraan Terlambat</h3>
    //         @foreach ($transportation_for_toasts as $key => $transportation)
    //             @if (date_left2($transportation->oil_date) == true)

    //                     <td>
    //                        | {{ $transportation->brand }} |
    //                     </td>
    //                     <td>
    //                         {{ $transportation->plate }} |
    //                     </td>
    //                     <td>
    //                         {{ $transportation->oil_date }} |
    //                     </td>
    //                 </br>

    //             @endif
    //         @endforeach
    //          </br> Untuk mengupdate data pergi ke 
    //         <a href="{{ url('transportations') }}"> Aseet Mobil <a>`,
        // });
    </script>
@endsection
