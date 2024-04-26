@extends('layouts.admin')


@section('CSS')
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>
@endsection

@section('title')
    Asset Lainnya
@endsection

@section('sideTitle')
    {{ url('otherAssets') }}
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
                        <table class="table table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>

                                    <th class="text-center">Tipe</th>

                                    <th class="text-center">Tgl Dibuat</th>
                                    <th class="text-center">Tgl Diupdate</th>
                                    <th style="width: 40px" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            {{-- <tbody>
                                @foreach ($other_assets as $key => $other_asset)
                                    <tr>
                                        <td class="text-center">{{ $key + 1 }}</td>
                                        <td class="text-center">{{ "$other_asset->type" }}</td>
                                        <td class="text-center">
                                            {{ date('d/M/Y', strtotime("$other_asset->created_at")) }}
                                        </td>
                                        <td class="text-center">
                                            {{ date('d/M/Y', strtotime("$other_asset->updated_at")) }}
                                        </td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-info"
                                                @click = "viewData({{ $other_asset }})">view</a>
                                            <hr>
                                            <a href="#" class="btn btn-warning" type="button"
                                                @click ="editData({{ $other_asset }})">update</a>
                                            <hr>
                                            <a href="#" class="btn btn-danger" type="button"
                                                @click="deleteData({{ $other_asset->id }})">delete</a>
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
            <div class="modal-dialog modal-fullscreen" style="min-width:70%; min-height:70%;">
                <div class="modal-content bg-primary">
                    <form method="POST" :action="actionUrl" autocomplete="off" enctype="multipart/form-data"
                        @submit = "submitForm($event,data.id)">
                        <div class="modal-header">
                            <h4 class="modal-title" v-if='editStatus ===false'>Tambah Data Baru</h4>
                            <h4 class="modal-title" v-if='editStatus'>Edit Data</h4>
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
                            {{-- <div class="form-group">
                                <label>Tipe</label>
                                <input type="text" name="pict" :value="data.pict" required=""
                                    class="form-control">
                            </div> --}}
                            <div class="form-group">
                                <div class="mb-3" style="text-align: center;">
                                    {{-- <label for="pict" class="form-label">Default file input example</label> --}}
                                    <input type="hidden" name="oldPict" id="oldPict" v-if='editStatus'
                                        :value="data.pict">
                                    <embed class="img-preview img-fluid mb-3" style="width: 800px; height: 800px;"
                                        :src="anotherUrl">
                                    <input class="form-control" type="file" id="pict" name="pict"
                                        onchange="previewImage()">
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

        {{-- modal for show --}}
        <div class="modal fade" id="modal-info">
            <div class="modal-dialog modal-fullscreen" style="min-width:90%; min-height:90%;">
                <div class="modal-content bg-info">
                    <div class="modal-header" >
                        
                        <h4 class="modal-title" id="modal-title">
                            {{-- {{modalTitle}} --}}
                        </h4>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="text-align: center;">
                        <form :action="actionUrl" autocomplete="off" enctype="multipart/form-data">
                           
                            <embed :src="anotherUrl" alt="" style="width: 800px; height: 800px;">
                        </form>

                    </div>
                    <div class="modal-footer justify-content-between">

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
        var actionUrl = "{{ url('otherAssets') }}";
        var apiUrl = "{{ url('api/otherAssets') }}";
        var anotherUrl = "{{ asset('storage/post-images/dummy1.png') }}";
        var columns = [{
                data: 'DT_RowIndex',
                class: 'text-center',
                orderable: true,
            },
            {
                data: 'type',
                class: 'text-center',
                orderable: true,
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
                    <a href="#" class="btn btn-info" onclick="controller.viewData(event,${meta.row})">View</a>
                    <a href="#" class="btn btn-success" onclick="controller.downloadData(event,${meta.row})">Print</a>
              <a href="#" class="btn btn-danger" onclick="controller.deleteData(event,${data.id})">Delete</a>
              `;
                },
                orderable: false,
                width: '200px',
                class: 'text-center'
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
                anotherUrl,
                editStatus: false,
                modalTitle: '',
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
                resetInputFile() {
                    // Reset nilai input file
                    const input = document.querySelector('#pict');
                    input.value = ''; // Menghapus nilai yang dipilih
                    // Sembunyikan preview gambar
                    // const pictPreview = document.querySelector('.img-preview');
                    // pictPreview.style.display = 'none';
                },
                addData() {
                    this.data = {};
                    this.actionUrl = '{{ url('otherAssets') }}';
                    this.anotherUrl = "{{ asset('storage/post-images/dummy1.png') }}";
                    this.editStatus = false;
                    
                    const pictPreview = document.querySelector('.img-preview');
                    pictPreview.style.display = '{{ asset('storage/post-images/dummy1.png') }}';
                    $('#modal-primary').modal();

                },
                editData(event, row) {
                    this.data = this.datas[row];
                    console.log(event);
                    // this.data = data;
                    this.anotherUrl = "{{ asset('storage') }}" + "/" + this.data.pict;
                    this.editStatus = true;
                    this.resetInputFile();
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
                viewData(event, row) {
                    $('#modal-info').modal();
                    this.data = this.datas[row];
                    this.modalTitle = this.data.type;
                    $('#modal-title').empty();
                    $('#modal-title').append('<h4 class="modal-title">' +this.modalTitle + '</h4>');
                    this.actionUrl = '{{ url('otherAssets') }}' + '/' + this.data.id;
                    this.anotherUrl = "{{ asset('storage') }}" + "/" + this.data.pict;
                    // console.log(anotherUrl);
                    this.resetInputFile();
                    console.log("testViewData");
                    console.log(this.data);
                },
                downloadData(event, row) {
                    this.resetInputFile();
                    this.data = this.datas[row];
                    this.actionUrl = '{{ url('otherAssets') }}' + '/' + this.data.id;
                    this.anotherUrl = "{{ asset('storage') }}" + "/" + this.data.pict;
                    console.log(row);
                    console.log(this.data);
                    let name = this.data.type + ".pdf";
                    console.log(name);
                    axios({
                        url: this.anotherUrl,
                        method: 'GET',
                        responseType: 'blob', // Menerima respon sebagai blob (binary data)
                    }).then(response => {
                        const url = window.URL.createObjectURL(new Blob([response.data]));
                        const link = document.createElement('a');
                        link.href = url;
                        link.setAttribute('download', name); // Nama file yang akan diunduh
                        document.body.appendChild(link);
                        link.click();
                        window.URL.revokeObjectURL(url);
                    }).catch(error => {
                        console.error('Error downloading PDF:', error);
                        // Tambahkan penanganan kesalahan sesuai kebutuhan Anda
                    });
                },
                submitForm(event, id) {
                    event.preventDefault();

                    const _this = this;

                    var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl + '/' + id;
                    console.log(this.editStatus);
                    // var  anotherUrl = !this.editStatus ? this.anotherUrl : this.anotherUrl + '/' + id;
                    // console.log(this.anotherUrl);
                    axios.post(actionUrl, new FormData($(event.target)[0]), {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }).then(response => {
                        $('#modal-primary').modal('hide');
                        _this.table.ajax.reload();
                    });
                },

            }
        });

        function previewImage() {
            const pict = document.querySelector('#pict');
            const pictPreview = document.querySelector('.img-preview');
            pictPreview.style.display = 'block';
            pictPreview.style.margin = 'auto';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(pict.files[0]);

            oFReader.onload = function(oFREvent) {
                pictPreview.src = oFREvent.target.result;
            };
        };
    </script>
    {{-- <script type="text/javascript">
        var controller = new Vue({
            el: '#controller',
            data: {
                data: {},
                actionUrl: '{{ url('otherAssets') }}',
                editStatus: false,
                anotherUrl: "{{ asset('storage/post-images/dummy1.png') }}",
            },
            mounted: function() {

            },
            methods: {
                addData() {
                    // data-toggle="modal"data-target="#modal-primary"
                    $('#modal-primary').modal();
                    this.actionUrl = '{{ url('otherAssets') }}';
                    this.anotherUrl = "{{ asset('storage/post-images/dummy1.png') }}";
                    this.data = {};
                    console.log("add data");
                    this.editStatus = false;
                },
                editData(data) {
                    console.log(data);
                    this.data = data;

                    $('#modal-primary').modal();
                    this.actionUrl = '{{ url('otherAssets') }}' + '/' + data.id;

                    this.anotherUrl = "{{ asset('storage') }}" + "/" + data.pict;
                    this.editStatus = true;
                },
                deleteData(id) {
                    this.actionUrl = '{{ url('otherAssets') }}' + '/' + id;
                    if (confirm("wanna delete this data?")) {
                        axios.post(this.actionUrl, {
                            _method: 'DELETE'
                        }).then(response => {
                            location.reload();
                        });
                    };
                    console.log(id);
                },
                viewData(data) {
                    $('#modal-info').modal();
                    this.actionUrl = '{{ url('otherAssets') }}' + '/' + data.id;
                    this.anotherUrl = "{{ asset('storage') }}" + "/" + data.pict;
                    console.log(anotherUrl);
                }
            },
        });

        function previewImage() {
            const pict = document.querySelector('#pict');
            const pictPreview = document.querySelector('.img-preview');
            pictPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(pict.files[0]);

            oFReader.onload = function(oFREvent) {
                pictPreview.src = oFREvent.target.result;
            }
        }
    </script> --}}
@endsection
