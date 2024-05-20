@extends('layouts.app')

@section('CSS')
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>
    <style>
        hr {
            border: 1px solid #000000;

        }
    </style>
@endsection

@section('title')
    print invoice untuk
    @foreach ($vehicle_lendings as $vehicle_lending)
        @if ($vehicle_lending->id == $print->id_vehicle_lending)
            {{ $vehicle_lending->nameCustomer }}
        @endif
    @endforeach
@endsection


@section('content')
    <div id="controller">
        <div class="content ">
            <div class="card" style="width: 30rem;">
                <div class="card-header">
                    <div class="row">
                        <div class="col align-self-start">
                            <img src="{{ asset('assets/dist/img/logo2.png') }}" alt="AdminLTE Logo"
                                class="brand-image-xl img-circle elevation-3" style="opacity: .8; width:50px;">
                        </div>
                        <div class="col align-self-center text-center">
                            <h3>Pengembalian Mobil</h3>

                        </div>
                        <div class="col align-self-end">
                            <h5>Tanda Pinjam</h5>
                            <h6>No:{{ $print->id }} </h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">


                    {{-- admin1 --}}
                    @foreach ($users as $user)
                        @if ($user->id == $print->id_user)
                            <div class="row">
                                <div class="col-5">
                                    Admin Peminjaman
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-4 ">

                                    {{ $user->name }}
                                </div>
                            </div>
                        @endif
                    @endforeach

                    {{-- nama penerima --}}

                    <div class="row">
                        <div class="col-5">
                            Nama Penerima
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-4 ">

                            {{ $print->nameCustomer }}
                        </div>
                    </div>

                    {{-- Nomor Telepon penerima --}}

                    <div class="row">
                        <div class="col-5">
                            Nomor Telepon penerima
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-4 ">

                            {{ $print->phoneNumber }}
                        </div>
                    </div>

                    {{-- brand mobil --}}

                    @foreach ($transportations as $transportation)
                        @if ($print->id_transportation == $transportation->id)
                            <div class="row">
                                <div class="col-5">
                                    Brand Mobil
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-4 ">

                                    {{ $transportation->brand }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    Plat Nomor
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-4 ">

                                    {{ $transportation->plate }}
                                </div>
                            </div>
                        @endif
                    @endforeach


                    
                    
                    
                    {{-- keuangan diberikan --}}
                    
                    <div class="row">
                        <div class="col-5">
                            Keuangan diberikan
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-6 ">
                            Rp.{{ $print->gas_money }}

                            
                            
                            
                        </div>

                    </div>

                    
                    {{-- dikembalikan --}}
                    <div class="row">
                        <div class="col-5">
                            Tanggal Pinjam
                        </div>
                        <div class="col-1">
                            :
                        </div>

                        <div class="col-5 ">
                            {{ $times_return }}
                            
                        </div>
                    </div>
                    
                    {{-- keperluan --}}
                    <div class="row">
                        <div class="col-5">
                            Keperluan Peminjaman
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-6 ">
                            <p>
                                {{ $print->needs }}
                            </p>

                        </div>

                    </div>

                    <div class="row justify-content-end mt-3">
                        <div class="col-6 text-center">
                            <h6 id="tes">
                                Mojokerto,{{ $currentDate }}
                            </h6>
                            <hr>
                        </div>
                    </div>
                    

                    {{-- ttd --}}
                    <div class="row justify-content-end " style="height: 100px">
                        <div class="col-4 d-flex align-items-end">

                            <h6>
                                @foreach ($users as $user)
                                    @if ($user->id == $print->id_user)
                                        {{ $user->name }}
                                    @endif
                                @endforeach
                            </h6>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection

    @section('JS')
    @endsection
