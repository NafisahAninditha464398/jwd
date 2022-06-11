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
            
            <form action="{{ Route('pesan')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label">Nomor Identitas</label>
                    <input type="text" class="form-control" id="nik" name="nik">
                </div>
                <div class="mb-3">
                    <label for="hp" class="form-label">No. HP</label>
                    <input type="text" class="form-control" id="hp" name="hp">
                </div>
                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas Penumpang</label>
                    <select name="kelas" class="form-select" aria-label="Default select example" id="kelas">
                        <option value="Ekonomi">Ekonomi</option>
                        <option value="Bisnis">Bisnis</option>
                        <option value="Eksekutif">Eksekutif</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="berangkat" class="form-label">Jadwal Keberangkatan</label>
                    <input type="date" class="form-control" id="berangkat" name="berangkat">
                </div>
                <div class="mb-3">
                    <label for="jmlh" class="form-label">Jumlah Penumpang</label>
                    <input type="text" class="form-control" id="jmlh" name="jmlh_penumpang">
                </div>
                <div class="mb-3">
                    <label for="lansia" class="form-label">Jumlah Penumpang Lansia</label>
                    <input type="text" class="form-control" id="lansia" name="jmlh_lansia">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Tiket</label>
                    <input type="text" class="form-control" id="harga" name="harga">
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">Harga Total</label>
                    <input type="text" class="form-control" id="total" name="total">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" onclick="hitung()">Total Bayar</button>
            </form>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
            document.addEventListener("click", function(e){
                e.preventDefault;
            });
            function hitung() {
                var kelas = document.getElementById("kelas").value;
                var jmlh_normal = document.getElementById("jmlh").value;
                var jmlh_lansia = document.getElementById("lansia").value;
                if (kelas == 'Ekonomi') {
                    var normal = 10000;
                    var lansia = 10000 - (10000*10/100);
                    var harga = jmlh_normal*normal + jmlh_lansia*lansia;
                    document.getElementById("harga").value = 10000;
                    document.getElementById("total").value = harga;
                    document.getElementById("kelas").value = "Ekonomi";
                } else if (kelas == 'Bisnis') {
                    var normal = 100000;
                    var lansia = 100000 - (100000*10/100);
                    var harga = jmlh_normal*normal + jmlh_lansia*lansia;
                    document.getElementById("harga").value = 100000;
                    document.getElementById("total").value = harga;
                    document.getElementById("kelas").value = "Bisnis";
                } else {
                    var normal = 200000;
                    var lansia = 200000 - (200000*10/100);
                    var harga = jmlh_normal*normal + jmlh_lansia*lansia;
                    document.getElementById("harga").value = 200000;
                    document.getElementById("total").value = harga;
                    document.getElementById("kelas").value = "Eksekutif";
                }
            }
        </script>
    </body>
</html>