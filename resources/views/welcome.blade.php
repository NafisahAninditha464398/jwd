<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 32px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Tiket Bus AKAP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="{{ route('KelasBus')}}">Berbagai Kelas Bus</a>
                        <a class="nav-link" href="{{ route('DaftarHarga')}}">Daftar Harga</a>
                        <a class="nav-link" href="{{ route('PesanTiket')}}">Pesan Tiket</a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            
            @foreach($pesan as $data)
            <table class="table">
                <tr>
                    <td>Nama Pemesan</td>
                    <td>{{ $data->nama }}</td>
                </tr>
                <tr>
                    <td>Nomor Identitas</td>
                    <td>{{ $data->nik }}</td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td>{{ $data->hp }}</td>
                </tr>
                <tr>
                    <td>Kelas Penumpang</td>
                    <td>{{ $data->kelas }}</td>
                </tr>
                    <td>Tanggal Keberangkatan</td>
                    <td>{{ Carbon\Carbon::parse($data->berangkat)->format('d-m-Y') }}</td>
                </tr>
                    <td>Jumlah Penumpang</td>
                    <td>{{ $data->jmlh_penumpang }} orang</td>
                </tr>
                </tr>
                    <td>Jumlah Penumpang Lansia</td>
                    <td>{{ $data->jmlh_lansia }} orang</td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>Rp{{ $data->harga }}</td>
                </tr>
                <tr>
                    <td>Total</td>
                    <td>Rp{{ $data->total }}</td>
                </tr>

            </table>
            @endforeach
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>