@extends('layouts.app')

@section('CSS')
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>
    {{-- <style>
        @media print {
            table {
                border-collapse: collapse;
                width: 100%;
                background-color: aqua;
            }

            th,
            td {
                border: 1px solid black;
                padding: 8px;
                text-align: left;
            }
        }
    </style> --}}
@endsection

@section('title')
    Print data
@endsection

@section('sideTitle')
    {{ url('print') }}
@endsection

@section('content')
    <div id="controller">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <a href="#" type="button" class="btn btn-primary" onclick="printData()">Print Data</a>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body overflow-auto">
                        <table class="table table-bordered table-sm" id="datatable" style="width:10%;height: 70px;font-size:1vw;margin-left:30px;">
                            {{-- <h1 class="text-center"> judul</h1> --}}
                            <thead>
                                <tr>
                                    <th style="width: 10px" class="col-1">No</th>
                                    <th class="col-1">Nama</th>
                                    <th class="col-1">plat nomor Mobil</th>
                                    <th class="col-1">brand Mobil</th>
                                    <th class="col-1">bensin terakhir</th>
                                    <th class="col-1">km terakhir</th>
                                    <th class="col-1">uang bensin</th>
                                    <th class="col-1">sisa uang bensin</th>
                                    <th class="col-1">Status</th>
                                    <th class="col-1">dipinjam tanggal</th>
                                    <th class="col-1">dikembalikan tanggal</th>
                                    {{-- <th style="width: 40px">Aksi</th> --}}
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($vehicle_returns as $key => $vehicle_return)
                                    @foreach ($users as $user)
                                        @if ($user->id == auth()->user()->id)
                                            <tr>
                                                <td>
                                                    {{ $key + 1 }}
                                                </td>
                                                <td>
                                                    {{ $user->name }}
                                                </td>
                                                <td>
                                                    {{ $vehicle_return->vehicle_lending->transportation->plate }}
                                                </td>
                                                <td>
                                                    {{ $vehicle_return->vehicle_lending->transportation->brand }}
                                                </td>
                                                <td>
                                                    {{ $vehicle_return->last_gas }}
                                                </td>
                                                <td>
                                                    {{ $vehicle_return->last_km }}
                                                </td>
                                                <td>
                                                    {{ $vehicle_return->vehicle_lending->gas_money }}
                                                </td>
                                                <td>
                                                    {{ $vehicle_return->gas_money }}
                                                </td>
                                                <td>
                                                    {{ $vehicle_return->lending_status }}
                                                </td>
                                                <td>
                                                    {{ $vehicle_return->vehicle_lending->created_at }}
                                                </td>
                                                <td>
                                                    {{ $vehicle_return->created_at }}
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-info">QR</a>
                                                    
                                                </td>

                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach


                            </tbody> --}}
                        </table>
                    </div>
                    <!-- /.card-body -->
                    {{-- <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div> --}}
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
@endsection

@section('JS')
    <!-- DataTables  & Plugins -->
    <script src={{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}></script>
    <script src={{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}></script>
    <script src={{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}></script>
    <script src={{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}></script>
    <script src={{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}></script>
    <script src={{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}></script>
    <script src={{ asset('assets/plugins/jszip/jszip.min.js') }}></script>
    <script src={{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}></script>
    <script src={{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}></script>
    <script src={{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}></script>
    <script src={{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}></script>
    <script src={{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}></script>

    <script type="text/javascript">
        var actionUrl = "{{ url('print') }}";
        var apiUrl = "{{ url('api/print') }}";
        var columns = [{
                data: 'DT_RowIndex',
                class: 'text-center',
                orderable: true,
                
            },
            {
                // done
                data: "name",
                class: 'text-center',
                orderable: true,
                
            },
            {
                // done
                data: "plate",
                class: 'text-center',
                orderable: true,
                
            },
            {
                // done
                data: "brand",
                class: 'text-center',
                orderable: true,
                
            },
            {
                // done
                data: "last_gas",
                class: 'text-center col-1',
                orderable: true,
                
            },
            {
                // done
                data: "last_km",
                class: 'text-center col-1',
                orderable: true,
                
            },
            {
                // done
                data: "gas_money_last",
                class: 'text-center col-1',
                orderable: true,
                
            },
            {
                // done
                data: "gas_money",
                class: 'text-center col-1',
                orderable: true,
                
            },
            {
                // done
                data: "status_lending",
                class: 'text-center col-1',
                orderable: true,
                
            },
            {
                // done
                data: "date_convert_created_at_lending",
                class: 'text-center col-1',
                orderable: true,
                
            },
            {
                // done
                data: "date_convert_created_at",
                class: 'text-center col-md-2',
                orderable: true,
                
            },
            // {
            //     render: function(index, row, data, meta) {
            //     return `<a href="#" class="btn btn-info" onclick="controller.editData(event,${meta.row})">info</a>`;
            //     },
            // },
        ];
    </script>

    <script type="text/javascript">
        var controller = new Vue({
            el: '#controller',
            data: {
                datas: [],
                data: {},
                actionUrl,
                apiUrl,
                editStatus: false,
            },
            mounted: function() {
                this.datatable();
            },
            methods: {
                // $(document).ready(function() {
                //     $('#datatable').DataTable({
                //         dom:
                //     });
                // });
                datatable() {
                    const _this = this;
                    _this.table = $('#datatable').DataTable({

                        ajax: {
                            url: _this.apiUrl,
                            type: 'GET',
                        },
                        columns: columns,
                        // responsive: true,
                        dom:"Bfrtip",
                        button:[{
                            extend : 'pdf',
                            oriented: 'potrait',
                            pageSize:'Legal',
                            title: 'Data Kendaraan',
                            download: 'open',
                        },
                            'copy', 'csv', 'excel', 'print'
                        ]
                    }).on('xhr', function() {
                        _this.datas = _this.table.ajax.json().data;
                    });
                },
                
            },
        });

        function printData() {
            var table = document.getElementById("datatable").cloneNode(true);
            var newWindow = window.open();
            newWindow.document.body.appendChild(table);
            newWindow.print();
        };
    </script>

@endsection
