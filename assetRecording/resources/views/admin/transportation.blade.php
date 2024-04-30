@extends('layouts.admin')

@section('CSS')
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>
@endsection

@section('title')
    Asset Mobil
@endsection

@section('sideTitle')
    {{ url('transportations') }}
@endsection

@section('content')
    <div id="controller">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="#" type="button" class="btn btn-primary" @click="addData()">Buat data baru</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body overflow-auto">
                        <table class="table table-bordered" id="datatable" >
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>

                                    <th class="text-center">Tipe</th>
                                    <th class="text-center">Brand</th>
                                    <th class="text-center">Plat Nomor</th>
                                    <th class="text-center">Pajak Kendaraan</th>
                                    <th class="text-center">Ganti Oli</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Bensin Terakhir</th>
                                    <th class="text-center">KM Terakhir</th>
                                    <th class="text-center">Tgl Dibuat</th>
                                    <th class="text-center">Tgl Diupdate</th>
                                    <th style="width: 40px" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($transportations as $key => $transportation)
                                    <tr>
                                        <td class="text-center">
                                            {{ $key + 1 }}
                                        </td>
                                        <td class="text-center">
                                            {{ $transportation->type }}
                                        </td>
                                        <td class="text-center">
                                            {{ $transportation->brand }}
                                        </td>
                                        <td class="text-center">
                                            {{ $transportation->plate }}
                                        </td>
                                        <td class="text-center">
                                            {{ date('d/M/Y', strtotime($transportation->tax_date)) }}
                                        </td>
                                        <td class="text-center">
                                            {{ date('d/M/Y', strtotime($transportation->oil_date)) }}
                                        </td>
                                        <td class="text-center">
                                            {{ $transportation->status }}
                                        </td>
                                        <td class="text-center">
                                            {{ $transportation->last_gas }}
                                        </td>
                                        <td class="text-center">
                                            {{ $transportation->last_km }}
                                        </td>
                                        <td class="text-center">
                                            {{ date('d/M/Y', strtotime($transportation->created_at)) }}
                                        </td>
                                        <td class="text-center">
                                            {{ date('d/M/Y', strtotime($transportation->updated_at)) }}
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-warning"
                                                @click = "editData({{ $transportation }})">update</a>
                                            <hr>
                                            <a href="#" class="btn btn-danger"
                                                @click = "deleteData({{ $transportation->id }})">delete</a>
                                        </td>
                                    </tr>
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
        {{-- modals --}}
        <div class="modal fade" id="modal-primary">
            <div class="modal-dialog">
                <div class="modal-content bg-primary">
                    <form method="POST" :action="actionUrl" autocomplete="off"  @submit = "submitForm($event,data.id)">
                        <div class="modal-header">
                            <h4 class="modal-title">Form Pendaftaran Asset Mobil</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" v-if='editStatus'>
                            <div class="form-group">
                                <label>Tipe</label>
                                <input type="text" name="type" :value="data.type" required=""
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Brand</label>
                                <input type="text" name="brand" :value="data.brand" required=""
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Plat Nomor</label>
                                <input type="text" name="plate" :value="data.plate" required=""
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Pajak Kendaraan</label>
                                <input type="date" name="tax_date" :value="data.tax_date" required=""
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ganti Oli</label>
                                <input type="date" name="oil_date" :value="data.oil_date" required=""
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Bensin Terakhir</label>
                                <input type="text" name="last_gas" :value="data.last_gas" required=""
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>KM Terakhir</label>
                                <input type="text" name="last_km" :value="data.last_km" required=""
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <select class="custom-select form-control " aria-label="Default select example"
                                    id="status" name="status" required>
                                    <option value="ready">siap pakai</option>
                                    <option value="unready">tidak siap pakai</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-light">Save changes</button>
                        </div>
                    </form>
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
        var actionUrl = "{{ url('transportations') }}";
        var apiUrl = "{{ url('api/transportations') }}";
        var columns = [{
                data: 'DT_RowIndex',
                class: 'text-center',
                orderable: true,
            },
            {
                data: 'type',
                class: 'text-center',
                orderable: false,
            },
            {
                data: 'brand',
                class: 'text-center',
                orderable: false,
            },
            {
                data: 'plate',
                class: 'text-center',
                orderable: false,
            },
            {
                data: 'tax_date',
                class: 'text-center',
                orderable: false,
            },
            {
                data: 'oil_date',
                class: 'text-center',
                orderable: false,
            },
            {
                data: 'status',
                class: 'text-center',
                orderable: false,
            },
            {
                data: 'last_gas',
                class: 'text-center',
                orderable: false,
            },
            {
                data: 'last_km',
                class: 'text-center',
                orderable: false,
            },
            {
                data: 'date_convert_created_at',
                class: 'text-center',
                orderable: true,
            },
            {
                data: 'date_convert_updated_at',
                class: 'text-center',
                orderable: true,
            },
            {
                render: function(index, row, data, meta) {
                    //  masih error gak tau tar di cari
                    return `<a href="#" class="btn btn-warning" onclick="controller.editData(event,${meta.row})">Edit</a>
              <a href="#" class="btn btn-danger" onclick="controller.deleteData(event,${data.id})">Hapus</a>`;
                },
                orderable: false,
                width: '200px',
                class: 'text-center'
            },

        ]
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
                        dom:"frtip",
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
                }

            }
        });
    </script>
    {{-- <script>
        $(document).ready(function() {
      $(document).Toasts('create', {
        class: 'bg-info',
        title: 'Info Pajak',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $(document).ready(function() {
      $(document).Toasts('create', {
        class: 'bg-info',
        title: 'Info Ganti Oli',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    </script> --}}
    {{-- <script type="text/javascript">
        var controller = new Vue({
            el: '#controller',
            data: {
                data: {},
                actionUrl: '{{ url('transportations') }}',
                editStatus: false,
            },
            mounted: function() {

            },
            methods: {
                addData() {
                    // data-toggle="modal"data-target="#modal-primary"
                    $('#modal-primary').modal();
                    this.actionUrl = '{{ url('transportations') }}';
                    this.data = {};
                    console.log("add data");
                    this.editStatus = false;
                },
                editData(data) {
                    console.log(data);
                    this.data = data;
                    this.actionUrl = '{{ url('transportations') }}' + '/' + data.id;
                    $('#modal-primary').modal();
                    this.editStatus = true;
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('transportations') }}' + '/' + id;
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
