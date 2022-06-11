<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tiket;

class PesanTiket extends Controller
{
    public function index() {
        return view('pesanTiket');
    }

    public function pesanan() {
        $pesan = Tiket::orderBy('id')->get();
        return view('welcome', compact('pesan'));
    }

    public function insert(Request $request) {
        $tiket = new Tiket();
        $tiket->nama = $request->nama;
        $tiket->nik = $request->nik;
        $tiket->hp = $request->hp;
        $tiket->kelas = $request->kelas;
        $tiket->berangkat = $request->berangkat;
        $tiket->jmlh_penumpang = $request->jmlh_penumpang;
        $tiket->jmlh_lansia = $request->jmlh_lansia;
        $tiket->harga = $request->harga;
        $tiket->total = $request->total;
        $tiket->save();
        return redirect('/');
    }

    public function hitung()
    {   
        $tiket = Tiket::get();
        $jmlh_normal = $tiket->jmlh_penumpang;
        $jmlh_lansia = $tiket->jmlh_lansia;
        if ($tiket->kelas == "Ekonomi") {
            $normal = 10000;
            $lansia = 10000-(10000*10/100);
        } elseif ($tiket->kelas == "Bisnis") {
            $normal = 100000;
            $lansia = 100000-(100000*10/100);
        } else {
            $normal = 200000;
            $lansia = 200000-(200000*10/100);
        }
        $total = $jmlh_lansia * $lansia + $jmlh_normal * $normal;
        return redirect('/', compact('nomal','lansia','total'));
    }
}
