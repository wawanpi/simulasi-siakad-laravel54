<?php

namespace App\Http\Controllers;
use App\Mahasiswa;
use App\Dosen;
use App\Jurusan;
use App\MataKuliah;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();
        $totalDosen = Dosen::count();
        $totalJurusan = Jurusan::count();
        $totalMataKuliah = MataKuliah::count();

        return view('home', compact('totalMahasiswa', 'totalDosen', 'totalJurusan', 'totalMataKuliah'));
    }
}
