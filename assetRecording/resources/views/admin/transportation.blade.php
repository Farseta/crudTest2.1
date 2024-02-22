@extends('layouts.admin')

@section('title')
Asset Mobil
@endsection

@section('sideTitle')
{{url('transportations')}}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Bordered Table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th style="width: 10px">No</th>
            <th>Task</th>
            <th>tipe</th>
            <th>Brand</th>
            <th>Pajak Kendaraan</th>
            <th>Ganti Oli</th>
            <th>Status</th>
            <th>Bensin Terakhir</th>
            <th>KM Terakhir</th>
            <th>Tgl Dibuat</th>
            <th>Tgl Diupdate</th>
            <th style="width: 40px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>ssssssssssss</td>
            <td>sssssssssssssss</td>
            <td>ssssssssss</td>
            <td>sssssssss</td>
            <td>ssssss</td>
            <td>sssssssss</td>
            <td>sssssssssss</td>
            <td>sssssssssss</td>
            <td>ssssssssssssss</td>
            <td>ssssssssssss</td>
            <td>sssssssssss</td>
            <td>ssssssssss</td>
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
@endsection