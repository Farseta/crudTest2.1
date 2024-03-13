@extends('layouts.app')

@section('CSS')
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>
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
                        <a href="#" type="button" class="btn btn-primary" >Buat data Baru</a>
                    </div> --}}
                    <!-- /.card-header -->
                    <div class="card-body overflow-auto">
                        <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Nama</th>
                                    <th>plat nomor Mobil</th>
                                    <th>brand Mobil</th>
                                    <th>bensin terakhir</th>
                                    <th>km terakhir</th>
                                    <th>uang bensin</th>
                                    <th>sisa uang bensin</th>
                                    <th>Status</th>
                                    <th>dipinjam tanggal</th>
                                    <th>dikembalikan tanggal</th>
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
            data:"name",
            class:'text-center',
            orderable: true,
        },
        {
            // done
            data:"plate",
            class:'text-center',
            orderable: true,
        },
        {
            // done
            data:"brand",
            class:'text-center',
            orderable: true,
        },
        {
            // done
            data:"last_gas",
            class:'text-center',
            orderable: true,
        },
        {
            // done
            data:"last_km",
            class:'text-center',
            orderable: true,
        },
        {
            // done
            data:"gas_money_last",
            class:'text-center',
            orderable: true,
        },
        {
            // done
            data:"gas_money",
            class:'text-center',
            orderable: true,
        },
        {
            // done
            data:"status_lending",
            class:'text-center',
            orderable: true,
        },
        {
            // done
            data:"date_convert_created_at_lending",
            class:'text-center',
            orderable: true,
        },
        {
            // done
            data:"date_convert_created_at",
            class:'text-center',
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
                datatable() {
                    const _this = this;
                    _this.table = $('#datatable').DataTable({

                        ajax: {
                            url: _this.apiUrl,
                            type: 'GET',
                        },
                        columns: columns,
                        // responsive: true,

                    }).on('xhr', function() {
                        _this.datas = _this.table.ajax.json().data;
                    });
                },
                addData() {
                    this.data = {};

                    this.editStatus = false;
                    $('#modal-primary').modal();

                },
                editData(event, row) {
                    this.data = this.datas[row];
                    console.log(event);
                    // this.data = data;

                    this.editStatus = true;
                    $('#modal-primary').modal();
                },
                deleteData(event, id) {
                    // this.actionUrl = '{{ url('authors') }}' + '/' + id;
                    if (confirm("wanna delete this one?")) {
                        $(event.target).parents('tr').remove();
                        axios.post(this.actionUrl + '/' + id, {
                            _method: 'DELETE'
                        }).then(response => {
                            // location.reload();
                            alert("data have been deleted")
                        })
                    }
                    console.log(id);
                },
                submitForm(event, id) {
                    event.preventDefault();
                    const _this = this;
                    var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;
                    axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                        $('#modal-primary').modal('hide');
                        _this.table.ajax.reload();
                    });
                },
            },
    });
</script>
{{-- <script type="text/javascript">
    var controller = new Vue({
        el: '#controller',
        data: {
            data: {},
            actionUrl: '{{ url('vehicleReturns') }}',
            editStatus: false,
        },
        mounted: function() {

        },
        methods: {
            addData() {
                $('#modal-primary').modal();
                this.actionUrl = '{{ url('vehicleReturns') }}';
                this.data = {};
                console.log("add data");
                this.editStatus = false;
            },
            editData() {
                $('#modal-primary').modal();
                this.data = data;
                this.actionUrl = '{{ url('vehicleReturns') }}' + '/' + data.id;
                $('#modal-primary').modal();
                this.editStatus = true;
            },
            deleteData() {
                this.actionUrl = '{{ url('vehicleReturns') }}' + '/' + id;
                if (confirm("wanna delete this data?")) {
                    axios.post(this.actionUrl, {
                        _method: 'DELETE'
                    }).then(response => {
                        location.reload();
                    });
                };
                console.log(id);
            },
        },
    });
</script> --}}
@endsection
