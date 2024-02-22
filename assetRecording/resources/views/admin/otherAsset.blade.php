@extends('layouts.admin')


@section("CSS")

@endsection

@section('title')
Asset Lainnya
@endsection

@section('sideTitle')
{{url('otherAssets')}}
@endsection

@section('content')
<div class="controller">
    {{-- table --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">Buat data Baru</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">No</th>
                        <th>Type</th>
                        <th>Tgl Upload</th>
                        <th>Update Terakhir</th>
                        <th style="width: 40px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                          
                        </td>
                        <td></td>
                      </tr>
                      
                    </tbody>
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
                    <label >Tipe</label>
                    <input type="text" name="type" :value="" required="" class="form-control">
                </div>
                <div class="form-group">
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-light">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    
</div>

@endsection

@section("JS")

@endsection