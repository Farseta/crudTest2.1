<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">

    <style>
        .controller {
            /* background-color: rgb(157, 40, 40); */

            background-image: linear-gradient(0deg,
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.5)),
                url("assets/dist/img/background1.jpg");

            background-size: cover;
            height: 100vh;
            /* height: 100%;
            width: 100%; */
            /* position: relative; */
            /* scroll-behavior: unset; */
            overflow: hidden;
        }



        .header {
            padding: 5%;
            /* background-color: aquamarine; */
            display: flex;
            justify-content: space-between;
            height: 18%;
            color: aliceblue;
        }

        .header h3 {}

        .header img {
            opacity: 0.5;
        }

        .body {
            /* background-color: rgb(36, 212, 219); */
            display: flex;
            /* justify-content: center; */
            padding: 5%;
            height: 75%;
            color: aliceblue;
        }

        .body hr {
            height: 10px;
            color: rgb(4, 1, 1);

        }

        .footer {
            /* height: 7%; */
            /* background-color: aqua; */
            /* padding-top: 1%; */
        }

        .footer ul {
            display: flex;
            justify-content: flex-end;

        }

        .footer li {
            margin-right: 5%;
            /* padding-bottom: 1%; */
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="controller">
        <div class="header">
            <div class="row">
                <div class="col-4">
                    <h4><b>CAR LEASE NOTIFY</b></h4>
                </div>
            </div>

            <img src="assets/dist/img/logo2.png" alt="" height="90" width="60">
        </div>
        <div class="body">
            <div class="row align-items-center">
                <div class="col-4">
                    <h1>Permudah Peminajam mobil dan Pengingat Perawatan Mobil</h1>
                    <hr />
                </div>
            </div>

        </div>
        <div class="footer">
            <ul type="none">
                @if (Route::has('login'))
                    @auth
                        <li>
                            <a href="{{ url('/home') }}" class="btn btn-outline-light rounded-pill">Home</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="btn btn-outline-light rounded-pill">LOGIN</a>
                        </li>
                        @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="btn btn-outline-light rounded-pill">REGISTER</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</body>

</html>
