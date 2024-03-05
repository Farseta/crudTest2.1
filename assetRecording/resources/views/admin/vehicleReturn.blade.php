@extends('layouts.admin')

@section('CSS')
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>
@endsection

@section('title')
    Pengembalian Mobil
@endsection

@section('sideTitle')
    {{ url('vehicleReturns') }}
@endsection

@section('content')
    <div id="controller">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="#" type="button" class="btn btn-primary" @click= "addData()">Buat data Baru</a>
                    </div>
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
                                    <th style="width: 40px">Aksi</th>
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
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        {{-- modals --}}
        <div class="modal fade" id="modal-primary">
            <div class="modal-dialog">
                <div class="modal-content bg-primary">
                    <form method="POST" :action="actionUrl" autocomplete="off">
                        <div class="modal-header">
                            <h4 class="modal-title">Primary Modal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" v-if='editStatus'>
                            <div class="form-group">
                                <label>Nama Peminjam</label>
                                <select class="custom-select form-control " aria-label="Default select example"
                                    id="id_user" name="id_user" required>
                                    <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>plat nomor transportasi</label>
                                <select class="custom-select form-control " aria-label="Default select example"
                                    id="id_vehicle_lending" name="id_vehicle_lending" required>

                                    @foreach ($vehicle_lendings as $vehicle_lending)
                                        {{-- @if ($vehicle_lending->status_lending == 'lend')
                                @foreach ($transportations as $transportation)
                                @if ($transportation->id == $vehicle_lending->id_transportation)
                                    <option value="{{ $vehicle_lending->id }}">{{ $transportation->plate_number }}</option>
                                    @break
                                @endif   
                            @endforeach
                                @endif --}}
                                        @if ($vehicle_lending->status_lending == 'lend')
                                            @foreach ($transportations as $transportation)
                                                @if ($transportation->id == $vehicle_lending->id_transportation && $vehicle_lending->id_user == auth()->user()->id)
                                                    <option value="{{ $vehicle_lending->id }}">
                                                        {{ $transportation->plate }}
                                                    </option>
                                                    <input type="hidden" name="id_transportation" id="id_transportation"
                                                        value="{{ $transportation->id }}">
                                                @break
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach

                            </select>
                            <input type="hidden" name="lending_status" id="lending_status" value="returned">
                            <input type="hidden" name="status" id="status" value="ready">
                        </div>

                        <div class="form-group">
                            <label>Bensin Terakhir</label>
                            <input type="text" name="last_gas" value="" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>KM Terakhir</label>
                            <input type="text" name="last_km" value="" required="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>sisa uang</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp.</span>
                                <input type="number" name="gas_money" value="" required=""
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Save changes</button>
                    </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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
    var actionUrl = "{{ url('vehicleReturns') }}";
    var apiUrl = "{{ url('api/vehicleReturns') }}";
    var columns = [{
            data: 'DT_RowIndex',
            class: 'text-center',
            orderable: true,
        },
        {
            data:"name",
            class:'text-center',
            orderable: true,
        },
        {
            data:"plate",
            class:'text-center',
            orderable: true,
        },
        {
            data:"brand",
            class:'text-center',
            orderable: true,
        },
        {
            data:"last_gas",
            class:'text-center',
            orderable: true,
        },
        {
            data:"last_km",
            class:'text-center',
            orderable: true,
        },
        {
            data:"gas_money_last",
            class:'text-center',
            orderable: true,
        },
        {
            data:"gas_money",
            class:'text-center',
            orderable: true,
        },
        {
            data:"lending_status",
            class:'text-center',
            orderable: true,
        },
        {
            data:"date_convert_created_at_lending",
            class:'text-center',
            orderable: true,
        },
        {
            data:"date_convert_created_at",
            class:'text-center',
            orderable: true,
        },
        {
            render: function(index, row, data, meta) {
            return `<a href="#" class="btn btn-info" onclick="controller.editData(event,${meta.row})">info</a>`;
            },
        },
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
