@extends('layouts.app')

@section('CSS')
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}>
    <link rel="stylesheet" href={{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}>
    <style>
        /* #controller {
                                            background: #ffffff;
                                        } */

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
                            <h5>Tanda Kembali</h5>
                            <h6>No:{{ $print->id }} </h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- admin1 --}}
                    @foreach ($vehicle_lendings as $vehicle_lending)
                        @if ($print->id_vehicle_lending == $vehicle_lending->id)
                            @foreach ($users as $user)
                                @if ($vehicle_lending->id_user == $user->id)
                                    <div class="row">
                                        <div class="col-4">
                                            Admin 1
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
                        @endif
                    @endforeach

                    {{-- admin2 --}}
                    @foreach ($users as $user)
                        @if ($user->id == $print->id_user_return)
                            <div class="row">
                                <div class="col-4">
                                    Admin 2
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
                    @foreach ($vehicle_lendings as $vehicle_lending)
                        @if ($vehicle_lending->id == $print->id_vehicle_lending)
                            <div class="row">
                                <div class="col-4">
                                    Nama Penerima
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-4 ">

                                    {{ $vehicle_lending->nameCustomer }}
                                </div>
                            </div>
                        @endif
                    @endforeach

                    {{-- nomor penerima --}}
                    @foreach ($vehicle_lendings as $vehicle_lending)
                        @if ($vehicle_lending->id == $print->id_vehicle_lending)
                            <div class="row">
                                <div class="col-4">
                                    Nomor Telepon
                                </div>
                                <div class="col-1">
                                    :
                                </div>
                                <div class="col-4 ">

                                    {{ $vehicle_lending->phoneNumber }}
                                </div>
                            </div>
                        @endif
                    @endforeach

                    {{-- brand mobil --}}
                    @foreach ($vehicle_lendings as $vehicle_lending)
                        @if ($print->id_vehicle_lending == $vehicle_lending->id)
                            @foreach ($transportations as $transportation)
                                @if ($vehicle_lending->id_transportation == $transportation->id)
                                    <div class="row">
                                        <div class="col-4">
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
                                        <div class="col-4">
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
                        @endif
                    @endforeach

                    {{-- bensin terakhir --}}

                    <div class="row">
                        <div class="col-4">
                            Bensin terakhir
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-4 ">

                            {{ $print->last_gas }}
                        </div>

                    </div>


                    {{-- KM --}}
                    <div class="row">
                        <div class="col-4">
                            KM
                        </div>
                        <div class="col-1">
                            :
                        </div>

                        <div class="col-4 ">

                            {{ $print->last_km }}
                        </div>
                    </div>

                    {{-- keuangan diberikan --}}

                    <div class="row">
                        <div class="col-4">
                            Keuangan diberikan
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-6 ">

                            @foreach ($vehicle_lendings as $vehicle_lending)
                                @if ($vehicle_lending->id == $print->id_vehicle_lending)
                                    Uang Diberikan: Rp.{{ $vehicle_lending->gas_money }} <br>
                                    Uang dihabiskan: Rp.{{ $vehicle_lending->gas_money - $print->gas_money }} <br>
                                    sisa: Rp.{{ $print->gas_money }}
                                @endif
                            @endforeach


                        </div>

                    </div>

                    {{-- dipinjam --}}
                    <div class="row">
                        <div class="col-4">
                            Dipinjam
                        </div>
                        <div class="col-1">
                            :
                        </div>
                        <div class="col-5 ">

                            {{-- @foreach ($vehicle_lendings as $vehicle_lending)
                            @if ($print->id_vehicle_lending == $vehicle_lending->id)
                                {{ $vehicle_lending->updated_at}}
                            @endif
                            @endforeach --}}
                            {{ $times_lending }}
                        </div>

                    </div>

                    {{-- dikembalikan --}}
                    <div class="row">
                        <div class="col-4">
                            dikembalikan
                        </div>
                        <div class="col-1">
                            :
                        </div>

                        <div class="col-5 ">
                            {{ $times_return }}

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
                                    @if ($user->id == $print->id_user_return)
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
