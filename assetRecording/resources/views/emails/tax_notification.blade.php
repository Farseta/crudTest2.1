<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        .controller {

            justify-content: center;
            text-align: center;
            align-items: center;
        }

        .tabel1,
        .tabel2 {
            margin-left: auto;
            margin-right: auto;
        }

        .tabel1,
        .tabel2,
        th,
        td {
            border: 1px solid #999;
            padding: 8px 20px;
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
            text-align: center;
        }
        .controller2{
            
            justify-content: center;
            text-align: center;
            align-items: center;
        }
        .table3,.table4{
            margin-left: auto;
            margin-right: auto;
        }
        .table3,
        .table4,
        .table4 td,
        .table3 td {
            border: 1px solid #999;
            padding: 8px 20px;
            font-family: sans-serif;
            color: #f40a0a;
            border-collapse: collapse;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="controller">
        <div class="header1">
            <h1 style="color: orange">Pajak Kendaraan</h1>

        </div>
        <div class="body1">
            <table class="tabel1">
                <tr>
                    <th>Brand Mobil</th>
                    <th>Plat Nomor</th>
                    <th>Tanggal Pajak</th>
                </tr>
                @foreach ($transportations as $key => $transportation)
                    @if (date_left($transportation->tax_date) == true)
                        <tr>
                            <td>
                                {{ $transportation->brand }}
                            </td>
                            <td>
                                {{ $transportation->plate }}
                            </td>
                            <td>
                                {{ $transportation->tax_date }}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
        <div class="header2">
            <h1 style="color: orange">Ganti Oli Kendaraan</h1>
        </div>
        <div class="body2">
            <table class="tabel2">
                <tr>
                    <th>Brand Mobil</th>
                    <th>Plat Nomor</th>
                    <th>Tanggal Ganti Oli</th>
                </tr>
                @foreach ($transportations as $key => $transportation)
                    @if (date_left($transportation->oil_date) == true)
                        <tr>
                            <td>
                                {{ $transportation->brand }}
                            </td>
                            <td>
                                {{ $transportation->plate }}
                            </td>
                            <td>
                                {{ $transportation->oil_date }}
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>

    </div>
    <div class="controller2">
        <div class="header3">
            <h1 style="color: #f40a0a">Pajak Kendaraan Terlambat</h1>
        </div>
        <div class="body3">
            <table class="table3">

                <tr>
                    <th>Brand Mobil</th>
                    <th>Plat Nomor</th>
                    <th>Tanggal Pajak</th>
                </tr>


                @foreach ($transportations as $key => $transportation)
                    @if (date_left2($transportation->tax_date) == true)
                        <tr>
                            <td>
                                {{ $transportation->brand }}
                            </td>
                            <td>
                                {{ $transportation->plate }}
                            </td>
                            <td>
                                {{ $transportation->tax_date }}
                            </td>
                        </tr>
                    @endif
                @endforeach

            </table>
        </div>
        <div class="header4">
            <h1 style="color: #f40a0a">Ganti Oli Kendaraan Terlambat</h1>
        </div>
        <div class="body4">
            <table class="table4">

                <tr>
                    <th>Brand Mobil</th>
                    <th>Plat Nomor</th>
                    <th>Tanggal Pajak</th>
                </tr>


                @foreach ($transportations as $key => $transportation)
                    @if (date_left2($transportation->oil_date) == true)
                        <tr>
                            <td>
                                {{ $transportation->brand }}
                            </td>
                            <td>
                                {{ $transportation->plate }}
                            </td>
                            <td>
                                {{ $transportation->oil_date }}
                            </td>
                        </tr>
                    @endif
                @endforeach


            </table>
        </div>
    </div>
</body>

</html>
