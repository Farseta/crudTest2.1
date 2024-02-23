@extends('layouts.admin')

@section("CSS")

@endsection

@section('title')
Pengembalian Mobil
@endsection

@section('sideTitle')
{{url('vehicleReturns')}}
@endsection

@section('content')
<div class="controller">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="#" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary">Buat data Baru</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body overflow-auto">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">No</th>
                    
                    <th>id Mobil</th>
                    <th>bensin terakhir</th>
                    <th>km terakhir</th>
                    <th>sisa uang bensin</th>
                    <th>Status</th>
                    
                    <th style="width: 40px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($vehicle_returns as $key=>$vehicle_return)
                      
                  @endforeach
                  <tr>
                    <td>
                      {{$key+1}}
                    </td>
                    <td>
                      {{$vehicle_return->id_vehicle_lending}}
                    </td>
                    <td>
                      {{$vehicle_return->last_gas}}
                    </td>
                    <td>
                      {{$vehicle_return->last_km}}
                    </td>
                    <td>
                      {{$vehicle_return->gas_money}}
                    </td>
                    <td>
                      {{$vehicle_return->status}}
                    </td>
                    <td>
                      <a href="#" class="btn btn-info">QR</a>
                      <hr>
                      <a href="#" type="button" class="btn btn-warning" >Edit</a>
                      <hr>
                      <a href="#" type="button" class="btn btn-danger" >Hapus</a>
                    </td>
                    
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
                  <label >Brand</label>
                  <input type="text" name="brand" :value="" required="" class="form-control">
              </div>
              <div class="form-group">
                  <label >Plat Nomor</label>
                  <input type="text" name="plate" :value="" required="" class="form-control">
              </div>
              <div class="form-group">
                  <label >Pajak Kendaraan</label>
                  <input type="text" name="tax_date" :value="" required="" class="form-control">
              </div>
              <div class="form-group">
                  <label >Ganti Oli</label>
                  <input type="text" name="oil_date" :value="" required="" class="form-control">
              </div>
              {{-- <div class="form-group">
                  <label >Status</label>
                  <input type="text" name="status" :value="" required="" class="form-control">
              </div> --}}
              <div class="form-group">
                  <label >Bensin Terakhir</label>
                  <input type="text" name="last_gas" :value="" required="" class="form-control">
              </div>
              <div class="form-group">
                  <label >KM Terakhir</label>
                  <input type="text" name="last_km" :value="" required="" class="form-control">
              </div>
              <div class="form-group">
                  <select class="custom-select form-control " aria-label="Default select example" id="status"   name="status" required>
                      <option value="ready">siap pakai</option>
                      <option value="unready">tidak siap pakai</option>
                  </select>
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