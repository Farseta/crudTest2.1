@extends('layouts.admin')

@section('CSS')
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>
@endsection
@section('title')
    Peminjaman Mobil
@endsection

@section('sideTitle')
    {{ url('vehicleLends') }}
@endsection

@section('content')
    <div id="controller">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="#" type="button" class="btn btn-primary" @click ="addData()">Buat data baru</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body overflow-auto">
                        <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>

                                    <th class="text-center">Nama Pengguna</th>
                                    <th class="text-center">Brand Transportasi</th>
                                    <th class="text-center">Plat Nomor Transportasi</th>
                                    <th class="text-center">Keperluan</th>
                                    <th class="text-center">Uang Bensin</th>
                                    <th class="text-center">Status</th>
                                    <th style="width: 40px" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($vehicle_lendings as $key => $vehicle_lending)
                                    @if ($vehicle_lending->id_user == auth()->user()->id)
                                        <tr>
                                            <td class="text-center">
                                                {{ $key + 1 }}
                                            </td>
                                            <td class="text-center">
                                                {{ $vehicle_lending->user->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $vehicle_lending->transportation->brand }}
                                            </td>
                                            <td class="text-center">
                                                {{ $vehicle_lending->transportation->plate }}
                                            </td>
                                            <td class="text-center">
                                                {{ $vehicle_lending->needs }}
                                            </td>
                                            <td class="text-center">
                                                {{ $vehicle_lending->gas_money }}
                                            </td>
                                            <td class="text-center">
                                                {{ $vehicle_lending->status_lending }}
                                            </td>

                                            <td class="text-center">
                                                <a href="#" type="button" class="btn btn-info">QR</a>
                                                <hr>
                                                @if ($vehicle_lending->status_lending == 'returned' || $vehicle_lending->status_lending == 'canceled')
                                                    ending
                                                @else
                                                    <a href="#" type="button" class="btn btn-warning"
                                                        @click ="editData({{ $vehicle_lending }})">Edit</a>
                                                    <a href="#" type="button" class="btn btn-danger">Hapus</a>
                                                    <hr>
                                                @endif

                                            </td>

                                        </tr>
                                    @endif
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
                    <form method="POST" :action="actionUrl" autocomplete="off" @submit = "submitForm($event,data.id)">
                        <div class="modal-header">
                            <h4 class="modal-title">Form Peminjaman Mobil</h4>
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
                            <div class="form-group" id="testReload">
                                <label>Plat Nomor</label>
                                <select class="custom-select form-control " aria-label="Default select example"
                                    id="id_transportation" name="id_transportation" required>


                                    {{-- @foreach ($transportations as $key => $transportation)
                                        @if ($transportation->status === 'ready')
                                            <option value="{{ $transportation->id }}">
                                                {{ $key }} {{ $transportation->plate }}

                                            </option>
                                        @else
                                            <option value="{{ $transportation->id }}" v-if='editStatus'
                                                :selected="data.id_transportation == {{ $transportation->id }}">
                                                {{ $transportation->plate }}

                                            </option>
                                        @endif
                                    @endforeach --}}

                                </select>
                                <input type="hidden" name="oldStatus" id="oldStatus" value="ready" v-if='editStatus'>
                                <input type="hidden" name="oldIdTransportation" id="oldIdTransportation"
                                    :value="data.id_transportation" v-if='editStatus'>
                                <input type="hidden" name="status" id="status" value="unready">
                                <input type="hidden" name="status_lending" id="status_lending" value="lend">
                            </div>
                            <div class="form-group">
                                <label>Keperluan Meminjam</label>
                                <input type="text" name="needs" :value="data.needs" required=""
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Uang Bensin Yang Diberikan</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="number" name="gas_money" :value="data.gas_money" required=""
                                        class="form-control">
                                </div>
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
        var actionUrl = "{{ url('vehicleLends') }}";
        var apiUrl = "{{ url('api/vehicleLends') }}";
        var columns = [{
                data: 'DT_RowIndex',
                class: 'text-center',
                orderable: true,
            },
            {
                data: "name",
                class: "text-center",
                orderable: false,
            },
            {
                data: "brand",
                class: "text-center",
                orderable: false,
            },
            {
                data: "plate",
                class: "text-center",
                orderable: false,
            },
            {
                data: "needs",
                class: "text-center",
                orderable: false,
            },
            {
                data: "gas_money",
                class: "text-center",
                orderable: false,
            },
            {
                data: "status_lending",
                class: "text-center",
                orderable: false,
            },
            {
                render: function(index, row, data, meta) {
                    //  masih error gak tau tar di cari
                    if (data.status_lending == 'returned' || data.status_lending == 'canceled') {
                        return `ending`;
                    } else {
                        return `<a href="#" class="btn btn-warning" onclick="controller.editData(event,${meta.row})">Edit</a>
                        <a href="#" class="btn btn-danger" onclick="controller.deleteData(event,${data.id})">Delete</a>`;
                    }

                },
                orderable: false,
                width: '200px',
                class: 'text-center',
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
                        dom:"frtip",
                        // responsive: true,

                    }).on('xhr', function() {
                        _this.datas = _this.table.ajax.json().data;
                    });
                },
                addData() {

                    $('#modal-primary').off('shown.bs.modal'); 
                    $('#modal-primary').on('shown.bs.modal', function() {
                        $.ajax({
                            url: '{{ url('api/transportations') }}',
                            type: 'GET',
                            success: function(data2) {
                                console.log("addData");
                                // Perbarui opsi-opsi dalam elemen <select>
                                var select = $('#id_transportation');
                                select.empty();
                                var aphtml = '';
                                console.log(data2['data']);
                                let datas = data2['data'];
                                for (let i = 0; i < datas.length; i++) {
                                    if (datas[i]['status'] === 'ready')
                                        aphtml =
                                        `<option value="${datas[i]['id']}">${datas[i]['plate']}</option>`;
                                    else
                                        aphtml = '';
                                    select.append(aphtml);


                                }

                            },
                            error: function(xhr, status, error) {
                                console.error('Error loading transportation data:', error);
                            }
                        });

                    });
                    // $('#id_transportation').empty();
                    // reloadSelectOptions();
                    this.data = {};

                    this.editStatus = false;
                    $('#modal-primary').modal();

                },
                editData(event, row) {
                    this.data = this.datas[row];
                    console.log(event);
                    this.editStatus = true;
                    // this.data = data;
                    $('#modal-primary').off('shown.bs.modal'); 
                    if (this.editStatus == true) {
                        $('#modal-primary').on('shown.bs.modal', function() {
                            $.ajax({
                                url: '{{ url('api/transportations') }}',
                                type: 'GET',
                                success: function(data) {
                                    // Perbarui opsi-opsi dalam elemen <select>
                                    $.ajax({
                                        url: apiUrl,
                                        type: 'GET',
                                        success: function(data1) {
                                            console.log("editData");
                                            console.log(data1['data'][row][
                                                'DT_RowIndex'
                                            ]);
                                            // console.log(row);
                                            var select = $('#id_transportation');
                                            select.empty();
                                            var aphtml = '';

                                            let datas = data['data'];
                                            for (let i = 0; i < datas.length; i++) {
                                                if (datas[i]['status'] === 'ready')
                                                    aphtml =
                                                    `<option value="${datas[i]['id']}">${datas[i]['plate']}</option>`;
                                                else if (datas[i]['id'] === data1[
                                                        'data'][row][
                                                        'id_transportation'
                                                    ])
                                                    aphtml =
                                                    `<option value="${datas[i]['id']}" selected>${datas[i]['plate']}</option>`;
                                                else
                                                    aphtml = '';
                                                select.append(aphtml);


                                            }
                                        },
                                    })


                                },
                                error: function(xhr, status, error) {
                                    console.error('Error loading transportation data:', error);
                                }
                            });

                        });
                    }



                    $('#modal-primary').modal();
                },
                deleteData(event, id) {

                    // this.actionUrl = '{{ url('authors') }}' + '/' + id;
                    if (confirm("wanna delete this one?")) {
                        // $(event.target).parents('tr').remove();
                        axios.post(this.actionUrl + '/' + id, {
                            _method: 'DELETE'
                        }).then(response => {
                            const _this = this;
                            _this.table.ajax.reload();
                            // $('#modal-primary').on('hidden.bs.modal', function() {
                            //     $(this).find('.modal-content').load(location.href +
                            //         ' .modal-content');
                            // });
                            // location.reload();
                            alert("data have been deleted")
                        }).catch(error => {
                            console.error('Error deleting data:', error);
                            alert("Failed to delete data");
                        });
                    }
                    console.log(id);
                },
                submitForm(event, id) {
                    event.preventDefault();
                    const _this = this;
                    var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;
                    axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                        $('#modal-primary').modal('hide');
                        // $(this).find('#id_transportation').each(function() {
                        //         var selectedValue = $(this).val();
                        //         $(this).find('option[value="' + selectedValue + '"]')
                        //             .remove();
                        //     });
                        // modal-primary reload

                        // $('#modal-primary').on('hidden.bs.modal', function() {
                        //     $(this).find('.modal-content').load(location.href + ' .modal-content');
                        // });
                        // location.reload();
                        // $('form').submit(function(event) {
                        //     // Menghapus opsi yang dipilih dari elemen <select>
                        //     // $(this).find('#id_transportation').each(function() {
                        //     //     var selectedValue = $(this).val();
                        //     //     $(this).find('option[value="' + selectedValue + '"]')
                        //     //         .remove();
                        //     // });
                        // });
                        _this.table.ajax.reload();


                    });
                },

            },

        });

        // function loadTransportations() {
        //     $.ajax({
        //         url: '{{ url('api/transportations') }}',
        //         type: 'GET',
        //         success: function(data) {
        //             // Perbarui opsi-opsi dalam elemen <select>
        //             var select = $('#id_transportation');
        //             select.empty();
        //             var aphtml = '';
        //             console.log(data['data']);
        //             let datas = data['data'];
        //             for (let i = 0; i < datas.length; i++) {
        //                 if (datas[i]['status'] === 'ready')
        //                     aphtml = `<option value="${datas[i]['id']}">${datas[i]['plate']}</option>`;
        //                 else
        //                     aphtml = '';
        //                 select.append(aphtml);


        //             }

        //         },
        //         error: function(xhr, status, error) {
        //             console.error('Error loading transportation data:', error);
        //         }
        //     });
        // }
    </script>

    {{-- <script type="text/javascript">
        var controller = new Vue({
            el: '#controller',
            data: {
                data: {},
                actionUrl: '{{ url('vehicleLends') }}',
                editStatus: false,
            },
            mounted: function() {

            },
            methods: {
                addData() {
                    // data-toggle="modal"data-target="#modal-primary"
                    $('#modal-primary').modal();
                    this.actionUrl = '{{ url('vehicleLends') }}';
                    this.data = {};
                    console.log("add data");
                    this.editStatus = false;
                },
                editData(data) {
                    console.log(data);
                    this.data = data;
                    this.actionUrl = '{{ url('vehicleLends') }}' + '/' + data.id;
                    $('#modal-primary').modal();
                    this.editStatus = true;
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('vehicleLends') }}' + '/' + id;
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
