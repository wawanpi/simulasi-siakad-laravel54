<?php

namespace App\Http\Controllers;
use App\Mahasiswa;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();

        return view('home', compact('totalMahasiswa'));
    }
}
